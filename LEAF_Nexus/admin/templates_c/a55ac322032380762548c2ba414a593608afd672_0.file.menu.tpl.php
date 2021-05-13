<?php
/* Smarty version 3.1.33, created on 2021-04-24 02:00:03
  from '/var/www/html/LEAF_Nexus/admin/templates/menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60837ba32e8484_58999540',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a55ac322032380762548c2ba414a593608afd672' => 
    array (
      0 => '/var/www/html/LEAF_Nexus/admin/templates/menu.tpl',
      1 => 1615409011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60837ba32e8484_58999540 (Smarty_Internal_Template $_smarty_tpl) {
?>    <a href="../" class="buttonNorm"><img src="../../libs/dynicons/?img=go-home.svg&amp;w=16" alt="Main Page" title="Main Page" />Main Page</a>
<?php if (isset($_smarty_tpl->tpl_vars['isAdmin']->value)) {?>
    <a href="./" class="buttonNorm"><img src="../../libs/dynicons/?img=applications-system.svg&amp;w=16" alt="Admin Panel" title="Admin Panel" />OC Admin Panel</a>
<?php }?>    
<br />
<noscript class="alert"><span>Javascript must be enabled for this version of software to work!</span></noscript><?php }
}
