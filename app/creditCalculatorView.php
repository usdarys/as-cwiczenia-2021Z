<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/creditCalculator.php" method="post">
	<label for="amount">Kwota: </label>
	<input id="amount" type="text" name="amount" value="<?php if (isset($amount)) print($amount); ?>" /><br />
	<label for="numberOfYears">Liczba lat: </label>
	<input id="numberOfYears" type="text" name="numberOfYears" value="<?php if (isset($numberOfYears)) print($numberOfYears); ?>" /><br />
	<label for="interest">Oprocentowanie: </label>
	<input id="interest" type="text" name="interest" value="<?php if (isset($interest)) print($interest); ?>" /><br />
	<input type="submit" value="Oblicz" />
</form>	

<?php
if (isset($messages)) {
	if (count ($messages) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ($messages as $key => $msg) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($installment)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesięczna rata kredytu: '. $installment; ?>
</div>
<?php } ?>

</body>
</html>