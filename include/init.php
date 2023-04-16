<?php

require_once 'database_engine.php';
require_once 'template_engine.php';

const LOGIN = 'login';
const PASSWORD = 'pass';

const SITE_URL = "http://none.none/";

DB::init();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

function sendEMail($address, $text, $subject = "")
{
    $mail = new PHPMailer(false);

    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'user@example.com';
    $mail->Password = 'secret';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    //Recipients
    $mail->setFrom('from@example.com', 'Приемная комиссия РГСУ');
    $mail->addAddress($address);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = nl2br($text);
    $mail->AltBody = strip_tags($text);

    $mail->send();
}

function formatSNILS($num)
{
    $output = "";

    $output .= mb_substr($num, 0, 3);
    $output .= " ";

    $output .= mb_substr($num, 3, 3);
    $output .= " ";

    $output .= mb_substr($num, 6, 3);
    $output .= " ";

    $output .= mb_substr($num, 9);

    return $output;
}