<?php
/* Smarty version 3.1.33, created on 2021-04-24 01:41:36
  from '/var/www/html/LEAF_Nexus/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60837750f1f0f7_98532718',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e698daac64a54ccbb430312765113e00a0fdf630' => 
    array (
      0 => '/var/www/html/LEAF_Nexus/templates/login.tpl',
      1 => 1613857664,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60837750f1f0f7_98532718 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['name']->value == '') {?>
    <form name="login" method="post" action="?a=login">
    <font class="alert">STATUS: <?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</font>
    <input name="login" type="submit" title="Click to login" value="Login" class="submit" />
    </form>
<?php } else { ?>
    Logged in as: <b><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</b>
<?php }
}
}
