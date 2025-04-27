<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['admin'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['password'] == 'admin123') {
        $_SESSION['admin'] = true;
    } else {
        echo '<form method="POST" style="margin:50px;">
                <input type="password" name="password" placeholder="Пароль администратора" class="form-control mb-3" required>
                <button type="submit" class="btn btn-primary">Войти</button>
              </form>';
        exit();
    }
}

// Показ заявок
$result = mysqli_query($conn, "SELECT * FROM applications ORDER BY id DESC");

echo '<div class="container mt-5">
        <h1>Заявки на курсы</h1>
        <a href="logout.php" class="btn btn-danger mb-3">Выйти</a>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>ФИО</th>
              <th>Возраст</th>
              <th>Контакты</th>
              <th>Курс</th>
            </tr>
          </thead>
          <tbody>';
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['full_name']}</td>
            <td>{$row['age']}</td>
            <td>{$row['contacts']}</td>
            <td>{$row['course']}</td>
          </tr>";
}
echo '</tbody></table></div>';

mysqli_close($conn);
?>
