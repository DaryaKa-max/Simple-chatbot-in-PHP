<?php
require_once 'dbconfig/config.php';

$stmt = $db->quote($_POST['txt']);
$sql = "SELECT answer FROM `chatbot_shop` WHERE client_question LIKE $stmt";
$result = $db->prepare($sql);
$result->execute();

if ($result->rowCount() > 0) {
	$row = $result->fetch(PDO::FETCH_ASSOC);
	$content = $row['answer'];
} else {
	$content = "Извините, ваш вопрос не понятен!";
}

$result->closeCursor();

$added_on = date('Y-m-d h:i:s');
$db->prepare("INSERT INTO message(message,type) VALUES('$content','consultant')");

$added_on = date('Y-m-d h:i:s');
$db->prepare("INSERT INTO message(message,type) VALUES('$stmt','client')");

echo $content;

echo " ";

