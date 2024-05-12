<?php
require_once 'dbconfig/config.php';
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat shop</title>
    <link href="style.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

  </head>

  <body>
    <div class="container">
      <div class="row justify-content-md-center mb-8">
        <div class="col-md-8">
          <!-- Шапка чата -->
          <header class="msger-header">
            <div class="msger-header-title"><i class="fas fa-comment-alt">Chat shop</i></div>
            <div class="msger-header-options"><span><i class="fas fa-cog"></i></span></div>
          </header>
          <!-- Основной чат -->
          <div class="card">
            <div class="card-body messages-box">
              <ul class="list-unstyled messages-list">
                <!-- Автоматически бот выводит первое сообщение приветствия -->
                <?php
$time = date('h:i A');
$content = '';
$class = "messages-you";
$imgAvatar = "./imgs/admin.jpg";
$name = "CONSULTANT";
$content = '<div class="msg left-msg"><div class="msg-img" style="background-image: url(' . $imgAvatar . ')"></div><div class="msg-bubble"><div class="msg-info"><div class="msg-info-name">' . $name . '</div><div class="msg-info-time">' . $time . '</div></div><div class="msg-text">Добро пожаловать в наш магазин одежды и обуви! Я ваш консультант. Чем я могу вам помочь? (Просьба, писать предложения с большой буквы, иначе консультант может не понять)</div></div></div>';
echo $content;
?>

                  <!-- Основное сообщение -->
                  <?php
$sql = "SELECT * FROM message"; //берем таблицу message из базы данных
$stmt = $db->prepare($sql); //подготавливает выражение
$stmt->execute(); //возвращает запросы(если пустой - false)
if ($stmt->rowCount() > 0)//проверка на количество затронутых записей, если больше нуля
{
	$content = ''; //переменная для вывода контента
                                //указывает в каком виде нам нужно предоставить результат. Возвращает массив ассоциативный с названиями столбцов
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$message = $row['message'];
		$time = date('h:i A');
		$type = $row['type'];
		if ($type == 'client') {
			$class = "";
			$imgAvatar = "imgs/client.png";
			$name = "Client";
		} else {
			$class = "messages-you";
			$imgAvatar = "./imgs/admin.jpg";
			$name = "CONSULTANT";
		}
		$content .= '<div class="msg right-msg"><div class="msg-img" style="background-image: url(' . $imgAvatar . ')"></div><div class="msg-bubble"><div class="msg-info"><div class="msg-info-name">' . $name . '</div><div class="msg-info-time">' . $time . '</div></div><div class="msg-text">' . $message . '</div></div></div>';
	}
}
$stmt->closeCursor(); //закрывает курсор, переводя запрос в состояние готовности к повторному запросу
?>
              </ul>
            </div>
            <!-- Ввод комментария и отправить -->
            <div class="card-header">
              <div class="input-group">
                <input id="input-me" type="text" name="messages" class="form-control input-sm" placeholder="Type your message here..." />
                <span class="input-group-append"><input type="button" class="btn btn-primary" value="Отправить" onclick="send_msg()"></span>
              </div>
            </div>
          </div>
          <!-- Конец чата -->
        </div>
      </div>
    </div>
    <script src="chat.js"></script>

  </body>

  </html>