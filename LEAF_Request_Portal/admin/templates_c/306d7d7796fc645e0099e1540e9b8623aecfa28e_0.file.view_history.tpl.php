<?php
/* Smarty version 3.1.33, created on 2021-04-23 18:55:09
  from '/var/www/html/LEAF_Request_Portal/admin/templates/view_history.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6083504d1c3468_74556339',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '306d7d7796fc645e0099e1540e9b8623aecfa28e' => 
    array (
      0 => '/var/www/html/LEAF_Request_Portal/admin/templates/view_history.tpl',
      1 => 1618235207,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6083504d1c3468_74556339 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/libs/smarty/plugins/modifier.sanitize.php','function'=>'smarty_modifier_sanitize',),));
?>
<div>
<!-- main content -->

    <span id="historyName">
        <?php if ($_smarty_tpl->tpl_vars['titleOverride']->value != null) {?>
            <?php echo $_smarty_tpl->tpl_vars['titleOverride']->value;?>

        <?php } else { ?>
            <?php echo $_smarty_tpl->tpl_vars['dataType']->value;?>
 Name: <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['dataName']->value);?>

        <?php }?>
    </span>

    <?php if (!is_null($_smarty_tpl->tpl_vars['dataID']->value)) {?>
        History of <?php echo $_smarty_tpl->tpl_vars['dataType']->value;?>
 ID : <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['dataID']->value);?>

    <?php }?>

    <div>
        <?php if (count($_smarty_tpl->tpl_vars['history']->value) == 0) {?>
            No history to show!
        <?php } else { ?>

            <table class="usa-table usa-table--borderless leaf-width100pct" id="maintable" style="width: 760px">
                <thead>
                    <tr>
                        <th>Timestamp</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['history']->value, 'log');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['log']->value) {
?><tr><td class="leaf-textLeft leaf-width25pct"><?php echo $_smarty_tpl->tpl_vars['log']->value['timestamp'];?>
</td><td class="leaf-width75pct"><span><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['log']->value['history']);?>
 by <b><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['log']->value['userName']);?>
</b></span></td></tr><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>

        <?php }?>

    </div>


</div>
<!-- close main content -->
<?php }
}
