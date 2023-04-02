<?php
require_once "include/init.php";

if (empty($_GET['id']) || empty($_GET['email'])) {
    TPL::redirectTo("list.php");
}

TPL::addTemplateToContent("request_success", ['ID' => $_GET['id'], 'EMAIL' => $_GET['email']]);

echo TPL::getTemplate();