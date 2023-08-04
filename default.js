const hamFirst = document.getElementById("ham-first");
const hamThird = document.getElementById("ham-third");
const navItems = document.getElementById("nav-items");

document.getElementById("hamburger").addEventListener("click", () => {
  hamFirst.classList.toggle("translate-x-2");
  hamThird.classList.toggle("translate-x-2");
  // navItems.classList.toggle("flex");
  navItems.classList.toggle("hidden-min");
  // navItems.classList.toggle("hidden");
});
