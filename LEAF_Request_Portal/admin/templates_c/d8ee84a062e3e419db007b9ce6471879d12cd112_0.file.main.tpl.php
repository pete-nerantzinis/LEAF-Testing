<?php
/* Smarty version 3.1.33, created on 2021-04-23 22:53:52
  from '/var/www/html/LEAF_Request_Portal/admin/templates/main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60835000d21001_86537109',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8ee84a062e3e419db007b9ce6471879d12cd112' => 
    array (
      0 => '/var/www/html/LEAF_Request_Portal/admin/templates/main.tpl',
      1 => 1615409011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60835000d21001_86537109 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html><html><head><meta name="viewport" content="width=device-width, initial-scale=1"><?php if ($_smarty_tpl->tpl_vars['tabText']->value != '') {?><title><?php echo $_smarty_tpl->tpl_vars['tabText']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 | <?php echo $_smarty_tpl->tpl_vars['city']->value;?>
</title><?php } else { ?><title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 | <?php echo $_smarty_tpl->tpl_vars['city']->value;?>
</title><?php }?><style type="text/css" media="screen">@import "../../libs/js/jquery/css/dcvamc/jquery-ui.custom.min.css";<?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['stylesheets']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>@import "<?php echo $_smarty_tpl->tpl_vars['stylesheets']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
";<?php
}
}
?>@import "../../libs/js/jquery/chosen/chosen.min.css";@import "../../libs/js/jquery/trumbowyg/ui/trumbowyg.min.css";@import "../../libs/js/jquery/icheck/skins/square/blue.css";@import "css/style.css";@import "../../libs/css/leaf.css";</style><style type="text/css" media="print">@import "css/printer.css";</style><?php echo '<script'; ?>
 type="text/javascript" src="../../libs/js/jquery/jquery.min.js"><?php echo '</script'; ?>
><?php if ($_smarty_tpl->tpl_vars['useUI']->value == true) {
echo '<script'; ?>
 type="text/javascript" src="../../libs/js/jquery/jquery-ui.custom.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="../js/dialogController.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="../../libs/js/jquery/chosen/chosen.jquery.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="../../libs/js/jquery/trumbowyg/trumbowyg.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="../../libs/js/jquery/icheck/icheck.js"><?php echo '</script'; ?>
><?php } elseif ($_smarty_tpl->tpl_vars['useLiteUI']->value == true) {
echo '<script'; ?>
 type="text/javascript" src="../js/dialogController.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="../../libs/js/jquery/chosen/chosen.jquery.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="../../libs/js/jquery/trumbowyg/trumbowyg.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="../../libs/js/jquery/icheck/icheck.js"><?php echo '</script'; ?>
><?php }
if ($_smarty_tpl->tpl_vars['leafSecure']->value >= 1) {
echo '<script'; ?>
 type="text/javascript" src="../../libs/js/LEAF/sessionTimeout.js"><?php echo '</script'; ?>
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
?><link rel="icon" href="../vafavicon.ico" type="image/x-icon" /></head><body><?php if ($_smarty_tpl->tpl_vars['leafSecure']->value == 0) {?><section class="usa-banner bg-orange-topbanner" aria-label="Official government website"><header class="usa-banner__header"><div class="grid-col-fill tablet:grid-col-auto"><p class="usa-banner__header-text text-white">&nbsp;Do not enter PHI/PII</p></div></header></section><?php }?><header id="header" class="usa-header site-header"><div class="usa-navbar site-header-navbar"><div class="usa-logo site-logo" id="logo"><em class="usa-logo__text"><a onclick="window.location='./'" title="Home" aria-label="LEAF home" class="leaf-cursor-pointer"><span class="leaf-logo"><?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
</span><span class="leaf-site-title"><?php echo $_smarty_tpl->tpl_vars['city']->value;?>
</span><span id="headerDescription" class="leaf-header-description"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span></a></em><?php if ($_smarty_tpl->tpl_vars['qrcodeURL']->value != '') {?><div><img class="print nodisplay" style="width: 72px" src="../../libs/qrcode/?encode=<?php echo $_smarty_tpl->tpl_vars['qrcodeURL']->value;?>
" alt="QR code" /></div><?php }?></div><div class="leaf-header-right"><?php echo $_smarty_tpl->tpl_vars['emergency']->value;?>
<!--<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
--><nav aria-label="main menu" id="nav"><?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
</nav></div></div></header><div id="body"><?php if ($_smarty_tpl->tpl_vars['status']->value != '') {?><div class="lf-alert"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</div><?php }?><div id="bodyarea" class="default-container"><?php echo $_smarty_tpl->tpl_vars['body']->value;?>
</div></div><footer class="usa-footer leaf-footer noprint" id="footer" <?php if ($_smarty_tpl->tpl_vars['hideFooter']->value == true) {?> style="visibility: hidden; display: none"<?php }?>><a id="versionID" href="../?a=about"><?php echo @constant('PRODUCT_NAME');?>
<br />Version <?php echo @constant('VERSION_NUMBER');?>
 r<?php echo $_smarty_tpl->tpl_vars['revision']->value;?>
</a></footer></body></html>
<?php }
}
