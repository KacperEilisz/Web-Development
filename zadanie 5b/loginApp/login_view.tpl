{extends file="../templates/main_layout.tpl"}

{block name="content"}
<form action="{$app_url}/loginApp/login.php" method="post" class="pure-form pure-form-stacked">
    <legend>Logowanie</legend>
    <fieldset>
        <label for="id_login">Login:</label>
        <input id="id_login" type="text" name="login" value="{$form['login']}" />
        
        <label for="id_pass">Hasło:</label>
        <input id="id_pass" type="password" name="pass" />
    </fieldset>
    <input type="submit" value="Zaloguj" class="pure-button pure-button-primary" />
</form>

{if isset($messages) && $messages|@count > 0}
<ol style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">
    {foreach from=$messages item=msg}
        <li>{$messages}</li>
    {/foreach}
</ol>
{/if}
{/block}