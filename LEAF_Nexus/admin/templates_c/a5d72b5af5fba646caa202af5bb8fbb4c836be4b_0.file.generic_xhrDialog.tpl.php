<?php
/* Smarty version 3.1.33, created on 2021-04-24 02:00:02
  from '/var/www/html/LEAF_Nexus/admin/templates/site_elements/generic_xhrDialog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60837ba2f3e2b5_33329238',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5d72b5af5fba646caa202af5bb8fbb4c836be4b' => 
    array (
      0 => '/var/www/html/LEAF_Nexus/admin/templates/site_elements/generic_xhrDialog.tpl',
      1 => 1615409011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60837ba2f3e2b5_33329238 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="xhrDialog" style="visibility: hidden">
<form id="record" enctype="multipart/form-data" action="javascript:void(0);">
    <div>
        <span id="button_cancelchange" class="buttonNorm" style="position: absolute; left: 10px"><img src="../../libs/dynicons/?img=process-stop.svg&amp;w=16" alt="cancel" /> Cancel</span>
        <span id="button_save" class="buttonNorm" style="position: absolute; right: 10px"><img src="../../libs/dynicons/?img=media-floppy.svg&amp;w=16" alt="save" /> Save Change</span>
        <div style="border-bottom: 2px solid black; line-height: 30px"><br /></div>
        <div id="loadIndicator" style="visibility: hidden; position: absolute; text-align: center; font-size: 24px; font-weight: bold; background: white; padding: 16px; height: 200px; width: 460px">Loading... <img src="../images/largespinner.gif" alt="loading..." /></div>
        <div id="xhr" style="min-width: 540px; min-height: 420px; padding: 8px; overflow: auto; font-size: 12px"></div>
    </div>
</form>
</div>
<?php }
}
