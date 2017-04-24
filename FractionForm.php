<?php 
echo "<br>Log of previous results:<br>";
$stmt = FractionDB::run("SELECT * from log");
while($row = $stmt->fetch(PDO::FETCH_LAZY))
{
	echo $row->f1,"+",$row->f2,"=",$row->result,"<br>";
}
echo "<br><br>";

?>
<!doctype html>
<head>
	<title>Дроби</title>
</head>
<body>
<?php if(isset($_SESSION['msg'])) : ?>
	<p style="color:red"> <?= $_SESSION['msg'] ?> </p>
<?php endif ?>
<form method="post">
	F1<input type="text" name="f1" id="f1" maxlength="10" size="10" required>
	F2<input type="text" name="f2" id="f2" maxlength="10" size="10" required>
	<input type="submit" value="Calculate">
</form>

</body>
</html>