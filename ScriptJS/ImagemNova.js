let botaoEditar = document.getElementById('botaoEditar');
let imgNova = document.getElementById('imagem');
let imgAtual = document.getElementById('imgAtual');

imgNova.addEventListener('change', function () {
    let file = this.files[0];
    if (file) {
        let reader = new FileReader();

        reader.addEventListener('load', function () {
            imgAtual.src = reader.result;
        });

        reader.readAsDataURL(file);

    }

});

botaoEditar.onclick = function () {
    imgNova.click();
}