document.addEventListener("DOMContentLoaded", function () {
    const beakersImage = document.getElementById("beakers-image");
  
    const controlHue = document.getElementById("controlHue");
    const controlRotation = document.getElementById("controlRotation");
  
    const imageHue = document.getElementById("imageHue");
    const imageRotation = document.getElementById("imageRotation");
  
    controlHue.addEventListener("input", updateHue);
    controlRotation.addEventListener("input", updateRotation);
  
    function updateHue() {
      const hueValue = controlHue.value;
      beakersImage.style.filter = `hue-rotate(${hueValue}deg)`;
      imageHue.value = hueValue;
    }
  
    function updateRotation() {
      const rotationValue = controlRotation.value;
      beakersImage.style.transform = `rotate(${rotationValue}deg)`;
      imageRotation.value = rotationValue;
    }
  });
  