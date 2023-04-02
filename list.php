<?php
require_once "include/init.php";

if (!empty($_GET['success'])) {
    TPL::makeAlert("Ваше заявление зарегистрировано под номером: #" . $_GET['success'], "Успешно!", "success");
}

$data = DB::fetchAll("SELECT * FROM `requests`");

$rows = "";

foreach ($data as $line) {
    $status = "На рассмотрении";

    switch ($line['status']) {
        case "true" :
        {
            $status = "Зачислен";
            break;
        }
        case "false":
        {
            $status = "Не зачислен";
            break;
        }
    }

    $rows .= TPL::getTemplateContent("list_line", ["ID" => $line['id'], "SNILS" => formatSNILS($line['snils']), "STATUS" => $status]);
}

TPL::addTemplateToContent("list", ['LIST' => $rows]);

echo TPL::getTemplate();