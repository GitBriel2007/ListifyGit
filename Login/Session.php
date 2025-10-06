<?php

session_start();

if (!isset($_SESSION['aluno'])) {
    header('Location: login.php');
}