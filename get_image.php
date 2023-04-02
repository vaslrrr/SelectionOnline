<?php
session_start();

if (empty($_SESSION["authenticated"])) {
    TPL::redirectTo("auth.php");
}

require_once "include/init.php";

if (empty($_GET['type']) || empty($_GET['id'])) {
    http_response_code(404);
    exit();
}

if (!in_array($_GET['type'], ["passport", "snils", "graduate", "results"])) {

}

if (!file_exists("uploads/{$_GET['type']}_{$_GET['id']}.jpg")) {
    http_response_code(404);
    exit();
}

$img = file_get_contents("uploads/{$_GET['type']}_{$_GET['id']}.jpg");

header("Content-type: image/jpeg");
echo file_get_contents("uploads/{$_GET['type']}_{$_GET['id']}.jpg");

