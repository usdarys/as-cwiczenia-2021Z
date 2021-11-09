{extends file="main.tpl"}

{block name=body}
	<nav class="navbar bg-light border-bottom d-flex justify-content-between mb-3">
		<div>
			<a href="{$conf->actionUrl}creditCalculator" class="btn btn-link">Kalkulator kredytowy</a>
			<a href="{$conf->actionUrl}calcHistory" class="btn btn-link">Historia obliczeń</a>
		</div>
		<a href="{$conf->actionUrl}logout" class="btn btn-link me-3">Wyloguj</a>
	</nav>
	{block name=main}{/block}
{/block}