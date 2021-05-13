<?php
/* Smarty version 3.1.33, created on 2021-04-12 11:29:41
  from '/var/www/html/LEAF_Request_Portal/templates/menu_help.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60746765d54c68_46429711',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '733cb7aead5ee72d04bea97e56572e66f1a53f3a' => 
    array (
      0 => '/var/www/html/LEAF_Request_Portal/templates/menu_help.tpl',
      1 => 1615409011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60746765d54c68_46429711 (Smarty_Internal_Template $_smarty_tpl) {
?>For Help contact your primary admin:
<div id="help-primary-admin" style="font-weight:bold;"></div>
<?php echo '<script'; ?>
 type="text/javascript">
    $.ajax({
        url: "api/system/primaryadmin",
        dataType: "json",
        success: function(response) {
            var emailString = response['Email'] != '' ? " - " + response['Email'] : '';
            if(response["Fname"] !== undefined)
            {
                $('#help-primary-admin').html(response['Fname'] + " " + response['Lname'] + emailString);
            }
            else if(response["userName"] !== undefined)
            {
                $('#help-primary-admin').html(response['userName']);
            }
            else
            {
                $('#help-primary-admin').html('Primary Admin has not been set.');
            }
                
        }
    });
<?php echo '</script'; ?>
><?php }
}
