let botaoEditar = document.getElementById('sem-imagem');
let imgNova = document.getElementById('fileToUpload');
let imgAtual = document.getElementById('imgAtual');

imgNova.addEventListener('change', function () {
    let file = this.files[0];
    if (file) {
        let reader = new FileReader();

        reader.addEventListener('load', function () {
            imgNova.src = reader.result;
        });

        reader.readAsDataURL(file);

    }

});

botaoEditar.onclick = function () {
    imgNova.click();
}