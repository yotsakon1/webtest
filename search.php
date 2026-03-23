<?php include 'config.php'; include 'sidebar.php'; ?>

<div class="content">

<h3>ค้นหานักศึกษา</h3>

<form method="GET">
<input name="search" class="form-control mb-2" placeholder="ค้นหา">
<button class="btn btn-primary">ค้นหา</button>
</form>

<?php
// --- เปลี่ยนเป็นแบบนี้ ---
$key = $_GET['search'] ?? '';
$search_param = "%$key%";

$stmt = $conn->prepare("SELECT * FROM students WHERE name LIKE ?");
$stmt->bind_param("s", $search_param);
$stmt->execute();
$res = $stmt->get_result();

while($row = $res->fetch_assoc()){
    echo htmlspecialchars($row['name']) . " " . htmlspecialchars($row['surname']) . "<br>";
}
$stmt->close();

while($row = $res->fetch_assoc()){
echo "$row[name] $row[surname]<br>";
}
?>

</div>