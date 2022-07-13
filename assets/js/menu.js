const burgerButton=document.querySelector(".burger-button");
const burgerMenu=document.querySelector(".burger-menu");

const burgerList = document.querySelectorAll('.buger-menu a');

burgerButton.addEventListener("click",()=>{
    burgerButton.classList.toggle("active");
    burgerMenu.classList.toggle("active");
    
    // désactive le scroll
    document.body.classList.toggle("stop-scrolling");
})

function hideBurger() {
    burgerButton.classList.remove("active");
    burgerMenu.classList.remove("active");
    
    // active le scroll
    document.body.classList.remove("stop-scrolling");
}