document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        let valid = true;

        // Clear all error messages
        document.querySelectorAll(".error").forEach(el => el.innerHTML = "");

        // 1. Full Name
        const name = document.getElementById("fullname").value.trim();
        if (name.length < 3) {
            document.getElementById("nameError").innerHTML = "Full name must be at least 3 characters.";
            valid = false;
        }

        // 2. Email
        const email = document.getElementById("email").value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            document.getElementById("emailError").innerHTML = "Enter a valid email address.";
            valid = false;
        }

        // 3. Phone
        const phone = document.getElementById("phone").value.trim();
        const phoneRegex = /^[0-9]{11}$/;
        if (!phoneRegex.test(phone)) {
            document.getElementById("phoneError").innerHTML = "Phone number must be 11 digits.";
            valid = false;
        }

        // 4. Password & Confirm Password
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirm_password").value;

        if (password.length < 6) {
            document.getElementById("passwordError").innerHTML = "Password must be at least 6 characters.";
            valid = false;
        }

        if (password !== confirmPassword) {
            document.getElementById("confirmPasswordError").innerHTML = "Passwords do not match.";
            valid = false;
        }

        // 5. Seat validation based on vehicle type
        const vehicleType = document.getElementById("vehicle").value;
        const seats = parseInt(document.getElementById("seats").value);

        if (vehicleType === "Bike" && seats !== 1) {
            document.getElementById("seatError").innerHTML = "Bike can only have 1 seat.";
            valid = false;
        }

        if (vehicleType === "Car" && (seats < 1 || seats > 3)) {
            document.getElementById("seatError").innerHTML = "Car can have 1 to 3 seats only.";
            valid = false;
        }

        if (!valid) {
            event.preventDefault(); // Prevent form submission
        }
        else {
            alert("Form submitted successfully!");
        }
    });
});
