const acs = document.querySelectorAll(".seo-roz");
for (let i = 0; i < acs.length; i++) {
  acs[i].childNodes[3].addEventListener("click", function (e) {
    e.preventDefault();
    e.target.parentNode.parentNode.classList.toggle("seo-open");
    // e.target.innerHTML = "Zwiń";
    if (e.target.innerHTML === "Rozwiń") {
      e.target.innerHTML = "Zwiń";
    } else {
      e.target.innerHTML = "Rozwiń";
    }
  });
}
