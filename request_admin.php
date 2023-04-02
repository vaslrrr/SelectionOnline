<?php
session_start();

if (empty($_SESSION["authenticated"])) {
    TPL::redirectTo("auth.php");
}

require_once "include/init.php";

if (empty($_GET['id'])) {
    TPL::redirectTo("list_admin.php");
}

$data = DB::fetch("SELECT * FROM `requests` WHERE `id` = :id", ["id" => $_GET['id']]);


if ($data == false) {
    TPL::redirectTo("list_admin.php");
}

if ($data['status'] == "none") {
    if (isset($_GET['approve'])) {
        DB::query("UPDATE `requests` SET `status` = 'true' WHERE `id` = :id", ["id" => $_GET['id']]);
        TPL::redirectTo("request_admin.php?id={$_GET['id']}");
    } else if (isset($_GET['decline'])) {
        DB::query("UPDATE `requests` SET `status` = 'false' WHERE `id` = :id", ["id" => $_GET['id']]);
        TPL::redirectTo("request_admin.php?id={$_GET['id']}");
    }
}

$subject = "";
$total = 0;

$sb = json_decode($data['scores'], true);

if ($sb != false) {
    foreach ($sb as $k => $s) {
        $subject .= TPL::getTemplateContent("request_admin_subject", ["NAME" => $k, "VALUE" => $s]);

        $total += $s;
    }
}


$status = "На рассмотрении";

switch ($data['status']) {
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

if ($data['status'] == "none") {
    TPL::addTemplateToContent("request_admin_buttons", ["ID" => $data['id'], "STATUS" => $status, "NAME" => $data['name'], "EMAIL" => $data['email'], "SNILS" => formatSNILS($data['snils']), "SUBJECTS" => $subject, "TOTAL" => $total]);
} else {
    TPL::addTemplateToContent("request_admin", ["ID" => $data['id'], "STATUS" => $status, "NAME" => $data['name'], "EMAIL" => $data['email'], "SNILS" => formatSNILS($data['snils']), "SUBJECTS" => $subject, "TOTAL" => $total]);
}

echo TPL::getTemplate();