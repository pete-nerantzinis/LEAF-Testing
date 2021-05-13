<?php
/* Smarty version 3.1.33, created on 2021-04-24 01:41:39
  from '/var/www/html/LEAF_Nexus/templates/print_subindicators.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6083775322a072_20704969',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55d854d885b9f789c1b40d7740f9fd1dce3d22f6' => 
    array (
      0 => '/var/www/html/LEAF_Nexus/templates/print_subindicators.tpl',
      1 => 1615409011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:print_subindicators_ajax.tpl' => 1,
  ),
),false)) {
function content_6083775322a072_20704969 (Smarty_Internal_Template $_smarty_tpl) {
if (!isset($_smarty_tpl->tpl_vars['depth']->value)) {
$_smarty_tpl->_assignInScope('depth', 0);
}
if ($_smarty_tpl->tpl_vars['depth']->value == 0) {
$_smarty_tpl->_assignInScope('color', '#e0e0e0');
} else {
$_smarty_tpl->_assignInScope('color', 'white');
}
if ($_smarty_tpl->tpl_vars['form']->value) {?><div class="printformblock"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['form']->value, 'indicator');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['indicator']->value) {
if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == null || $_smarty_tpl->tpl_vars['indicator']->value['format'] == 'textarea') {
$_smarty_tpl->_assignInScope('colspan', 2);
} else {
$_smarty_tpl->_assignInScope('colspan', 1);
}
if ($_smarty_tpl->tpl_vars['depth']->value == 0) {?><div class="printmainblock<?php if (($_smarty_tpl->tpl_vars['indicator']->value['required'] == 0 && $_smarty_tpl->tpl_vars['indicator']->value['data'] == '') || $_smarty_tpl->tpl_vars['indicator']->value['format'] == 'json') {?> notrequired<?php }?>"><div class="printmainlabel"><?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1 && $_smarty_tpl->tpl_vars['indicator']->value['isEmpty'] == true) {?><div role="button" tabindex="0" id="PHindicator_<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']), ENT_QUOTES, 'UTF-8', true);?>
" class="printheading_missing" style="cursor: pointer" onkeypress="triggerClick(event, 'PHindicator_<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']), ENT_QUOTES, 'UTF-8', true);?>
')" onclick="orgchartForm.getForm(<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['uid']->value), ENT_QUOTES, 'UTF-8', true);?>
, <?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['categoryID']->value), ENT_QUOTES, 'UTF-8', true);?>
, <?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']), ENT_QUOTES, 'UTF-8', true);?>
);"><?php } else { ?><div role="button" tabindex="0" id="PHindicator_<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']), ENT_QUOTES, 'UTF-8', true);?>
" class="printheading" style="cursor: pointer" onkeypress="triggerClick(event, 'PHindicator_<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']), ENT_QUOTES, 'UTF-8', true);?>
')" onclick="orgchartForm.getForm(<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['uid']->value), ENT_QUOTES, 'UTF-8', true);?>
, <?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['categoryID']->value), ENT_QUOTES, 'UTF-8', true);?>
, <?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']), ENT_QUOTES, 'UTF-8', true);?>
);"><?php }?><div style="float: left"><?php if ($_smarty_tpl->tpl_vars['date']->value < $_smarty_tpl->tpl_vars['indicator']->value['timestamp'] && $_smarty_tpl->tpl_vars['date']->value > 0) {?><img src="../libs/dynicons/?img=appointment.svg&amp;w=16" alt="View History" title="View History" style="cursor: pointer" onclick="getIndicatorLog(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['indicator']->value['indicatorID'], ENT_QUOTES, 'UTF-8', true);?>
); $('#histdialog1').dialog('open')" />&nbsp;<?php }
if ($_smarty_tpl->tpl_vars['indicator']->value['isWritable'] == 0) {?><img src="../libs/dynicons/?img=emblem-readonly.svg&amp;w=16" alt="Read-only" title="Read-only" />&nbsp;<?php } else { ?><img src="../libs/dynicons/?img=accessories-text-editor.svg&amp;w=16" alt="Edit this field" title="Edit this field" style="cursor: pointer" />&nbsp;<?php }?></div><?php if ($_smarty_tpl->tpl_vars['indicator']->value['isWritable'] == 0) {?><span class="printsubheading" title="indicatorID: <?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['name']), ENT_QUOTES, 'UTF-8', true);?>
: </span><?php } else { ?><span class="printsubheading" title="indicatorID: <?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['name']), ENT_QUOTES, 'UTF-8', true);?>
: </span><?php }?><span class="printResponse" id="xhrIndicator_<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']), ENT_QUOTES, 'UTF-8', true);?>
_<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['categoryID']->value), ENT_QUOTES, 'UTF-8', true);?>
_<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
"><?php $_smarty_tpl->_subTemplateRender("file:print_subindicators_ajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></span><?php } else { ?><div class="printsubblock"><div class="printsublabel"><?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1 && $_smarty_tpl->tpl_vars['indicator']->value['isEmpty'] == true) {?><div class="printsubheading_missing"><?php } else { ?><div class="printsubheading"><?php }
if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == null) {?><span class="printsubheading" title="indicatorID: <?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo preg_replace('!^!m',str_repeat('',$_smarty_tpl->tpl_vars['depth']->value),htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['name']), ENT_QUOTES, 'UTF-8', true));?>
</span><?php } else { ?><span class="printsubheading" title="indicatorID: <?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo preg_replace('!^!m',str_repeat('',$_smarty_tpl->tpl_vars['depth']->value),htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['name']), ENT_QUOTES, 'UTF-8', true));?>
</span><?php }
}?><br style="clear: both" /></div></div><!-- end print sublabel --></div><!-- end print block --><?php if ($_smarty_tpl->tpl_vars['depth']->value == 0) {
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><span role="button" tabindex="0" class="tempText" id="showallfields" style="float: right; text-decoration: underline; font-size: 80%; cursor: pointer" onkeypress="triggerClick(event, 'showallfields')" onclick="showAllFields(); announceAction('showing all fields');">Show_all_fields</span><br /><?php }
echo '<script'; ?>
 type="text/javascript">
    function triggerClick(e, id) {
        if(e.keyCode === 13) {
            $('#' + id).trigger('click');
        }
    }
    function announceAction(actionName) {
        $('#buttonClick').attr('aria-label', actionName);
    }
    function showAllFields() {
        $('.printformblock').css('display', 'inline');
        $('.notrequired').css('display', 'inline');
        $('.tempText').css('display', 'none');
    }
<?php echo '</script'; ?>
>
<?php }
}
