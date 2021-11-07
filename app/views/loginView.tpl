
{extends file="templates/main.tpl"}

{block name=body}
<main>
	<div class="container d-flex align-items-center login-form">
		<form action="{$appUrl}/app/login/login.php" method="post" class="w-100">
			<legend class="text-center mb-4">Logowanie</legend>
			<fieldset>
				<div class="mb-3">
					<label for="id_login" class="visually-hidden">Login: </label>
					<input id="id_login" type="text" name="login" value="{$form['login']}" placeholder="login" class="form-control"/>
				</div>
				<div class="mb-3">
					<label for="id_pass" class="visually-hidden">Hasło: </label>
					<input id="id_pass" type="password" name="pass" placeholder="hasło" class="form-control"/>
				</div>
			</fieldset>

			{if !$messages->isEmpty()}
				{foreach $messages->getErrors() as $msg}
					<div class="alert alert-danger mb-1">{$msg}</div>
				{/foreach}
			{/if}

			<input type="submit" value="Zaloguj" class="btn btn-primary btn-lg w-100 mt-2"/>
		</form>	
	</div>	
</main>
{/block}