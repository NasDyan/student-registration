function validateForm() {
    let isValid = true;
    
    // Get form values
    const name = document.getElementById('full_name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    
    // Clear previous errors
    document.getElementById('nameError').textContent = '';
    document.getElementById('emailError').textContent = '';
    document.getElementById('phoneError').textContent = '';
    
    // Validate name
    if (name.length < 3) {
        document.getElementById('nameError').textContent = 'Name must be at least 3 characters long';
        isValid = false;
    }
    
    // Validate email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById('emailError').textContent = 'Please enter a valid email address';
        isValid = false;
    }
    
    // Validate phone (optional)
    if (phone && phone.length < 10) {
        document.getElementById('phoneError').textContent = 'Phone number must be at least 10 digits';
        isValid = false;
    }
    
    return isValid;
}

// Real-time validation
if (document.getElementById('full_name')) {
    document.getElementById('full_name').addEventListener('input', function() {
        if (this.value.length < 3) {
            document.getElementById('nameError').textContent = 'Name is too short';
        } else {
            document.getElementById('nameError').textContent = '';
        }
    });
}