<?php
/* Smarty version 3.1.33, created on 2021-04-12 11:29:41
  from '/var/www/html/LEAF_Request_Portal/templates/menu_links.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60746765c82906_49698209',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd411bb059883e87a9f97eafe80f55cb1bba80988' => 
    array (
      0 => '/var/www/html/LEAF_Request_Portal/templates/menu_links.tpl',
      1 => 1615409011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60746765c82906_49698209 (Smarty_Internal_Template $_smarty_tpl) {
?><a href="<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
" target="_blank" role="button">
    <span class="menuButtonSmall" style="background-color: #ffecb7">
        <img class="menuIconSmall" src="../libs/dynicons/?img=applications-internet.svg&amp;w=76" style="position: relative" alt="Org Chart" title="Org Chart" />
        <span class="menuTextSmall">LEAF Nexus</span><br />
        <span class="menuDescSmall">Org. Charts and Employee Information for your facility</span>
    </span>
</a>
<?php }
}
