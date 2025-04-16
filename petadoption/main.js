// Define regular expressions for validation
var nameRegex = /^[a-zA-Z\s]+$/;
var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
var pwdRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

// Function to validate the form
function validateForm() {
    var isValid = true;
    var errorMessage = '';

    // Validate name 
    var name = $("#name").val();
    if (!nameRegex.test(name)) {
        isValid = false;
        errorMessage += "Please enter a valid name.\n";
    }

    // Validate email
    var email = $("#email").val();
    if (!emailRegex.test(email)) {
        isValid = false;
        errorMessage += "Please enter a valid email address.\n";
    }

    // Validate password with updated regex
    var password = $("#password").val();
    if (!pwdRegex.test(password)) {
        isValid = false;
        errorMessage += "Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character, with a minimum length of 8 characters.\n";
    }

    // Display alert if form is not valid
    if (!isValid) {
        alert(errorMessage);
    }

    return isValid;
}

// Submit form if valid
$("form").submit(function(event) {
    if (!validateForm()) {
        event.preventDefault(); // Prevent form submission if validation fails
    }
});
