<?php
session_start();

if (empty($_SESSION["authenticated"])) {
    TPL::redirectTo("auth.php");
}

require_once "include/init.php";

$data = DB::fetchAll("SELECT * FROM `requests` ORDER BY `status`");

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

    $rows .= TPL::getTemplateContent("list_admin_line", ["ID" => $line['id'], "SNILS" => formatSNILS($line['snils']), "NAME" => $line['name'], "STATUS" => $status]);
}

TPL::addTemplateToContent("list_admin", ['LIST' => $rows]);

echo TPL::getTemplate();