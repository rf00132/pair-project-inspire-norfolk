const header = document.getElementById("header");
const inner = document.getElementById("inner");
let sticky = 200;
let lastScroll = 0;

function stickyHeader(){
    if ( cntr.scrollTop < lastScroll ){
        header.classList.add("sticky-show");
        header.classList.remove("sticky-hide");
        inner.style.marginTop = "106px";
    }
    else {
        header.classList.remove("sticky-show");
        header.classList.add("sticky-hide");
        inner.style.marginTop = "0";
    }
    lastScroll = cntr.scrollTop;
}
console.log("they see me scrollin")
cntr.onscroll = function(){ 
    console.log("they see me scrollin")
    if ( cntr.scrollTop > sticky ){

        header.classList.add("sticky");
        stickyHeader();
    }
    else if(cntr.scrollTop == 0){
        header.classList.remove("sticky");
        header.classList.remove("sticky-show");
        inner.style.marginTop = "0";
    }
};