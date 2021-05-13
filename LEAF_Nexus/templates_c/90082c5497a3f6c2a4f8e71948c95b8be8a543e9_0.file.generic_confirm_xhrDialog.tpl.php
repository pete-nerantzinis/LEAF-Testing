<?php
/* Smarty version 3.1.33, created on 2021-04-24 23:26:57
  from '/var/www/html/LEAF_Nexus/templates/site_elements/generic_confirm_xhrDialog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6084a941efdc59_60407380',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90082c5497a3f6c2a4f8e71948c95b8be8a543e9' => 
    array (
      0 => '/var/www/html/LEAF_Nexus/templates/site_elements/generic_confirm_xhrDialog.tpl',
      1 => 1615409011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6084a941efdc59_60407380 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="confirm_xhrDialog" style="visibility: hidden">
<form id="confirm_record" enctype="multipart/form-data" action="javascript:void(0);">
    <div style="background-color: #feffd1; border: 1px solid black">
        <div id="confirm_loadIndicator" style="visibility: hidden; position: absolute; text-align: center; font-size: 24px; font-weight: bold; background: white; padding: 16px; height: 100px; width: 360px">Loading... <img src="images/largespinner.gif" alt="loading..." /></div>
        <div id="confirm_xhr" style="width: 400px; height: 120px; padding: 16px; overflow: auto"></div>
        <div style="position: absolute; left: 10px; font-size: 140%"><button class="buttonNorm" id="confirm_button_cancelchange"><img src="../libs/dynicons/?img=edit-undo.svg&amp;w=32" alt="No" title="No" /> No</button></div>
        <div style="text-align: right; padding-right: 6px"><button class="buttonNorm" id="confirm_button_save"><img src="../libs/dynicons/?img=media-floppy.svg&amp;w=32" alt="Yes" title="Yes" /><span id="confirm_saveBtnText"> Yes</span></button></div><br />
    </div>
</form>
</div><?php }
}
