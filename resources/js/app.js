import './bootstrap';


// ###############
// # BURGER MENU #
// ###############

const burgerOpen = document.querySelector('.open');
const burgerClose = document.querySelector('.close');
const burgerMenu = document.querySelector('.nav__menu');

function openMenu() {
    burgerOpen.classList.add('is-hidden');
    burgerClose.classList.remove('is-hidden');
    burgerMenu.classList.add('is-visible');
}

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

// const menuItems = document.querySelectorAll('.header_nav-list');

// menuItems.forEach(function(item) {    
//     item.addEventListener('mouseover', function(){
//         console.log (item);
//     })
// });
