<?php
# PHP 7.4/8
$name = 'LinkTo';
$legalname = 'LinkShort LinkTo'; # The name used in Privacy Policy and Terms of Use
$shorturl = 'https://to.rdr.fyi/';

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'linkshort';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
session_name('LINKTO_COOKIE');
session_start();