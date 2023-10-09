const formulario = document.getElementById('form');
const entrada = document.getElementById('email');

formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    const valorE = entrada.value;
    if (valorE.trim() !== ""){
        document.getElementById('msg').style.visibility = 'visible'
        entrada.value = ""
    }
})