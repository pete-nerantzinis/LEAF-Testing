<?php
/* Smarty version 3.1.33, created on 2021-04-23 22:53:52
  from '/var/www/html/LEAF_Request_Portal/admin/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60835000819470_15622172',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce4f46d49be4d8aacde8718c4f8282d2f34dfd68' => 
    array (
      0 => '/var/www/html/LEAF_Request_Portal/admin/templates/login.tpl',
      1 => 1613857664,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60835000819470_15622172 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['name']->value == '') {?>
    <form name="login" method="post" action="?a=login">
        <span class="alert">STATUS: <?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</span>
        <input name="login" type="submit" title="Click to login" value="Login" class="submit" />
    </form>
<?php } else { ?>
    <ul class="leaf-user-menu" aria-haspopup="true">
        <li>Welcome, <span class="leaf-bold"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</span><a href="../?a=logout">SIGN OUT</a></li>
    </ul>
<?php }?>

<?php echo '<script'; ?>
>
    menu508($('#button_showLinks'), $('#headerMenu_links'), $('#headerMenu_links').find('a'));
    menu508($('#button_showHelp'), $('#headerMenu_help'), $('#headerMenu_help'));

    function menu508(menuButton, subMenu, subMenuButton)
    {
        $(menuButton).keypress(function(e) {
            if (e.keyCode === 13) {
                $(subMenu).css("display", "block");
                $(menuButton).attr('aria-expanded', 'true');
                subMenuButton.focus();
            }
        });

        $(subMenuButton).focusout(function() {
                $(subMenu).css("display", "none");
                $(menuButton).attr('aria-expanded', 'false');
                $(menuButton).focus();
        });
    }
<?php echo '</script'; ?>
>

<?php }
}
