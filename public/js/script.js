// Cart popup functionality
const cartButton = document.getElementById('cartButton');
const popupCart = document.getElementById('popupCart');
const closeCart = document.querySelector('.cart-close');

cartButton.addEventListener('click', () => {
  popupCart.style.display = 'block'; // Make the cart visible
});

closeCart.addEventListener('click', () => {
  popupCart.style.display = 'none'; // Hide the cart
});