const burgerButton=document.querySelector(".burger-button");
const burgerMenu=document.querySelector(".burger-menu");

const burgerList = document.querySelectorAll('.buger-menu a');

burgerButton.addEventListener("click",()=>{
    burgerButton.classList.toggle("active");
    burgerMenu.classList.toggle("active");
})

function hideBurger(params) {
    burgerButton.classList.remove("active");
    burgerMenu.classList.remove("active");
}