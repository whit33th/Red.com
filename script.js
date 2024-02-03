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



  function togglePopup() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}



const divs = document.querySelectorAll('.size-div'); // выбираем все div на странице
let currentDiv = null; // создаем переменную для хранения текущего div

divs.forEach(div => {
  div.addEventListener('click', () => {
    if (currentDiv) { // если текущий div уже был выбран
      currentDiv.style.backgroundColor = 'initial'; // меняем его цвет на обычный
      currentDiv.style.color = 'initial';
    }
    currentDiv = div; // сохраняем текущий div
    currentDiv.style.backgroundColor = 'black'; // меняем его цвет на черный
    currentDiv.style.color = 'white';
  });
});









