{extends file="../templates/main.tpl"}

{block name=footer}STOPKA{/block}

{block name=content}

<h3>Prosty kalkulator</h2>


<form class="pure-form pure-form-stacked" action="{$app_url}/app/calc.php" method="post">
	<fieldset>
		<label for="kwota">Kwota</label>
		<input id="kwota" type="text" placeholder="Kwota kredytu" name="kwota" value="{$form['kwota']}">
		
		<label for="procent">Procent</label>
		<input id="procent" type="text" placeholder="Procent" name="procent" value="{$form['procent']}">
                
		<label for="okres">Okres</label>
		<input id="okres" type="text" placeholder="Okres kredytowania" name="okres" value="{$form['okres']}">
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>

<div class="messages">

{* wyświeltenie listy błędów, jeśli istnieją *}
{if isset($messages)}
	{if count($messages) > 0} 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		{foreach  $messages as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if isset($infos)}
	{if count($infos) > 0} 
		<h4>Informacje: </h4>
		<ol class="inf">
		{foreach  $infos as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{if isset($result)}
	<h4>Wynik</h4>
	<p class="res">
	{$result}
	</p>
{/if}

</div>

{/block}