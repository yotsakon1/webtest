<?php include 'config.php'; include 'sidebar.php'; ?>

<div class="content">

<h3>ค้นหานักศึกษา</h3>

<form method="GET">
<input name="search" class="form-control mb-2" placeholder="ค้นหา">
<button class="btn btn-primary">ค้นหา</button>
</form>

<?php
$key = $_GET['search'] ?? '';
$res = $conn->query("SELECT * FROM students WHERE name LIKE '%$key%'");

while($row = $res->fetch_assoc()){
echo "$row[name] $row[surname]<br>";
}
?>

</div>