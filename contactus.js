document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("contactForm");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    fetch("contact.php", {
      method: "POST",
      body: new FormData(form)
    })
    .then(res => res.text())
    .then(data => {
      alert("Message sent successfully!");
      form.reset();
    })
    .catch(err => console.error(err));
  });
});
