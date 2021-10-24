<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>

<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/login/login.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">

<form action="<?php print(_APP_URL);?>/app/creditCalculator/creditCalculator.php" method="post">
	<label for="amount">Kwota: </label>
	<input id="amount" type="text" name="amount" value="<?php out($amount); ?>" /><br />
	<label for="numberOfYears">Liczba lat: </label>
	<input id="numberOfYears" type="text" name="numberOfYears" value="<?php out($numberOfYears); ?>" /><br />
	<label for="interest">Oprocentowanie: </label>
	<input id="interest" type="text" name="interest" value="<?php out($interest); ?>" /><br />
	<input type="submit" value="Oblicz" />
</form>	

<?php
if (isset($messages)) {
	if (!empty($messages)) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ($messages as $key => $msg) {
			echo '<li>' . $msg . '</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($installment)) { ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesięczna rata kredytu: ' . $installment; ?>
</div>
<?php } ?>

</body>
</html>