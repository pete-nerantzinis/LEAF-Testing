<?php
/* Smarty version 3.1.33, created on 2021-04-23 22:00:28
  from '/var/www/html/LEAF_Request_Portal/templates/site_elements/generic_dialog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60837bbc44fe01_47755920',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de1c1bca89ba5f7a86719018bf33cf2c854b5dd7' => 
    array (
      0 => '/var/www/html/LEAF_Request_Portal/templates/site_elements/generic_dialog.tpl',
      1 => 1613857664,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60837bbc44fe01_47755920 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="genericDialog" style="visibility: hidden; display: none">
    <div>
        <div id="genericDialogbutton_cancelchange" style="display: none"></div>
        <div id="genericDialogbutton_save" style="display: none"></div>
        <div id="genericDialogloadIndicator" style="visibility: hidden; z-index: 9000; position: absolute; text-align: center; font-size: 24px; font-weight: bold; background-color: #f2f5f7; padding: 16px; height: 400px; width: 526px"><img src="images/largespinner.gif" alt="loading..." /></div>
        <div id="genericDialogxhr" style="min-width: 540px; min-height: 420px; padding: 8px; overflow: auto; font-size: 12px"></div>
    </div>
</div>
<?php }
}
