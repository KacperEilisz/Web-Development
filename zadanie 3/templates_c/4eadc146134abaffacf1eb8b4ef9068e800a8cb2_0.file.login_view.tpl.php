<?php
/* Smarty version 3.1.48, created on 2025-04-24 22:03:42
  from 'E:\xampp\htdocs\views\login_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_680a991e414197_94021848',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4eadc146134abaffacf1eb8b4ef9068e800a8cb2' => 
    array (
      0 => 'E:\\xampp\\htdocs\\views\\login_view.tpl',
      1 => 1745525019,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_680a991e414197_94021848 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1581894557680a991e408c54_98624127', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main_layout.tpl");
}
/* {block "content"} */
class Block_1581894557680a991e408c54_98624127 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1581894557680a991e408c54_98624127',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/controlers/login.php" method="post" class="pure-form pure-form-stacked">
    <legend>Logowanie</legend>
    <fieldset>
        <label for="id_login">Login:</label>
        <input id="id_login" type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['login'];?>
" />
        
        <label for="id_pass">Hasło:</label>
        <input id="id_pass" type="password" name="pass" />
    </fieldset>
    <input type="submit" value="Zaloguj" class="pure-button pure-button-primary" />
</form>

<?php if ((isset($_smarty_tpl->tpl_vars['messages']->value)) && count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?>
<ol style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">
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
<?php }
}
}
/* {/block "content"} */
}
