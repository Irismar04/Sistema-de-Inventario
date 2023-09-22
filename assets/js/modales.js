function show(id) {
    const modal = document.querySelector(`#delete-modal-${id}`)
    modal.showModal();
}

function cerrar(id) {
    const modal = document.querySelector(`#delete-modal-${id}`)
    modal.close();
}

function borrar(url) {
    window.location = url;
}