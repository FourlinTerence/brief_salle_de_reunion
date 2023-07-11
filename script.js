//NAVBAR 
const nav = document.querySelector("nav");
window.addEventListener("scroll", () => {    
    if (window.scrollY > 120) {
        nav.style.background = "#2d2c2b";
     } else {
            nav.style.background = "#2d2c2b00";
        }
    });