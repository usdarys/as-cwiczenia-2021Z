{extends file="../shared/main.tpl"}

{block name=body}
<nav class="navbar bg-light border-bottom d-flex justify-content-end">
	<a href="{$appUrl}/app/login/login.php" class="btn btn-link me-3">Wyloguj</a>
</nav>

<main>
	<div class="container d-flex justify-content-center credit-calc-form flex-column">
			<form action="{$appUrl}/app/creditCalculator/creditCalculator.php" method="post" class="mt-5 w-100">
				<legend class="text-center mb-3">Kalkulator kredytowy</legend>
				<div class="mb-3">
					<label for="amount" class="form-label">Kwota: </label>
					<input id="amount" type="text" name="amount" value="{$amount}" class="form-control"/>
				</div>
				<div class="mb-3">
					<label for="numberOfYears" class="form-label">Liczba lat: </label>
					<input id="numberOfYears" type="text" name="numberOfYears" value="{$numberOfYears}" class="form-control"/>
				</div>
				<div class="mb-3">
					<label for="interest" class="form-label">Oprocentowanie: </label>
					<input id="interest" type="text" name="interest" value="{$interest}" class="form-control"/>
				</div>

				{if isset($messages)}
					{if !empty($messages)}
						{foreach $messages as $msg}
							<div class="alert alert-danger mb-1">{$msg}</div>
						{/foreach}
					{/if}
				{/if}

				<input type="submit" value="Oblicz miesięczną ratę" class="btn btn-primary mt-2"/>
			</form>	

			{if isset($installment)}
				<div class="alert alert-info mt-2">Miesięczna rata kredytu wynosi: {$installment}</div>
			{/if}
	</div>
</main>
{/block}

