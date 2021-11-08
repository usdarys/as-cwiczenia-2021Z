{extends file="templates/main.tpl"}

{block name=body}
<nav class="navbar bg-light border-bottom d-flex justify-content-end">
	<a href="{$conf->actionUrl}logout" class="btn btn-link me-3">Wyloguj</a>
</nav>

<main>
	<div class="container d-flex justify-content-center credit-calc-form flex-column">
			<form action="{$conf->actionUrl}creditCalculator" method="post" class="mt-5 w-100">
				<legend class="text-center mb-3">Kalkulator kredytowy</legend>
				<div class="mb-3">
					<label for="amount" class="form-label">Kwota: </label>
					<input id="amount" type="text" name="amount" value="{$form->amount}" class="form-control"/>
				</div>
				<div class="mb-3">
					<label for="numberOfYears" class="form-label">Liczba lat: </label>
					<input id="numberOfYears" type="text" name="numberOfYears" value="{$form->numberOfYears}" class="form-control"/>
				</div>
				<div class="mb-3">
					<label for="interest" class="form-label">Oprocentowanie: </label>
					<input id="interest" type="text" name="interest" value="{$form->interest}" class="form-control"/>
				</div>

				{if !$messages->isEmpty()}
					{foreach $messages->getErrors() as $msg}
						<div class="alert alert-danger mb-1">{$msg}</div>
					{/foreach}
				{/if}

				<input type="submit" value="Oblicz miesięczną ratę" class="btn btn-primary mt-2"/>
			</form>	

			{if isset($installment)}
				<div class="alert alert-info mt-2">Miesięczna rata kredytu wynosi: {$installment}</div>
			{/if}
	</div>
</main>
{/block}