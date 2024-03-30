import React from 'react';

class Catalog extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            filename : 'images/img1.jpg',
            alt : 'image 1',
            editing : false
        }
        this.handleNameChange = this.handleNameChange.bind(this);
        this.handleAltChange = this.handleAltChange.bind(this);
        this.editClick = this.editClick.bind(this);
        this.saveClick = this.saveClick.bind(this);
    }

    renderNormal() {
        return (
            <div>
                <h2>{this.state.alt}</h2>
                <img src={this.state.filename} alt={this.state.alt} onClick={this.editClick} />
            </div>
        );
    }

    renderEdit() {
        return (
            <div>
                <p>
                    File name:&emsp;
                    <select onChange={this.handleNameChange}>
                        <option value={'images/img1.jpg'}>img1.jpg</option>
                        <option value={'images/img2.jpg'}>img2.jpg</option>
                        <option value={'images/img3.jpg'}>img3.jpg</option>
                        <option value={'images/img4.jpg'}>img4.jpg</option>
                    </select>
                </p>
                <p>
                    Alt:&emsp;
                    <input type='text' onChange={this.handleAltChange}></input>
                </p>
                <input type='submit' value={'Save'} onClick={this.saveClick}></input>
            </div>
        );
    }

    editClick() {
        this.setState({ editing : true })
    }

    saveClick() {
        this.setState({ editing : false })
    }

    handleNameChange(props) {
        this.setState({ filename : props.target[props.target.selectedIndex].value })
    }
    
    handleAltChange(props) {
        this.setState({ alt : props.target.value })
    }

    render() {
        return (
            <div>
                {this.state.editing ? this.renderEdit() : this.renderNormal()}
            </div>
        );
    }
}

export default Catalog;