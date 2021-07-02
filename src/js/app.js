document.addEventListener("DOMContentLoaded", function(){
    eventListeners();
    darkMode();
} );

function eventListeners(){
    const mobileMenu = document.querySelector(".mobile-menu");

    mobileMenu.addEventListener("click", navegacionResponsive);
}

function navegacionResponsive(){
    const navegacion = document.querySelector(".navegacion");
    
    navegacion.classList.toggle("mostrar");
}

function darkMode(){
    const botonDarkMode = document.querySelector(".dark-mode");
    const prefiereDarkMode = window.matchMedia("(prefers-colorscheme: dark)");
    if (prefiereDarkMode.matches){
        document.body.classList.add("dark-modee");
    }else{
        document.body.classList.remove("dark-modee");
    }
    prefiereDarkMode.addEventListener("change", () =>{
        if (prefiereDarkMode.matches){
            document.body.classList.add("dark-modee");
        }else{
            document.body.classList.remove("dark-modee");
        }
    })

    botonDarkMode.addEventListener("click", () =>{
        document.body.classList.toggle("dark-modee");
    })
}