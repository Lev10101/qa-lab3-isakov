<?php
include "config.php";

$sql = "SELECT * FROM workouts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Каталог тренировок</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>FitLife</h1>
    <nav>
        <a href="register.php">Регистрация</a>
        <a href="workouts.php">Каталог</a>
        <a href="add_workout.php">Добавить тренировку</a>
        <a href="oop_demo.php">ООП-модуль</a>
    </nav>
</header>

<h2>Каталог тренировок</h2>

<div style="text-align:center; margin:20px;">
    <input type="text" id="searchInput" placeholder="Поиск тренировки...">
</div>

<p id="count" style="text-align:center;"></p>

<table>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Уровень</th>
        <th>Длительность</th>
        <th>Действие</th>
    </tr>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["level"] . "</td>";
        echo "<td>" . $row["duration"] . "</td>";
        echo "<td>
            <button onclick='deleteWorkout(" . $row["id"] . ")'>
                Удалить
            </button>
        </td>";
        echo "</tr>";
    }
}
?>
</table>

<script>
document.getElementById("searchInput").addEventListener("keyup", function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll("table tr");

    rows.forEach((row, index) => {
        if (index === 0) return;

        let text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter) ? "" : "none";
    });

    updateCount();
});

function updateCount() {
    let visibleRows = [...document.querySelectorAll("table tr")]
        .slice(1)
        .filter(row => row.style.display !== "none");

    document.getElementById("count").innerText =
        "Количество тренировок: " + visibleRows.length;
}

updateCount();
</script>

<script>
function deleteWorkout(id) {
    if (!confirm("Удалить тренировку?")) return;

    fetch("ajax_delete.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "id=" + id
    })
    .then(response => response.text())
    .then(data => {
        if (data === "success") {
            let row = document.querySelector("button[onclick='deleteWorkout(" + id + ")']").closest("tr");
            row.remove();
        } else {
            alert("Ошибка удаления");
        }
    });
}
</script>

</body>
</html>