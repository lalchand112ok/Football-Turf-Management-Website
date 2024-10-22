//important 

document.addEventListener('DOMContentLoaded', function () {
    const turfTypeElement = document.getElementById('turf-type');
    const durationElement = document.getElementById('duration');
    const totalPriceElement = document.getElementById('total-price');

    // Function to calculate the total price
    function calculateTotalPrice() {
        const selectedTurfType = turfTypeElement.options[turfTypeElement.selectedIndex];
        const turfRate = parseInt(selectedTurfType.getAttribute('data-rate')); // Get the rate from the selected turf type
        const duration = parseInt(durationElement.value); // Get the selected duration
        
        // Check if both turf type and duration are selected
        if (!isNaN(turfRate) && !isNaN(duration)) {
            const totalPrice = turfRate * duration;
            totalPriceElement.textContent = `Rs. ${totalPrice}`; // Update the total price display
        } else {
            totalPriceElement.textContent = 'Rs. 0'; // Default to Rs. 0 if no valid input
        }
    }

    // Add event listeners to calculate price when turf type or duration is changed
    turfTypeElement.addEventListener('change', calculateTotalPrice);
    durationElement.addEventListener('change', calculateTotalPrice);
});
