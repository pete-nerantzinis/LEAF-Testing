<?php
/* Smarty version 3.1.33, created on 2021-04-24 01:41:37
  from '/var/www/html/LEAF_Nexus/templates/menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_608377515b5f19_81770051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86f698b8339fba1698bb1a57b99088b887aab192' => 
    array (
      0 => '/var/www/html/LEAF_Nexus/templates/menu.tpl',
      1 => 1615409011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_608377515b5f19_81770051 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['action']->value != '') {?>
    <a href="./" class="buttonNorm"><img src="../libs/dynicons/?img=go-home.svg&amp;w=16" alt="Main Page" title="Main Page" />Main Page</a>
<?php }
if (isset($_smarty_tpl->tpl_vars['isAdmin']->value)) {?>
    <a href="./admin/" class="buttonNorm"><img src="../libs/dynicons/?img=applications-system.svg&amp;w=16" alt="Admin Panel" title="Admin Panel" />OC Admin Panel</a>
<?php }?>    
<br />
<noscript class="alert"><span>Javascript must be enabled for this version of software to work!</span></noscript>
<?php }
}
