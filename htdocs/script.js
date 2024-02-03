const galleryImages = document.querySelectorAll('.gallery-images img');
const mainPhoto = document.querySelector('.main-photo img');

galleryImages.forEach(image => {
  image.addEventListener('mouseover', () => {
    const newImageSrc = image.getAttribute('src');
    mainPhoto.setAttribute('src', newImageSrc);
  });
});

function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}

window.onscroll = function () { toggleScrollToTopButton() };
function toggleScrollToTopButton() {
  const scrollToTopBtn = document.getElementById("scrollToTopBtn");
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 400) {
    scrollToTopBtn.classList.add("show");
  } else {
    scrollToTopBtn.classList.remove("show");
  }
}

