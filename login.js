// Get modal elements
const loginModal = document.getElementById('login-modal');

// Get button elements
const loginBtn = document.getElementById('login-btn');

// Get close elements
const closeLogin = document.getElementById('close-login');

// Open Login Modal
loginBtn.addEventListener('click', () => {
    loginModal.style.display = 'block';
});

// Close Login Modal
closeLogin.addEventListener('click', () => {
    loginModal.style.display = 'none';
});

// Close modal if clicking outside the modal content
window.addEventListener('click', (event) => {
    if (event.target === loginModal) {
        loginModal.style.display = 'none';
    }
});

// Simple form validation (optional)
document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault();
    alert("Login successful!");
    loginModal.style.display = 'none';
});
