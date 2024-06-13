// Function to set up the form toggle functionality
function setupFormToggle() {
    // Select all elements with the class "btn" inside elements with the class "bottom" and store them in the "buttons" variable
    const buttons = document.querySelectorAll(".bottom .btn");
  
    // Select all elements with the class "form" and store them in the "sections" variable
    const sections = document.querySelectorAll(".form");
    // Function to remove "active" class from all buttons and add "active" class to the specified button
    function activateButton(button) {
      // Remove "active" class from all buttons
      buttons.forEach((btn) => btn.classList.remove("active"));
  
      // Add "active" class to the specified button
      button.classList.add("active");
    }
    // Function to remove "active" class from all form sections and add "active" class to the specified section
    function activateSection(section) {
      // Remove "active" class from all form sections
      sections.forEach((sec) => sec.classList.remove("active"));
  
      // Add "active" class to the specified section
      section.classList.add("active");
    }
    // Event handler function for the button click event
    function handleClick(event) {
      // Get the clicked button and assign it to the "button" variable
      const button = event.currentTarget;
  
      // Retrieve the value of the "data-btn" attribute from the clicked button and store it in the "targetSectionClass" variable
      const targetSectionClass = button.dataset.btn;
  
      // Activate the clicked button (set as "active") and deactivate other buttons
      activateButton(button);
  
      // Find the corresponding form section based on the class name obtained from the "data-btn" attribute
      const targetSection = document.querySelector(`.${targetSectionClass}`);
  
      // Activate the related form section (set as "active") and deactivate other sections
      activateSection(targetSection);
    }
    // Add a click event listener to each button and call the "handleClick" function when a button is clicked
    buttons.forEach((button) => {
      button.addEventListener("click", handleClick);
    });
  }

  // Function to validate a non-empty field
function validateNonEmptyField(fieldName, displayName) {
    const value = document.getElementById(fieldName).value.trim();
    if (value === "") {
      showError(fieldName, `${displayName} cannot be empty`);
    } else {
      hideError(fieldName);
    }
  }

  // Function to show error messages
function showError(field, message) {
    const errorElement = document.getElementById(`${field}Error`);
    errorElement.innerHTML = message;
    errorElement.style.display = "block";
  
    const inputElement = document.getElementById(field);
    inputElement.classList.add("error-input");
}

  // Function to hide error messages
function hideError(field) {
    const errorElement = document.getElementById(`${field}Error`);
    errorElement.style.display = "none";
  
    const inputElement = document.getElementById(field);
    inputElement.classList.remove("error-input");
}

// Wait for the DOM to be fully loaded before executing the script
document.addEventListener("DOMContentLoaded", function () {
    // Retrieve the userEmail from localStorage
    const userEmail = localStorage.getItem("userEmail");
  
    // Select the "sign-in" button element
    const signInBtn = document.querySelector('.btn[data-btn="sign-in"]');
  
    // Select the element containing the buttons
    const bottomDiv = document.querySelector(".bottom");
  
    // Check if the userEmail exists in localStorage
    if (userEmail) {
      // If userEmail exists, remove the "sign-in" button from the DOM
      bottomDiv.removeChild(signInBtn);
    }
});
  
// Function to get the active form section
function getActiveFormSection() {
return document.querySelector(".form.active");
}


