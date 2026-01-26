function showModal(message = "LOGIN FAILED") {
    const modal = document.getElementById("failModal");
    const errorText = document.getElementById("failText");

    if (!modal) return;

    if (errorText) errorText.textContent = message;

    modal.style.display = "flex";
}

function closeModal() {
    const modal = document.getElementById("failModal");
    if (!modal) return;

    modal.style.display = "none";
}