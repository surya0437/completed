let scrollContainer = document.querySelector(".packages-container");
let backScroll = document.getElementById("back-scroll");
let forwardScroll = document.getElementById("forward-scroll");

forwardScroll.addEventListener("click", () => {
  scrollContainer.scrollBy({
    left: scrollContainer.offsetWidth,
    behavior: "smooth",
  });
});

backScroll.addEventListener("click", () => {
  scrollContainer.scrollBy({
    left: -scrollContainer.offsetWidth,
    behavior: "smooth",
  });
});
function callbackFunc(entries, observer) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      document.getElementById("firstItem-text").classList.add("transitionup");
      document.getElementById("firstItem-button").classList.add("transitionup");
      document.getElementById("firstItem-image").classList.remove("invisible");
      document.getElementById("firstItem-image").classList.add("transitionup");
    } else {
    }
  });
}
function callbackFuncSecond(entries, observer) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      document.getElementById("secondItem-text").classList.add("transitionup");
      document
        .getElementById("secondItem-button")
        .classList.add("transitionup");
      document.getElementById("secondItem-image").classList.remove("invisible");
      document.getElementById("secondItem-image").classList.add("transitionup");
    } else {
    }
  });
}
function callbackFuncThird(entries, observer) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      document.getElementById("thirdItem-text").classList.add("transitionup");
      document.getElementById("thirdItem-button").classList.add("transitionup");
      document.getElementById("thirdItem-image").classList.remove("invisible");
      document.getElementById("thirdItem-image").classList.add("transitionup");
    } else {
    }
  });
}
function callbackFunca(entries, observer) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      document
        .querySelectorAll(".ourservice-card")
        .forEach(
          (el, i) =>
            (el.style.animation = `scroll-top ${
              (i + 2) * 250
            }ms linear 0ms both`)
        );
      document
        .querySelectorAll(".ourservice-card")
        .forEach((el) => (el.style.opacity = 1));
    } else {
    }
  });
}

let options = {
  root: null,
  rootMargin: "0px",
  threshold: 0.4,
};
let optionsa = {
  root: null,
  rootMargin: "0px",
  threshold: 0.2,
};

let observer = new IntersectionObserver(callbackFunc, options);
let observera = new IntersectionObserver(callbackFuncSecond, optionsa);
let observerb = new IntersectionObserver(callbackFuncThird, optionsa);
// let observera = new IntersectionObserver(callbackFunca, optionsa);

observer.observe(document.getElementById("firstItem"));
observera.observe(document.getElementById("secondItem"));
observerb.observe(document.getElementById("thirdItem"));
// observer.observe(document.getElementById("aboutus-image"));
// observera.observe(document.getElementById("ourservice-main"));
