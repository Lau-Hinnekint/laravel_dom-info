import './bootstrap';


// ###############
// # BURGER MENU #
// ###############

const burgerOpen = document.querySelector('.open');
const burgerClose = document.querySelector('.close');
const burgerMenu = document.querySelector('.nav__menu');

/**
 * Hide the button open to let the the close button replace him and open the menu
 * 
 * @return void
 */
function openMenu() {
    burgerOpen.classList.add('is-hidden');
    burgerClose.classList.remove('is-hidden');
    burgerMenu.classList.add('is-visible');
    
}

/**
 * Hide the button close to let the the open button replace him and hide the menu
 * 
 * @return void
 */
function closeMenu() {
    burgerClose.classList.add('is-hidden');
    burgerOpen.classList.remove('is-hidden');
    burgerMenu.classList.remove('is-visible');
}

burgerOpen.addEventListener('click', openMenu);

burgerClose.addEventListener('click', closeMenu);



// ###################
// # MOUSE OVER MENU #
// ###################


const menuItems = document.querySelectorAll('.nav__menu li')

/**
 * Add the CSS class '.secondaryBg' when mouseOver
 * 
 * @return void
 */
function bgMouseOver() {
    this.classList.add('secondaryBg');
}

/**
 * Remove the CSS class '.secondaryBg' when mouseOut
 * 
 * @return void
 */
function bgMouseOut() {
    this.classList.remove('secondaryBg');
}

menuItems.forEach(function(item) {
    item.addEventListener('mouseover', bgMouseOver);
    item.addEventListener('mouseout', bgMouseOut);
});


