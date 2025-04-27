<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Запись на курс</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h1 class="mb-4">Запись на курс</h1>
  <form action="signup.php" method="POST">
    <div class="mb-3">
      <label for="full_name" class="form-label">ФИО</label>
      <input type="text" class="form-control" id="full_name" name="full_name" required>
    </div>
    <div class="mb-3">
      <label for="age" class="form-label">Возраст</label>
      <input type="number" class="form-control" id="age" name="age" required>
    </div>
    <div class="mb-3">
      <label for="contacts" class="form-label">Контакты (телефон или email)</label>
      <input type="text" class="form-control" id="contacts" name="contacts" required>
    </div>
    <div class="mb-3">
      <label for="course" class="form-label">Выберите курс</label>
      <select class="form-select" id="course" name="course" required>
        <option value="Плотник">Плотник</option>
        <option value="Сборщик">Сборщик</option>
        <option value="Арматурщик">Арматурщик</option>
        <option value="Бетонщик">Бетонщик</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Отправить заявку</button>
  </form>
</div>

<?php
//(обработка формы)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'db.php';

    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $age = (int)$_POST['age'];
    $contacts = mysqli_real_escape_string($conn, $_POST['contacts']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    $sql = "INSERT INTO applications (full_name, age, contacts, course) VALUES ('$full_name', '$age', '$contacts', '$course')";
    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success mt-4'>Ваша заявка отправлена успешно!</div>";
    } else {
        echo "<div class='alert alert-danger mt-4'>Ошибка: " . mysqli_error($conn) . "</div>";
    }

    mysqli_close($conn);
}
?>

</body>
</html>
