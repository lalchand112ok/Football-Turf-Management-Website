// Selecting the necessary form elements
const turfTypeSelect = document.getElementById('turf-type');
const durationSelect = document.getElementById('duration');
const totalPriceDisplay = document.getElementById('total-price');
const paymentMethodSelect = document.getElementById('payment-method');
const paymentDetailsDiv = document.getElementById('payment-details');

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

// Function to update the payment method fields dynamically
/*function updatePaymentFields() {
    const selectedPaymentMethod = paymentMethodSelect.value;

    // Clear previous payment fields
    paymentDetailsDiv.innerHTML = '';

    // Show dynamic fields based on selected payment method
    if (selectedPaymentMethod === 'credit-card' || selectedPaymentMethod === 'debit-card') {
        paymentDetailsDiv.innerHTML = `
            <label for="card-number">Card Number</label>
            <input type="text" id="card-number" name="card-number" placeholder="Card Number" required>

            <label for="expiry-date">Expiry Date</label>
            <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/YY" required>

            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="CVV" required>
        `;
    } else if (selectedPaymentMethod === 'upi') {
        paymentDetailsDiv.innerHTML = `
            <label for="upi-id">UPI ID</label>
            <input type="text" id="upi-id" name="upi-id" placeholder="UPI ID" required>
        `;
    } else if (selectedPaymentMethod === 'net-banking') {
        paymentDetailsDiv.innerHTML = `
            <label for="bank-name">Bank Name</label>
            <input type="text" id="bank-name" name="bank-name" placeholder="Bank Name" required>

            <label for="account-number">Account Number</label>
            <input type="text" id="account-number" name="account-number" placeholder="Account Number" required>

            <label for="ifsc">IFSC Code</label>
            <input type="text" id="ifsc" name="ifsc" placeholder="IFSC Code" required>
        `;
    }
}
*/
// Function to handle the form submission and proceed to the payment confirmation
function proceedToPayment(event) {
    event.preventDefault();  // Prevent default form submission

    const selectedPaymentMethod = paymentMethodSelect.value;

    // Ensure all required fields are filled
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const date = document.getElementById('date').value;
    const time = document.getElementById('time').value;
    const turfType = document.getElementById('turf-type').value;
    const duration = document.getElementById('duration').value;

    if (!name || !email || !date || !time || !turfType || !duration || !selectedPaymentMethod) {
        alert("Please fill in all the required fields.");
        return;
    }

    // Redirect to a payment confirmation page (replace with actual payment gateway integration)
    window.location.href = "payment_confirmation.php?name=" + name + "&email=" + email + "&total=" + totalPriceDisplay.textContent;
}

// Event listeners to update price and payment fields
turfTypeSelect.addEventListener('change', calculatePrice);
durationSelect.addEventListener('change', calculatePrice);
//paymentMethodSelect.addEventListener('change', updatePaymentFields);

// Handle form submission
document.getElementById('booking-form').addEventListener('submit', proceedToPayment);
