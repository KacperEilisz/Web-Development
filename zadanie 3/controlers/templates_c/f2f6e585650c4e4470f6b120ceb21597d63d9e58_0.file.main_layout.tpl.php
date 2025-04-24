<?php
/* Smarty version 3.1.48, created on 2025-04-24 22:18:30
  from 'E:\xampp\htdocs\templates\main_layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_680a9c964daf44_38296883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2f6e585650c4e4470f6b120ceb21597d63d9e58' => 
    array (
      0 => 'E:\\xampp\\htdocs\\templates\\main_layout.tpl',
      1 => 1745525837,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_680a9c964daf44_38296883 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Moja strona" : $tmp);?>
</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/css/main.css" />
	<noscript><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">

	<div id="wrapper" class="fade-in">

		<?php if ($_smarty_tpl->tpl_vars['show_intro']->value) {?>
			<!-- animacja na poczatku -->
			<div id="intro">
				<h1>Kalkulator<br />kredytowy</h1>
				<p>Oblicz swój kredyt!</p>
				<ul class="actions">
					<li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
				</ul>
			</div>
		<?php }?>

		<!-- pasek z logo -->
		<header id="header">
			<a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
" class="logo">Kalkulator kredytowy</a>
		</header>

		<!-- menu na pasku -->
		<nav id="nav">
			<ul class="links">
				<li class="inactive"><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
">Strona główna</a></li>
                                <li class="inactive"><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/controlers/inna_chroniona.php">Inna chroniona</a></li>
			</ul>
		</nav>

		<!-- zawartosc strony -->
		<div id="main">
			<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1647553991680a9c964d9e91_00452236', "content");
?>

		</div>

		<!-- stopka -->
		<div id="copyright">
			<ul>
				<li>&copy; Untitled</li>
				<li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
			</ul>
		</div>

	</div>

	<!-- skrypty js -->
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/browser.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/util.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/main.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
/* {block "content"} */
class Block_1647553991680a9c964d9e91_00452236 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1647553991680a9c964d9e91_00452236',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
}
