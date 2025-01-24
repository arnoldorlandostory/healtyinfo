document.addEventListener("DOMContentLoaded", function () {
  const prevBtn = document.getElementById("prev");
  const nextBtn = document.getElementById("next");
  const images = document.querySelector(".images");
  const numSlides = document.querySelectorAll(".images > a").length;
  let currentSlide = 0;

  function goToSlide(index) {
    currentSlide = index;
    images.style.marginLeft = `${-100 * currentSlide}%`;
  }

  prevBtn.addEventListener("click", function () {
    currentSlide = (currentSlide - 1 + numSlides) % numSlides;
    goToSlide(currentSlide);
  });

  nextBtn.addEventListener("click", function () {
    currentSlide = (currentSlide + 1) % numSlides;
    goToSlide(currentSlide);
  });

  // Adjust the images container width based on the number of images
  images.style.width = `${100 * numSlides}%`;

  // Ensure all images have the same width
  document.querySelectorAll(".images > a").forEach((image) => {
    image.style.width = `${100 / numSlides}%`;
  });
});
