<?php
/* Smarty version 3.1.33, created on 2021-04-12 11:29:42
  from '/var/www/html/LEAF_Request_Portal/templates/main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6074676604e145_87118817',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fd513c70f0146a2b6f530f541d8ca00ab399bf6' => 
    array (
      0 => '/var/www/html/LEAF_Request_Portal/templates/main.tpl',
      1 => 1615409011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6074676604e145_87118817 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/libs/smarty/plugins/modifier.sanitize.php','function'=>'smarty_modifier_sanitize',),));
?>
<!DOCTYPE html><html lang="en"><head><?php if ($_smarty_tpl->tpl_vars['tabText']->value != '') {?><title><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['tabText']->value);?>
 - <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['title']->value);?>
 | <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['city']->value);?>
</title><?php } else { ?><title><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['title']->value);?>
 | <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['city']->value);?>
</title><?php }?><meta name="viewport" content="width=device-width, initial-scale=1"><style type="text/css" media="screen">@import "../libs/js/jquery/css/dcvamc/jquery-ui.custom.min.css";<?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['stylesheets']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>@import "<?php echo $_smarty_tpl->tpl_vars['stylesheets']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
";<?php
}
}
?>@import "css/style.css";@import "../libs/js/jquery/chosen/chosen.min.css";@import "../libs/js/jquery/trumbowyg/ui/trumbowyg.min.css";@import "../libs/js/jquery/icheck/skins/square/blue.css";</style><style type="text/css" media="print">@import "css/printer.css";</style><?php echo '<script'; ?>
 type="text/javascript" src="../libs/js/jquery/jquery.min.js"><?php echo '</script'; ?>
><?php if ($_smarty_tpl->tpl_vars['useUI']->value == true) {
echo '<script'; ?>
 type="text/javascript" src="../libs/js/jquery/jquery-ui.custom.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="js/dialogController.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="../libs/js/jquery/chosen/chosen.jquery.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="../libs/js/jquery/trumbowyg/trumbowyg.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="../libs/js/jquery/icheck/icheck.js"><?php echo '</script'; ?>
><?php } elseif ($_smarty_tpl->tpl_vars['useLiteUI']->value == true) {
echo '<script'; ?>
 type="text/javascript" src="js/dialogController.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="../libs/js/jquery/chosen/chosen.jquery.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="../libs/js/jquery/trumbowyg/trumbowyg.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="../libs/js/jquery/icheck/icheck.js"><?php echo '</script'; ?>
><?php }
if ($_smarty_tpl->tpl_vars['leafSecure']->value >= 1) {
echo '<script'; ?>
 type="text/javascript" src="../libs/js/LEAF/sessionTimeout.js"><?php echo '</script'; ?>
><?php }
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['javascripts']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total !== 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['javascripts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
"><?php echo '</script'; ?>
><?php
}
}
?><link rel="icon" href="vafavicon.ico" type="image/x-icon" /></head><body><div id="header"><?php if ($_smarty_tpl->tpl_vars['qrcodeURL']->value != '') {?><div style="float: left"><img class="print nodisplay" style="width: 72px" src="../libs/qrcode/?encode=<?php echo $_smarty_tpl->tpl_vars['qrcodeURL']->value;?>
" alt="QR code" /></div><?php }?><div style="cursor: pointer" onclick="window.location='./'"><span style="position: absolute"><img src="images/VA_icon_small.png" style="width: 80px" alt="VA logo" /></span><span id="headerLabel"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['city']->value);?>
</span><span id="headerDescription"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['title']->value);?>
</span></div><span id="headerHelp"><?php if ($_smarty_tpl->tpl_vars['leafSecure']->value == 0) {?><div class="alert" style="display: inline"><span>Do not enter PHI/PII.</span></div><?php }
echo $_smarty_tpl->tpl_vars['login']->value;?>
</span><span id="headerLogin"></span><span id="headerTab"><?php echo $_smarty_tpl->tpl_vars['emergency']->value;
echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['tabText']->value);?>
</span><span id="headerTabImg"><img src="images/tab.png" alt="tab" /></span><span id="headerMenu" class="noprint"><?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
</span></div><div id="body"><div id="content"><?php if ($_smarty_tpl->tpl_vars['status']->value != '') {?><div class="alert"><span><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</span></div><?php }?><div id="bodyarea"><?php echo $_smarty_tpl->tpl_vars['body']->value;?>
</div></div></div><div class="noprint" id="footer"<?php if ($_smarty_tpl->tpl_vars['hideFooter']->value == true) {?> style="visibility: hidden; display: none"<?php }?>><br /><br /><a id="versionID" href="?a=about"><?php echo @constant('PRODUCT_NAME');?>
<br />Version <?php echo @constant('VERSION_NUMBER');?>
 r<?php echo $_smarty_tpl->tpl_vars['revision']->value;?>
</a></div></body></html>
<?php }
}
