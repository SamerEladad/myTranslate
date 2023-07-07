// Filtering Orders
document.addEventListener('DOMContentLoaded', function() {
  // Filter orders by fulfilled or unfulfilled
  const orderFilter = document.getElementById('order-filter');
  const orderCards = document.querySelectorAll('.order-item');

  // Filter orders when the filter value changes
  orderFilter.addEventListener('change', function(event) {
    const filterValue = event.target.value;
    
    // Loop through each order card
    orderCards.forEach(card => {
      const isFulfilled = card.querySelector('.fulfilled-card');
      const isUnfulfilled = card.querySelector('.pending-card');

      // Show or hide the order card based on the filter value
      if (filterValue === 'all') {
        // Show all order cards
        card.style.display = '';
      } else if (filterValue === 'fulfilled' && isFulfilled) {
        // Show fulfilled order cards
        card.style.display = '';
      } else if (filterValue === 'unfulfilled' && isUnfulfilled) {
        // Show unfulfilled order cards
        card.style.display = '';
      } else {
        // Hide order cards that don't match the filter value
        card.style.display = 'none';
      }
    });
  });
});
