function show(id) {
    const modal = document.querySelector(`#delete-modal-${id}`)
    modal.showModal();
    return false;
}

function cerrar(id) {
    const modal = document.querySelector(`#delete-modal-${id}`)
    modal.close();
}

function borrar(url) {
    window.location = url;
}