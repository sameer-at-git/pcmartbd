
var appointInput = document.getElementById("appointment_date");
var typeInput = document.getElementById("type");
var detailsInput = document.getElementById("details");

var dateError = document.getElementById("dateError");
var typeError = document.getElementById("typeError");
var detailsError = document.getElementById("detailsError");

function validateAppointmentForm(event) {
    var isValid = true;

    dateError.innerHTML = "";
    typeError.innerHTML = "";
    detailsError.innerHTML = "";

    if (appointInput.value === "") {
        dateError.innerHTML = "Appointment date is required.";
        isValid = false;
    }

    if (typeInput.value === "..." || typeInput.value === "") {
        typeError.innerHTML = "Please select an appointment type.";
        isValid = false;
    }

    if (detailsInput.value.trim() === "") {
        detailsError.innerHTML = "Details are required.";
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault();
    }
}
