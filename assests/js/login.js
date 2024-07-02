// Function to set up the form toggle functionality
function setupFormToggle() {
    // Select all elements with the class "btn" inside elements with the class "bottom" and store them in the "buttons" variable
    const buttons = document.querySelectorAll(".bottom .btn");

    // Select all elements with the class "form" and store them in the "sections" variable
    const sections = document.querySelectorAll(".form");

    // Function to remove "active" class from all buttons and add "active" class to the specified button
    function activateButton(button) {
        buttons.forEach((btn) => btn.classList.remove("active"));
        button.classList.add("active");
    }

    // Function to remove "active" class from all form sections and add "active" class to the specified section
    function activateSection(section) {
        sections.forEach((sec) => sec.classList.remove("active"));
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

    // Automatically switch to sign-in form if redirected from signup
    if (window.location.search.includes('signup=success')) {
        // Find the sign-in button and click it programmatically to activate the sign-in form
        const signInButton = document.querySelector('.btn[data-btn="sign-in"]');
        if (signInButton) {
            signInButton.click();
        }
    }
}


document.addEventListener("DOMContentLoaded", setupFormToggle);
