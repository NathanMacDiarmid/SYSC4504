import './App.css';
import Catalog from './Catalog'

function Lab06App() {
  return (
    <main>
      <Title
        title = {"Lab06 - React Application"}
      />
      <Catalog />
    </main>
  );
}

function Title(props) {
  return (
    <h1>{props.title}</h1>
  )
}

export default Lab06App;
