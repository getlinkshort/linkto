<?php
include '../init.php';
header('Content-type: text/plain');
if (empty($_REQUEST['sid']) || empty($_REQUEST['alias'])) {
    die('Sorry, there has been an error, incorrect SID or alias! (Param not found)');
}
$checkstmt = $conn->prepare('SELECT * FROM linkto WHERE sid = ? AND alias = ?');
$checkstmt->bind_param('ss', $_REQUEST['sid'], $_REQUEST['alias']);
$checkstmt->execute();
$checkres = $checkstmt->get_result();
if (mysqli_num_rows($checkres) == 0) {
    die('Sorry, your SID or alias is incorrect.');
}
$stmt = $conn->prepare('UPDATE linkto SET ip = ? WHERE sid = ? AND alias = ?');
$stmt->bind_param('sss', $_SERVER['REMOTE_ADDR'], $_REQUEST['sid'], $_REQUEST['alias']);
$stmt->execute();