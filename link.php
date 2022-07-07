<?php
include 'init.php';
if (empty($_GET['id'])) {
    die("Error, no link passed!");
}
$stmt = $conn->prepare('SELECT * FROM linkto WHERE alias = ?');
$stmt->bind_param('s', $_GET['id']);
$stmt->execute();
$res = $stmt->get_result();
if (mysqli_num_rows($res) == 0) {
    echo "Link not found";
}
while ($row = mysqli_fetch_assoc($res)) {
    header('Location: ' . $row['ip']);
    exit;
}