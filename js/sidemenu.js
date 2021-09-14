const menu = document.getElementById("sidemenu");
const cntr = document.getElementById("container");
const overlay = document.getElementById("overlay");
const button = document.getElementById("menu-btn");

let hidden = true;

button.addEventListener("click", ToggleMenu);
overlay.addEventListener("click", CloseMenu);

menu.classList.add("menu-hide");
cntr.classList.add("container-normal");

function ToggleMenu(){
    if(hidden){
        menu.classList.add("anim");
        cntr.classList.add("anim");
        
        //do things
        menu.classList.add("menu-show");
        cntr.classList.add("container-move");
        menu.classList.remove("menu-hide");
        cntr.classList.remove("container-normal");
        overlay.style.display = "block";
        hidden = false;

        setTimeout(function(){
            menu.classList.remove("anim");
            cntr.classList.remove("anim");
        }, 500);
    }
    else{
        CloseMenu();
    }
}

function CloseMenu(){
    menu.classList.add("anim");
    cntr.classList.add("anim");
    
    //do things
    menu.classList.remove("menu-show");
    cntr.classList.remove("container-move");
    menu.classList.add("menu-hide");
    cntr.classList.add("container-normal");
    overlay.style.display = "none";
    hidden = true;

    setTimeout(function(){
        menu.classList.remove("anim");
        cntr.classList.remove("anim");
    }, 500);
}