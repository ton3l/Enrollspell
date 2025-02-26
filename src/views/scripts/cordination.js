const exampleModal = document.getElementById('exampleModal');

exampleModal.addEventListener('show.bs.modal', (event) => {
    // Botão que ativou o modal
    var button = event.relatedTarget;
    
    // Extrair o atributo personalizado do botão
    var customAttribute = button.getAttribute('data-custom-registration');
    
    // Fazer algo com o atributo
    var modalTitle = exampleModal.querySelector('.modal-title');
});