import './bootstrap';


// ###############
// # BURGER MENU #
// ###############

const burgerOpen = document.querySelector('.open');
const burgerClose = document.querySelector('.close');
const burgerMenu = document.querySelector('.nav__menu');

/**
 * Hide the button open to let the the close button replace him and open the menu
 */
function openMenu() {
    burgerOpen.classList.add('is-hidden');
    burgerClose.classList.remove('is-hidden');
    burgerMenu.classList.add('is-visible');
    
}

/**
 * Hide the button close to let the the open button replace him and hide the menu
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

function bgMouseOver() {
    this.classList.add('secondaryBg');
}

function bgMouseOut() {
    this.classList.remove('secondaryBg');
}

menuItems.forEach(function(item) {
    item.addEventListener('mouseover', bgMouseOver);
    item.addEventListener('mouseout', bgMouseOut);
});


// $(document).ready(function() {
//     $('.nav__menu li').hover(

//         /**
//          * Call the function when the mouse enter in the area of the object
//          * and set the css class active
//          */
//         function() {
//             $(this).toggleClass('secondaryBg', true);
//         },

//         /**
//          * Call the function when the mouse leave the area of the object
//          * and set the css class inactive
//          */
//         function() {
//             $(this).toggleClass('secondaryBg', false);
//         }
//     );
// });