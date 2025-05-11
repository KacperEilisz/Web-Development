<?php
/* Smarty version 3.1.48, created on 2025-05-07 22:29:29
  from 'E:\xampp\htdocs\calcApp\views\calc_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_681bc2a991a154_34855943',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19f16de92594ea0d079cd91ed5bef7fe406b7e01' => 
    array (
      0 => 'E:\\xampp\\htdocs\\calcApp\\views\\calc_view.tpl',
      1 => 1746649765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_681bc2a991a154_34855943 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_587896593681bc2a9910fd5_21103088', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_layout.tpl");
}
/* {block "content"} */
class Block_587896593681bc2a9910fd5_21103088 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_587896593681bc2a9910fd5_21103088',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute" method="post" class="pure-form pure-form-stacked">
    <legend>Kalkulator kredytowy</legend>
    <fieldset>
        <label for="id_kwota">Kwota kredytu:</label>
        <input id="id_kwota" type="text" name="kwota" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota;?>
" />
        
        <label for="id_procent">Procent kredytu:</label>
        <input id="id_procent" type="text" name="procent" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->procent;?>
" />
        
        <label for="id_okres">Okres kredytowania:</label>
        <input id="id_okres" type="text" name="okres" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->okres;?>
" />
    </fieldset>
    <input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
</form>

<?php if ($_smarty_tpl->tpl_vars['messages']->value->isError()) {?>
<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value->getErrors(), 'messages');
$_smarty_tpl->tpl_vars['messages']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['messages']->value) {
$_smarty_tpl->tpl_vars['messages']->do_else = false;
?>
        <li><?php echo $_smarty_tpl->tpl_vars['messages']->value;?>
</li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ol>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['result']->value->result))) {?>
<div style="margin-top: 1em; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em;">
    Wynik: <?php echo $_smarty_tpl->tpl_vars['result']->value->result;?>

</div>
<?php }?>

<!-- przycisk wylogowania -->
<div class="pure-button pure-button-primary">
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout"  class="pure-button pure-button-primary">wyloguj</a>
</div>


<?php
}
}
/* {/block "content"} */
}
