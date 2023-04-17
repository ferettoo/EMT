// obtenemos el elemento class
const modaladmin = document.querySelector('.modalUsuarios');

// show.bs es de bootstrap (muestra modal de bootstrap) activamos el evento
modaladmin.addEventListener('show.bs.modal' , event => {

// seleccionamos el elemento que activa el modal
  const button = event.relatedTarget
  // obtenemos los atributos data de elemento button
  const username = button.getAttribute('data-bs-username')
  const deleteUser = button.getAttribute('data-bs-action')

  // seleccionamos los apartados del modal
  const modalBody = modaladmin.querySelector('.modal-body')
  const modalSubmit = modaladmin.querySelector('.modal-footer form')

  // modalTitle.textContent = 'Eliminar curso'

  modalBody.innerHTML = '<p> ¿Estas seguro que quieres borrar al usuario '+username+'?</p>'
  modalSubmit.setAttribute('action', deleteUser)

})