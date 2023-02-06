let slideshow = document.querySelector("#slideshow");
let images = slideshow.querySelectorAll("img");
let index = 0;
let interval;

function changeImage() {
  for (let i = 0; i < images.length; i++) {
    images[i].style.display = "none";
  }
  index = (index + 1) % images.length;
  images[index].style.display = "block";
}

slideshow.addEventListener("mouseenter", function() {
  clearInterval(interval);
});

slideshow.addEventListener("mouseleave", function() {
  interval = setInterval(changeImage, 3500);
});

interval = setInterval(changeImage, 4000);