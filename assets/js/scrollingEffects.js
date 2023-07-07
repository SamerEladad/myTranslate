// Scroll effects for the orders page
// Fade in and out on scroll
document.addEventListener("DOMContentLoaded", function () {
  
  const orderItems = document.querySelectorAll(".order-item");

  function fadeInOutOnScroll() {
    const windowHeight = window.innerHeight;
    orderItems.forEach(function (item) {
      const itemPosition = item.getBoundingClientRect();

      // If the item is visible in the viewport, fade it in
      if (itemPosition.top < (windowHeight - 100) && itemPosition.bottom > 100) {
        item.classList.add("fade-in");
      } 
      // Otherwise fade it out
      else {
        item.classList.remove("fade-in");
      }
    });
  }

  // Add event listener to the window
  window.addEventListener("scroll", fadeInOutOnScroll);
  fadeInOutOnScroll();
});
