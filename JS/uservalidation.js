document.getElementById("userForm").addEventListener("submit", function (e) {
    let isValid = true;
 
    // Clear previous errors
    const errorFields = document.querySelectorAll(".error");
    errorFields.forEach(field => field.innerHTML = "");
 
    // Full name validation
    const fullname = document.getElementById("fullname").value.trim();
    if (fullname.length < 3) {
        document.getElementById("fullnameError").innerHTML = "Full name must be at least 3 characters.";
        isValid = false;
    }
 
    // Username validation
    const username = document.getElementById("username").value.trim();
    if (username === "" || /\s/.test(username)) {
        document.getElementById("usernameError").innerHTML = "Username cannot be empty or contain spaces.";
        isValid = false;
    }
 
    // Email validation
    const email = document.getElementById("email").value.trim();
    if (!email.includes("@") || !email.includes(".")) {
        document.getElementById("emailError").innerHTML = "Please enter a valid email address.";
        isValid = false;
    }
 
    // Phone number validation
    const phone = document.getElementById("phone").value.trim();
    if (!/^\d{10,15}$/.test(phone)) {
        document.getElementById("phoneError").innerHTML = "Enter a valid phone number (10-15 digits).";
        isValid = false;
    }
 
    // University ID validation
    const universityId = document.getElementById("university_id").value.trim();
    if (universityId.length < 4) {
        document.getElementById("universityIdError").innerHTML = "University ID must be at least 4 characters.";
        isValid = false;
    }
 
    // Gender validation
    const gender = document.querySelector('input[name="gender"]:checked');
    if (!gender) {
        document.getElementById("genderError").innerHTML = "Please select your gender.";
        isValid = false;
    }
 
    // Password validation
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm_password").value;
    if (password.length < 6) {
        document.getElementById("passwordError").innerHTML = "Password must be at least 6 characters.";
        isValid = false;
    } else if (password !== confirmPassword) {
        document.getElementById("confirmPasswordError").innerHTML = "Passwords do not match.";
        isValid = false;
    }
 
    if (!isValid) {
        e.preventDefault(); // Prevent form submission
    }
});
 
 