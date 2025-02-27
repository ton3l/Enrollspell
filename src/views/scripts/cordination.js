document.addEventListener('DOMContentLoaded', function () {
    let studentModal = document.getElementById('studentModal');

    studentModal.addEventListener('show.bs.modal', function (event) {

        let button = event.relatedTarget;

        let dados = JSON.parse(button.getAttribute('data-default'));

        document.querySelector(`#option-${dados['saude']}`).selected = true;
        document.querySelector(`#option-${dados['combate']}`).selected = true;
        document.querySelector(`#option-${dados['teste']}`).selected = true;
        document.querySelector(`#option${dados['periodo']}`).selected = true;
        
        let inputMatricula = document.getElementById('matricula');
        
        if (inputMatricula) {
            inputMatricula.value = dados['matricula'];
        } 
        else {
            console.error('Campo de matrícula não encontrado!');
        }
    });
    
    let gradeModal = document.querySelector('#gradeModal');
    
    gradeModal.addEventListener('show.bs.modal', function (event) {
        
        let button = event.relatedTarget;
        console.log(button)

        let nota = button.getAttribute('data-default');

        let grade = document.querySelector('#grade');
        grade.value = nota;
    });
});