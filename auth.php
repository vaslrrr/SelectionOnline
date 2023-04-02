<?php
session_start();

require_once "include/init.php";

if (!empty($_SESSION["authenticated"])) {
    TPL::redirectTo("list_admin.php");
}

if (!empty($_POST)) {
    if (empty($_POST['login']) || empty($_POST['password'])) {
        TPL::redirectTo("auth.php?error");
    }

    if ($_POST['login'] != LOGIN || $_POST['password'] != PASSWORD) {
        TPL::redirectTo("auth.php?error");
    }

    $_SESSION['authenticated'] = true;
    TPL::redirectTo("list_admin.php");
}

if (isset($_GET['error'])) {
    TPL::makeAlert("Введены неверные данные!", "Ошибка", "error");
}

TPL::addTemplateToContent("auth");

echo TPL::getTemplate();