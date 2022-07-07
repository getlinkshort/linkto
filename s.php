<?php
header('Content-type: text/plain');
include 'init.php';
function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
if (!empty($_GET['a'])) {
    $alias = strtolower($_GET['a']);
    if ((strlen($alias) < 5) || (strlen($alias) > 15)) {
        die('Your alias must be between 5 and 15 characters long!');
    }
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $alias)) {
        die('Your alias contains invalid characters! Letters, numbers, and underscores only!');
    }
}

if (!empty($_GET['a'])) {
    $stmtcheck = $conn->prepare('SELECT * FROM linkto WHERE alias = ?');
    $stmtcheck->bind_param('s', $_GET['a']);
    $stmtcheck->execute();
    $rescheck = $stmtcheck->get_result();
    if (mysqli_num_rows($rescheck) == 0) {
        $sid = generateRandomString(35);
        $stmt = $conn->prepare('INSERT INTO linkto (alias, sid) VALUES (?, ?)');
        $stmt->bind_param('ss', $alias, $sid);
        $stmt->execute();
        $_SESSION['sid'] = $sid;
        $_SESSION['alias'] = strtolower($_GET['a']);
        die('OK:COMPLETE');
    } else {
        die('That alias is already taken.');
    }
} else {
    die('Error, no alias!');
}
?>