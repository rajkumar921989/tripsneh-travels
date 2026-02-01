
// Image Slider
let slides = document.querySelectorAll(".slide");
let index = 0;

function showSlide() {
  slides.forEach(slide => slide.classList.remove("active"));
  slides[index].classList.add("active");
  index = (index + 1) % slides.length;
}

setInterval(showSlide, 3000);

const openBtn = document.getElementById("openEnquiry");
const closeBtn = document.getElementById("closeEnquiry");
const enquiryForm = document.getElementById("enquiryForm");

openBtn.addEventListener("click", () => {
  enquiryForm.style.display = "flex";
});

closeBtn.addEventListener("click", () => {
  enquiryForm.style.display = "none";
});
