<?php
/* Smarty version 3.1.48, created on 2025-04-24 22:22:53
  from 'E:\xampp\htdocs\views\calc_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_680a9d9d83ffa5_26645689',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f3b1f546dcc33f862f8aecb1fdeeb314484227a7' => 
    array (
      0 => 'E:\\xampp\\htdocs\\views\\calc_view.tpl',
      1 => 1745526160,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_680a9d9d83ffa5_26645689 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_708059860680a9d9d835545_70461362', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main_layout.tpl");
}
/* {block "content"} */
class Block_708059860680a9d9d835545_70461362 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_708059860680a9d9d835545_70461362',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/controlers/calc.php" method="post" class="pure-form pure-form-stacked">
    <legend>Kalkulator kredytowy</legend>
    <fieldset>
        <label for="id_kwota">Kwota kredytu:</label>
        <input id="id_kwota" type="text" name="kwota" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['kwota'];?>
" />
        
        <label for="id_procent">Procent kredytu:</label>
        <input id="id_procent" type="text" name="procent" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['procent'];?>
" />
        
        <label for="id_okres">Okres kredytowania:</label>
        <input id="id_okres" type="text" name="okres" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['okres'];?>
" />
    </fieldset>
    <input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
</form>

<?php if ((isset($_smarty_tpl->tpl_vars['messages']->value)) && count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?>
<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
        <li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ol>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
<div style="margin-top: 1em; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em;">
    Wynik: <?php echo $_smarty_tpl->tpl_vars['result']->value;?>

</div>
<?php }?>

<!-- Dodajemy formularz wylogowania -->
<form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/controlers/logout.php" method="post">
    <input type="submit" value="Wyloguj" class="pure-button pure-button-error" />
</form>

<?php
}
}
/* {/block "content"} */
}
