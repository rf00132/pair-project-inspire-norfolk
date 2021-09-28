var header = document.getElementById("header");
var inner = document.getElementById("inner");
var sticky = 100;
var lastScroll = 0;

function stickyHeader() {
  if (cntr.scrollTop < lastScroll) {
    header.classList.add("sticky-show");
    header.classList.remove("sticky-hide");
  } else {
    header.classList.remove("sticky-show");
    header.classList.add("sticky-hide");
  }

  lastScroll = cntr.scrollTop;
}

cntr.onscroll = function () {
  if (cntr.scrollTop > sticky) {
    header.classList.add("sticky");
    stickyHeader();
    inner.style.marginTop = "86px";
  } else if (cntr.scrollTop == 0) {
    header.classList.remove("sticky");
    header.classList.remove("sticky-show");
    inner.style.marginTop = "0";
  }
};