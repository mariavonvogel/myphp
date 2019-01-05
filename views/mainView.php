<?php 
$user = $this->user;
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ввод данных</title>
    <style>
        body {
            background: #FFF0F5
        }
    </style>
</head>
<body>
<form
        action="/user/check" method="post">

    <h4>Введите данные:</h4>
    <p><input type="hidden" name="id"
              value="<?php echo !empty($user['id']) ? $user['id'] : '' ?>"></p>
    <p><input type="text" name="firstName"
              value="<?php echo !empty($user['firstName']) ? $user['firstName'] : '' ?>"
              placeholder="Имя"
              required></p>
    <p><input type="text" name="lastName"
              value="<?php echo !empty($user['lastName']) ? $user['lastName'] : '' ?>"
              placeholder="Фамилия"
              required></p>
    <p><input type="email" name="email"
              value="<?php echo !empty($user['email']) ? $user['email'] : '' ?>"
              placeholder="Email"
              required></p>
    <p>
        <select name="type" required>
            <option value="guest"<?php echo (!empty($user['type']) && 'guest' == $user['type']) ? ' selected' : '' ?>>Гость</option>
            <option value="customer"<?php echo (!empty($user['type']) && 'customer' == $user['type']) ? ' selected' : '' ?>>Покупатель</option>
        </select>
    </p>
    <p>
        <input type="submit" value="Отправить данные">
        <input type="reset" value="Очистить поля">
    </p>
</form>

<a href="/user/output">Список всех пользователей</a>

</body>
</html>