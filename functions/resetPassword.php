<?php
require "../globals/database.php";
$db = Database::getInstance();

if (isset($_GET['id_user'])) $id_user = $db->escape($_GET['id_user']);

$db->query("SELECT username FROM users WHERE id = '$id_user' LIMIT 1");
$user = $db->fetch();
$pwd = sha1($user['username']);

$db->query("UPDATE `users` SET `password`= '$pwd' WHERE id = '$id_user' LIMIT 1");
?>