// Selecting the necessary form elements
const turfTypeSelect = document.getElementById('turf-type');
const durationSelect = document.getElementById('duration');
const totalPriceDisplay = document.getElementById('total-price');

// Function to calculate total price
function calculatePrice() {
    const selectedTurfType = turfTypeSelect.options[turfTypeSelect.selectedIndex];
    const turfRate = selectedTurfType.getAttribute('data-rate');  // Getting the rate from the selected option
    const selectedDuration = durationSelect.value;  // Getting the selected duration

    // Check if both turf type and duration are selected
    if (turfRate && selectedDuration) {
        const totalPrice = turfRate * selectedDuration;  // Calculating the total price
        totalPriceDisplay.textContent = `$${totalPrice}`;  // Updating the displayed price
    } else {
        totalPriceDisplay.textContent = "$0";  // Default price if not all fields are selected
    }
}

// Event listeners to update price when user selects a turf type or duration
turfTypeSelect.addEventListener('change', calculatePrice);
durationSelect.addEventListener('change', calculatePrice);

// Form validation and submission (optional for real-time validation)
document.getElementById('booking-form').addEventListener('submit', function(event) {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const date = document.getElementById('date').value;
    const time = document.getElementById('time').value;
    const turfType = document.getElementById('turf-type').value;
    const duration = document.getElementById('duration').value;
    const paymentMethod = document.getElementById('payment-method').value;

    // Validate all fields
    if (!name || !email || !date || !time || !turfType || !duration || !paymentMethod) {
        alert("Please fill in all required fields.");
        event.preventDefault();  // Prevent form submission
    }
});
