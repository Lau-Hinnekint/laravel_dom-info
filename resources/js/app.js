import './bootstrap';


// ###############
// # BURGER MENU #
// ###############

const action = document.querySelector('.toggleMenu');
const menu = document.querySelector('ul');

action.addEventListener('click', function () {
    menu.classList.toggle('menu');
});


// ###################
// # MOUSE OVER MENU #
// ###################

// const menuItems = document.querySelectorAll('.header_nav-list');

// menuItems.forEach(function(item) {    
//     item.addEventListener('mouseover', function(){
//         console.log (item);
//     })
// });
