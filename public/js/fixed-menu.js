var menu = document.querySelector('.menu');
var menuHeight = menu.offsetHeight;
var menuPos = menu.getBoundingClientRect();
var anchor = document.querySelector('.anchor');
var headerHeight = document.querySelector('header').getBoundingClientRect().height;

document.addEventListener('scroll', function (e) {
	var scrolled = window.pageYOffset;
	if(scrolled > headerHeight) {
        menu.classList.add('scrolled');
        anchor.style.height = menuHeight + "px";
    }   
    else {     
        menu.classList.remove('scrolled');
        anchor.style.height = "0px";
    }
});