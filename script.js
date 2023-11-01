// Select the preloader element
var preloader = document.querySelector(".preloader");

// Function to hide the preloader
function hidePreloader() {
    preloader.style.display = "none";
}

// Set a timeout to hide the preloader after 5 seconds (5000 milliseconds)
setTimeout(hidePreloader, 500);

document.addEventListener('DOMContentLoaded', function () {
    const textElement = document.getElementById('text');
    const newTexts = ["I'm Aya Tweme", "I'm a Web Developer"];
    let currentTextIndex = 0;
    let currentLetterIndex = 0;
  
    function changeTextContinuously() {
      const currentText = newTexts[currentTextIndex];
  
      if (currentLetterIndex < currentText.length) {
        textElement.textContent = currentText.substring(0, currentLetterIndex + 1);
        currentLetterIndex++;
      } else {
        currentLetterIndex = 0;
        currentTextIndex = (currentTextIndex + 1) % newTexts.length;
      }
  
      setTimeout(changeTextContinuously, 100); // Adjust the delay for the letter-by-letter animation
    }
  
    // Start the continuous animation
    changeTextContinuously();
  });
  // Select the navbar element
var navbar = document.querySelector(".navbar");

// Function to handle the scroll event
function handleScroll() {
    // Get the current scroll position
    var scrollPosition = window.scrollY;

    // Define the scroll position where you want the color change to occur (adjust as needed)
    var colorChangePosition = 100; // Change the value to the desired scroll position

    // Check if the scroll position is beyond the defined point
    if (scrollPosition > colorChangePosition) {
        navbar.style.backgroundColor = "#16161e"; // Change the background color to match the body color
    } else {
        navbar.style.backgroundColor = "transparent"; // Reset to transparent if above the defined point
    }
}

// Attach the scroll event listener
window.addEventListener("scroll", handleScroll);
