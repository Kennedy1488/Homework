<?php
// Параметры подключения к базе данных
$host = "localhost"; // Хост базы данных
$username = "root"; // Имя пользователя базы данных
$password = "mysql"; // Пароль пользователя базы данных
$database = "root"; // Имя базы данных
// Создание подключения к базе данных
$mysqli = new mysqli($host, $username, $password, $database);
// Проверка на ошибки подключения
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}
// Обработка добавления заметки
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $category = $_POST['category'];
    // Вставка данных в таблицу "notes"
    $query = "INSERT INTO notes (name, category) VALUES (?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $name, $category);
    if ($stmt->execute()) {
        //Обновление страницы после нажатия "Добавить"
        header("Location: index.php");
        exit(); // Завершение скрипта
    } else {
        echo "Ошибка при добавлении заметки: " . $stmt->error;
    }
    $stmt->close();
}
// Вывод данных из таблицы "notes"
$query = "SELECT name, category FROM notes";
$result = $mysqli->query($query);
?>
<?php
//Если что-то сохранено в таблице базы данных - выводим
if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["category"] . "</td>";
        echo "</tr>";
    }
    // Обнуление переменной результата
    $result->free();
} else {
    echo "Ошибка выполнения запроса: " . $mysqli->error;
}
?>
<?php
// Закрытие соединения
$mysqli->close();
?>