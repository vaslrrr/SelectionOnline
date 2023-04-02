<?php
require_once "include/init.php";

if (!empty($_POST)) {

    if (trim(empty($_POST['name'])) || trim(empty($_POST['email'])) || empty($_POST['subject']) || empty($_POST['mark'])) {
        TPL::redirectTo("request.php?error");
    }

    if (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        TPL::redirectTo("request.php?error");
    }

    if (empty($_POST['snils']) || !is_numeric(str_replace(" ", "", $_POST['snils'])) || mb_strlen(str_replace(" ", "", $_POST['snils'])) != 11) {
        TPL::redirectTo("request.php?error");
    }

    if (!is_array($_POST['subject']) || !is_array($_POST['mark'])) {
        TPL::redirectTo("request.php?error");
    }


    $scores = [];

    foreach ($_POST['subject'] as $k => $v) {
        if (!empty(trim($v)) && !empty($_POST['mark'][$k])) {
            $scores[trim($v)] = $_POST['mark'][$k];
        }
    }

    if (count($scores) < 2) {
        TPL::redirectTo("request.php?error");
    }

    if ($_FILES["passport"]["error"] != UPLOAD_ERR_OK || $_FILES['passport']['type'] != "image/jpeg" || $_FILES['passport']['size'] > "10485760") {
        TPL::redirectTo("request.php?file_error");
    }


    if ($_FILES["snils"]["error"] != UPLOAD_ERR_OK || $_FILES['snils']['type'] != "image/jpeg" || $_FILES['snils']['size'] > "10485760") {
        TPL::redirectTo("request.php?file_error");
    }

    if ($_FILES["graduate"]["error"] != UPLOAD_ERR_OK || $_FILES['graduate']['type'] != "image/jpeg" || $_FILES['graduate']['size'] > "10485760") {
        TPL::redirectTo("request.php?file_error");
    }

    if ($_FILES["results"]["error"] != UPLOAD_ERR_OK || $_FILES['results']['type'] != "image/jpeg" || $_FILES['results']['size'] > "10485760") {
        TPL::redirectTo("request.php?file_error");
    }

    DB::insert("requests", [
        "name" => trim($_POST['name']),
        "email" => trim($_POST['email']),
        "snils" => str_replace(" ", "", $_POST['snils']),
        "scores" => json_encode($scores, JSON_UNESCAPED_UNICODE)
    ]);

    $id = DB::lastInsertID();

    if (!move_uploaded_file($_FILES['passport']['tmp_name'], "uploads/passport_$id.jpg")) {
        DB::query("DELETE FROM `requests` WHERE `id` = :id", ['id' => $id]);
        TPL::redirectTo("request.php?system_error");
    }

    if (!move_uploaded_file($_FILES['snils']['tmp_name'], "uploads/snils_$id.jpg")) {
        DB::query("DELETE FROM `requests` WHERE `id` = :id", ['id' => $id]);
        TPL::redirectTo("request.php?system_error");
    }

    if (!move_uploaded_file($_FILES['graduate']['tmp_name'], "uploads/graduate_$id.jpg")) {
        DB::query("DELETE FROM `requests` WHERE `id` = :id", ['id' => $id]);
        TPL::redirectTo("request.php?system_error");
    }

    if (!move_uploaded_file($_FILES['results']['tmp_name'], "uploads/results_$id.jpg")) {
        DB::query("DELETE FROM `requests` WHERE `id` = :id", ['id' => $id]);
        TPL::redirectTo("request.php?system_error");
    }

    TPL::redirectTo("request_success.php?id=$id&email=" . urlencode(trim($_POST['email'])));
}

if (isset($_GET['error'])) {
    TPL::makeAlert("Ошибка при заполнении формы", "Ошибка", "error");
}

if (isset($_GET['system_error'])) {
    TPL::makeAlert("Произошла системная ошибка при регистрации формы", "Ошибка", "error");
}

if (isset($_GET['file_error'])) {
    TPL::makeAlert("Произошла ошибка при загрузке файла либо выбран недопустимый файл. Допустимые файлы: JPEG до 10мб", "Ошибка", "error");
}

TPL::addTemplateToContent("request");

echo TPL::getTemplate();