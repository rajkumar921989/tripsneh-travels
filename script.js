
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
function validateForm() {

  let name = document.getElementById("name").value.trim();
  let email = document.getElementById("email").value.trim();
  let mobile = document.getElementById("mobile").value.trim();

  let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  let mobilePattern = /^[0-9]{10}$/;

  if (name.length < 3) {
    alert("Name must be at least 3 characters");
    return false;
  }

  if (!emailPattern.test(email)) {
    alert("Enter valid email address");
    return false;
  }

  if (!mobilePattern.test(mobile)) {
    alert("Mobile number must be 10 digits");
    return false;
  }

  return true;
}
