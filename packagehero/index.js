const slider = document.querySelector(".slider");
const slides = Array.from(document.querySelectorAll(".slide"));
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");

let currentIndex = 0;

function showSlide(index) {
  slides.forEach((slide, i) => {
    slide.style.transform = `translateX(${100 * (i - index)}%)`;
    if (index === currentIndex) {
      slide.style.display = "block";
    } else {
      slide.style.display = "none";
    }
  });
}

function slideToNext() {
  currentIndex = (currentIndex + 1) % slides.length;
  showSlide(currentIndex);
}

function slideToPrev() {
  currentIndex = (currentIndex - 1 + slides.length) % slides.length;
  showSlide(currentIndex);
}

prevBtn.addEventListener("click", slideToPrev);
nextBtn.addEventListener("click", slideToNext);

showSlide(currentIndex);
