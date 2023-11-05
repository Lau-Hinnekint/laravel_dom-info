import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// #########################################################################################################
// ################ BURGER MENU ############################################################################
// #########################################################################################################

const burgerOpen = document.querySelector('.openBurger');
const burgerClose = document.querySelector('.closeBurger');
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



// #########################################################################################################
// ################ FILTER MENU ############################################################################
// #########################################################################################################

const filterOpen = document.querySelector('.openFilter');
const filterClose = document.querySelector('.closeFilter');
const filterMenu = document.querySelector('.filter');

/**
 * Hide the button open to let the the close button replace him and open the filter
 * 
 * @return void
 */
function openFilter() {
    filterOpen.classList.add('is-hidden');
    filterClose.classList.remove('is-hidden');
    filterMenu.classList.add('is-visible');

}

/**
 * Hide the button close to let the the open button replace him and hide the filter
 * 
 * @return void
 */
function closeFilter() {
    filterClose.classList.add('is-hidden');
    filterOpen.classList.remove('is-hidden');
    filterMenu.classList.remove('is-visible');
}


if (filterOpen) {
    filterOpen.addEventListener('click', openFilter);
}

if (filterClose) {
    filterClose.addEventListener('click', closeFilter);
}



// #############################################################################################################
// ################ MOUSE OVER MENU ############################################################################
// #############################################################################################################


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


menuItems.forEach(function (item) {
    item.addEventListener('mouseover', bgMouseOver);
    item.addEventListener('mouseout', bgMouseOut);
});




// #############################################################################################################
// ################ PRODUCT COUNTER ############################################################################
// #############################################################################################################

const decrementButton = document.querySelector(".decrement");
const incrementButton = document.querySelector(".increment");
const counterDisplay = document.querySelector(".counter");

// console.log(counterDisplay);

var count = 0;

function updateCounter(counter, newValue) {
    counter.innerHTML = newValue
}

function increment(button, counter) {
    button.addEventListener("click", () => {
        count++;
        updateCounter(counter, count)
    }
    )
};

function decrement(button, counter) {
    button.addEventListener("click", () => {
        if (count > 0) {
            count--;
            updateCounter(counter, count)
        }

    }
    )
};


increment(incrementButton, counterDisplay);
decrement(decrementButton, counterDisplay);