let botaoEditar = document.getElementById('botaoEditar');
let AdicionaImagem = document.getElementById('fileToUpload');
let semImagem = document.getElementById('sem-imagem');

AdicionaImagem.addEventListener('change', function () {
    let file = this.files[0];
    if (file) {
        let reader = new FileReader();

        reader.addEventListener('load', function () {
            semImagem.src = reader.result;
        });

        reader.readAsDataURL(file);

    }

});

botaoEditar.onclick = function () {
    AdicionaImagem.click();
}