function fetchMessages(filterType) {
    const messageContainer = document.getElementById("messages-container");
    const activeButton = document.getElementById(filterType);

    if (activeButton) {
        document.querySelector(".active-btn")?.classList.remove("active-btn");
        activeButton.classList.add("active-btn");
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "notifications.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            messageContainer.innerHTML = xhr.responseText.trim();
        }
    };

    xhr.send("filter=" + filterType);
}
document.addEventListener("DOMContentLoaded", function () {
    fetchMessages("all");
});