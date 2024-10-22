document.getElementById("booking-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Get form values
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const date = document.getElementById("date").value;
    const time = document.getElementById("time").value;
    const turfType = document.getElementById("turf-type").value;

    // Simple validation
    if (!name || !email || !date || !time || !turfType) {
        alert("Please fill in all fields!");
        return;
    }

    // Simulate a successful booking response
    const responseMessage = `Thank you, ${name}! Your booking for a ${turfType} turf on ${date} at ${time} has been received. We will contact you at ${email} to confirm.`;

    // Display response message
    document.getElementById("booking-response").textContent = responseMessage;

    // Clear the form
    document.getElementById("booking-form").reset();
});
