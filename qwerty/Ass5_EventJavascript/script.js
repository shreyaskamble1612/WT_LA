// 1. Click Event
document.getElementById('clickBtn').addEventListener('click', function() {
    document.getElementById('clickResult').textContent = 'Button clicked!';
});

// 2. Input Change Event
document.getElementById('nameInput').addEventListener('input', function() {
    const name = document.getElementById('nameInput').value;
    document.getElementById('nameResult').textContent = 'Hello, ' + name + '!';
});

// 3. Form Submit Event
document.getElementById('exampleForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting
    const email = document.getElementById('email').value;
    document.getElementById('formResult').textContent = 'Form submitted! Your email: ' + email;
});