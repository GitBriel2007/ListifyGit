<?php
    if (isset($_SESSION['aluno'])) : ?>
        <span>Logado: <?= $_SESSION['aluno']->nome ?> </span>
    <?php endif ?>
<a href="index.php">Inicio</a>
<a href="logout.php">Sair</a>