import './bootstrap';


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
const filterMenu = document.querySelector('.cardFilter');

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

menuItems.forEach(function(item) {
    item.addEventListener('mouseover', bgMouseOver);
    item.addEventListener('mouseout', bgMouseOut);
});



// #############################################################################################################
// ################ PRODUCT COUNTER ############################################################################
// #############################################################################################################

const decrementButton = document.querySelector(".decrement");
const incrementButton = document.querySelector(".increment");
const countElement = document.querySelector(".cardHeader__count");
 
function incrementCounter(countElem) {
    const currentValue = parseInt(countElem.innerHTML, 10); // Convertit la valeur actuelle en nombre entier
    const newValue = currentValue + 1; // Incrémente la valeur
    countElem.innerHTML = newValue; // Met à jour la valeur dans countElem
}

function decrementCounter(countElem) {
    const currentValue = parseInt(countElem.innerHTML, 10); // Convertit la valeur actuelle en nombre entier
    if (currentValue > 0) {
        const newValue = currentValue - 1; // Décrémente la valeur si elle est supérieure à zéro
        countElem.innerHTML = newValue; // Met à jour la valeur dans countElem
    }
}

incrementButton.addEventListener("click", incrementCounter(countElement));
decrementButton.addEventListener("click", decrementCounter(countElement));


    // let countProduct = 0;

    // function updateCounter(countElem, count) {
    //     countElem.innerText = count;
    // }

    // function increment(button, countElem, count) {
    //     button.addEventListener("click", () => {
    //         count++;
    //         updateCounter(countElem, count)
    //     }
    // )};

    // function decrement(button, countElem, count) {
    //     button.addEventListener("click", () => {
    //         count--;
    //         updateCounter(countElem, count)
    //     }
    // )};


    // increment(incrementButton, countElement, countProduct);
    // decrement(decrementButton, countElement, countProduct);





