const acs = document.querySelectorAll(".seo-roz");
for (let i = 0; i < acs.length; i++) {
  console.log(acs[i].childNodes[3]);
  acs[i].childNodes[3].addEventListener("click", function (e) {
    e.preventDefault();
    e.target.parentNode.parentNode.classList.toggle("seo-open");
    // e.target.innerHTML = "Zwiń";
    console.log(e.target);
    if (e.target.innerHTML === "Rozwiń") {
      e.target.innerHTML = "Zwiń";
    } else {
      e.target.innerHTML = "Rozwiń";
    }
  });
}
