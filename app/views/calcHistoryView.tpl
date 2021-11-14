{extends file="navbarView.tpl"}

{block name=main}
<main>
	<div class="container d-flex justify-content-center credit-calc-form flex-column">
        {if !empty($calcHistory)}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Data</th>
                        <th scope="col">Liczba lat</th>
                        <th scope="col">Oprocentowanie</th>
                        <th scope="col">Obliczona rata</th>
                    </tr>
                </thead>
                <tbody>
                {foreach $calcHistory as $record}
                    <tr>
                        <th scope="row">{$record["id"]}</th>
                        <td>{$record["date"]}</td>
                        <td>{$record["number_of_years"]}</td>
                        <td>{$record["interest"]}</td>
                        <td>{$record["installment"]}</td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        {/if}

        {if $messages->isError()}
            {foreach $messages->getErrors() as $msg}
                <div class="alert alert-danger mb-1">{$msg}</div>
            {/foreach}
        {/if}
</main>
{/block}