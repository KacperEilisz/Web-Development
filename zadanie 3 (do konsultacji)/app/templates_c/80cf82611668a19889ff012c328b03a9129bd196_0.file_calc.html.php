<?php
/* Smarty version 5.4.2, created on 2025-03-31 20:30:01
  from 'file:E:\xampp\htdocs/app/calc.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67eadf291bdbf3_13453549',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80cf82611668a19889ff012c328b03a9129bd196' => 
    array (
      0 => 'E:\\xampp\\htdocs/app/calc.html',
      1 => 1743445799,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67eadf291bdbf3_13453549 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp\\htdocs\\app';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_113691973067eadf291af8c1_31508980', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_29912360267eadf291b1c23_39587903', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../templates/main.html", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_113691973067eadf291af8c1_31508980 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp\\htdocs\\app';
?>
STOPKA<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_29912360267eadf291b1c23_39587903 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp\\htdocs\\app';
?>


<h3>Prosty kalkulator</h2>


<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/calc.php" method="post">
	<fieldset>
		<label for="kwota">Kwota</label>
		<input id="kwota" type="text" placeholder="Kwota kredytu" name="kwota" value="<?php echo $_smarty_tpl->getValue('form')['kwota'];?>
">
		
		<label for="procent">Procent</label>
		<input id="procent" type="text" placeholder="Procent" name="procent" value="<?php echo $_smarty_tpl->getValue('form')['procent'];?>
">
                
		<label for="okres">Okres</label>
		<input id="okres" type="text" placeholder="Okres kredytowania" name="okres" value="<?php echo $_smarty_tpl->getValue('form')['okres'];?>
">
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>

<div class="messages">

<?php if ((null !== ($_smarty_tpl->getValue('messages') ?? null))) {?>
	<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?> 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
		<li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
		<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((null !== ($_smarty_tpl->getValue('infos') ?? null))) {?>
	<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('infos')) > 0) {?> 
		<h4>Informacje: </h4>
		<ol class="inf">
		<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('infos'), 'msg');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach1DoElse = false;
?>
		<li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
		<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((null !== ($_smarty_tpl->getValue('result') ?? null))) {?>
	<h4>Wynik</h4>
	<p class="res">
	<?php echo $_smarty_tpl->getValue('result');?>

	</p>
<?php }?>

</div>

<?php
}
}
/* {/block 'content'} */
}
