<?php include 'config.php'; include 'sidebar.php'; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="content">

<h3>จัดการข่าว</h3>

<form method="POST">
<input name="title" class="form-control mb-2" placeholder="หัวข้อ">
<textarea name="content" class="form-control mb-2"></textarea>
<button name="save" class="btn btn-primary">บันทึก</button>
</form>

<?php
if(isset($_POST['save'])){
    $conn->query("INSERT INTO news(title,content) VALUES('$_POST[title]','$_POST[content]')");
}
?>

<hr>

<?php
$res = $conn->query("SELECT * FROM news ORDER BY id DESC");
while($n = $res->fetch_assoc()){
echo "<div class='card p-3 mb-2'>
<h5>$n[title]</h5>
<p>$n[content]</p>
<a href='?del=$n[id]' class='btn btn-danger btn-sm'>ลบ</a>
</div>";
}

if(isset($_GET['del'])){
    $conn->query("DELETE FROM news WHERE id=$_GET[del]");
    header("Location: news.php");
}
?>

</div>