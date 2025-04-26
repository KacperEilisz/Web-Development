{extends file="../templates/main_layout.tpl"}

{block name="content"}
<div style="width:90%; margin: 2em auto;">
    <a href="{$app_url}/calcApp/calc.php" class="pure-button">Powrót do kalkulatora</a>
    <a href="{$app_url}/loginApp/logout.php" class="pure-button">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">
    <p>To jest inna chroniona strona aplikacji internetowej</p>
</div>
{/block}