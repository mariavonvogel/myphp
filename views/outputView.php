<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список пользователей</title>
    <style>
        body {
            background: #FFF0F5
        }
    </style>
</head>
<body>
<input class="form-control" type="text" placeholder="Поиск..." id="search-text" onkeyup="tableSearch()">
<h4>Данные пользователей:</h4>
<table id="user-list" cellpadding="5" cellspacing="0" border="1" style="text-align: center; width: 800px;">
    <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Email</th>
        <th>Тип</th>
        <th>Редактирование</th>
        <th>Удаление</th>
    </tr>

    <?
    if (!empty($data)) {
        foreach ($data as $user) {
            $color = '#FF1493';
            if ('customer'  == $user['type']) {
                $color = '#20B2AA';
            }

            echo '<tr>';
            echo '<td style="color:' . $color . '">'. $user['id'] .'</td>';
            echo '<td style="color:' . $color . '">'. $user['firstName'] .'</td>';
            echo '<td style="color:' . $color . '">'. $user['lastName'] .'</td>';
            echo '<td style="color:' . $color . '">'. $user['email'] .'</td>';
            echo '<td style="color:' . $color . '">'. $user['type'] .'</td>';
            echo '<td><a href="/main/index/?id=' . $user['id'] . '">Редактировать</a></td>';
            echo '<td><a href="/main/index/?id=' . $user['id'] . '&action=delete">Удалить</a></td>';
            echo '</tr>';
        }
    }

    ?>

</table>
<p></p>
<a href="/main/index">Ввод данных</a>
</body>
</html>

<script type="text/javascript">
    function tableSearch()
    {
        var phrase = document.getElementById('search-text');
        var table = document.getElementById('user-list');
        var regPhrase = new RegExp(phrase.value, 'i');
        var flag = false;

        for (var i = 1; i < table.rows.length; i++) {
            flag = false;
            for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
                flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
                if (flag) {
                    break;
                }
            }
            if (flag) {
                table.rows[i].style.display = "";
            } else {
                table.rows[i].style.display = "none";
            }

        }
    }
</script>