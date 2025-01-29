document.getElementById("signUpForm").addEventListener("submit", function (event) {
    const address = document.getElementById("address").value.trim();
    const age = parseInt(document.getElementById("age").value, 10);
    const zip = document.getElementById("zip").value.trim();
    const gender = document.querySelector("input[name='gender']:checked");

    let errors = [];

    // Address validation
    if (!address) {
        errors.push("Address field is required.");
    }

    // Age validation
    if (isNaN(age) || age < 18 || age > 100) {
        errors.push("Age must be a number between 18 and 100.");
    }

    // ZIP code validation
    if (!/^\d{5}$/.test(zip)) {
        errors.push("ZIP code must be a 5-digit number.");
    }

    // Gender validation
    if (!gender) {
        errors.push("Please select a gender.");
    }

    if (errors.length > 0) {
        event.preventDefault();
        alert(errors.join("\\n"));
    }
});
