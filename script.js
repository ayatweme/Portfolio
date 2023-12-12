var preloader = document.querySelector(".preloader");

function hidePreloader() {
    preloader.style.display = "none";
}

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
  
      setTimeout(changeTextContinuously, 100); 
    }
  
   
    changeTextContinuously();
  });
var navbar = document.querySelector(".navbar");

function handleScroll() {
    var scrollPosition = window.scrollY;

    var colorChangePosition = 100; 

    if (scrollPosition > colorChangePosition) {
        navbar.style.backgroundColor = "#16161e"; 
    } else {
        navbar.style.backgroundColor = "transparent"; 
    }
}

window.addEventListener("scroll", handleScroll);

