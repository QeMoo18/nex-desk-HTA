<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'mail', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'mail.bit.com.my', 
    'smtp_port' => '25',
    'smtp_user' => '',
    'smtp_pass' => '',
    // 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '4', //in seconds
    'charset'   => 'utf-8',
    'wordwrap' => TRUE
);