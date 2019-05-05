<?php
error_reporting(0);
$error = array(
);

if (!empty($_POST))
{
    $name= isset($_POST['name']) ? trim($_POST['name']) : null;
    $lastname= isset($_POST['lastname']) ? trim($_POST['lastname']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $telephone = isset($_POST['telephone']) ? trim($_POST['telephone']) : null;
    $topic = isset($_POST['topic']) ? trim($_POST['topic']) : null;
    $pay = isset($_POST['pay']) ? trim($_POST['pay']) : null;
    $check = isset($_POST['check']) ? 'yes' : 'no';

    foreach (['name', 'lastname', 'email', 'telephone', 'topic', 'pay'] as $key)
    {
        if(empty($$key))
        {
            $error[$key] = true;
        }
    }

    if (empty($error))
    {
        $contents = $name . "||" .$lastname . "||" . $email . "||" . $telephone . "||" . $topic . "||" . $pay . "||" . $check . "||" . date('Y-m-d-H-i-s'). "||" .$_SERVER['REMOTE_ADDR']. "||" . "NoDelete" . "\n";

        file_put_contents("formfile/all.txt", $contents, FILE_APPEND);
        header('Location: form.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Form</title>
</head> 
<body>
    <h1>Форма регистрации на конферецию</h1>
    <form method="POST">
        <p>Введите имя</p>
        <p><input type="text" name="name" value = "<?= isset($_POST['name']) ? $_POST['name']: ''?>" required></p>
        <p>Введите фамилию</p>
        <p><input type="text" name="lastname" value = "<?= isset($_POST['lastname']) ? $_POST['lastname']: ''?>" required></p>
        <p>Введите электронный адрес</p>
        <p><input type="email" name="email" value = "<?= isset($_POST['email']) ? $_POST['email']: ''?>" required></p>
        <p>Введите номер телефона</p>
        <p><input type="text" name="telephone" value = "<?= isset($_POST['telephone']) ? $_POST['telephone']: ''?>" required></p>
        <p>Выберете тематику конференции</p>
        <select name="topic"> 
            <optgroup> 
                <option value="business">Бизнес</option> 
                <option value="technology">Технологии</option>
                <option value="marketing">Реклама и Маркетинг</option>
            </optgroup>
        </select>
        <p>Выберете вариант оплаты</p>
        <select name="pay"> 
            <optgroup> 
                <option value="webmoney">WebMoney</option> 
                <option value="yandex">Яндекс.Деньги</option>
                <option value="paypal">PayPal</option>
                <option value="credit">Кредитная карта</option>
            </optgroup>
        </select>
        <p>Согласие на получение новостей по конференции<input type="checkbox" name="check">
            
        <p><input type="submit" value="Отправить"></p>
    </form>
    <form action="admin.php">
        <p><input type="submit" value="Администратор"></p>
    </form>
</body>
</html> 
