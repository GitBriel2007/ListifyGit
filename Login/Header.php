<?php
    if (isset($_SESSION['usuario'])) : ?>
        <span>Logado: <?= $_SESSION['usuario'] ?> </span>
    <?php endif ?>
<a href="../index.php"><img src=../Images/Logo/imgPrincipalListify.png ></a>
<a href="logout.php">Sair</a>