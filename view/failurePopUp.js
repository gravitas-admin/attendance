// Functions control popup after it's loaded
function showModal(message = "LOGIN FAILED") {
    const modal = document.getElementById('modal');
    const errorText = document.getElementById('errorText');
    if (!modal) return;

    if (errorText) errorText.textContent = message;
    modal.classList.add('show');
}

function closeModal() {
    const modal = document.getElementById('modal');
    if (!modal) return;

    modal.classList.remove('show');
    modal.classList.add('hide');

    setTimeout(() => {
        modal.classList.remove('hide');
    }, 400); // match CSS animation
}
