const galleryImages = document.querySelectorAll('.gallery-images img');
const mainPhoto = document.querySelector('.main-photo img');

galleryImages.forEach(image => {
  image.addEventListener('mouseover', () => {
    const newImageSrc = image.getAttribute('src');
    mainPhoto.setAttribute('src', newImageSrc);
  });
});


function toggleCart() {
  var cart = document.getElementById('cart');
  cart.classList.toggle('open');
}

