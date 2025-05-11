{extends file="main_layout.tpl"}

{block name="content"}
<form action="{$conf->action_root}calcCompute" method="post" class="pure-form pure-form-stacked">
    <legend>Kalkulator kredytowy</legend>
    <fieldset>
        <label for="id_kwota">Kwota kredytu:</label>
        <input id="id_kwota" type="text" name="kwota" value="{$form->kwota}" />
        
        <label for="id_procent">Procent kredytu:</label>
        <input id="id_procent" type="text" name="procent" value="{$form->procent}" />
        
        <label for="id_okres">Okres kredytowania:</label>
        <input id="id_okres" type="text" name="okres" value="{$form->okres}" />
    </fieldset>
    <input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
</form>

{if $messages->isError()}
<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">
    {foreach from=$messages->getErrors() item=messages}
        <li>{$messages}</li>
    {/foreach}
</ol>
{/if}

{if isset($result->result)}
<div style="margin-top: 1em; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em;">
    Wynik: {$result->result}
</div>
{/if}

<!-- przycisk wylogowania -->
<div class="pure-button pure-button-primary">
	<a href="{$conf->action_url}logout"  class="pure-button pure-button-primary">wyloguj</a>
</div>


{/block}