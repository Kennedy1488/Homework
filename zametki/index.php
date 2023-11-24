<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Добавить Заметку</h1>
    <!-- Форма для добавления заметок, отправляющая данные на display_notes.php -->
    <form method="post" action="display_notes.php">
        <label for="name">Название:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="category">Категория:</label>
        <!-- Выбор категории из выпадающего списка -->
        <select id="category" name="category" required>
            <option value="Книга">Книга</option>
            <option value="Мультфильм">Мультфильм</option>
            <option value="Фильм">Фильм</option>
        </select><br>
        <input type="submit" value="Добавить">
    </form>
    <h2>Заметки</h2>
    <table border="1">
        <tr>
            <th>Название</th>
            <th>Категория</th>
        </tr>
        <!-- Подключение display_notes.php -->
        <?php include 'display_notes.php'; ?>
    </table>

</body>

</html>