<?php
/* Smarty version 3.1.33, created on 2021-04-24 02:00:13
  from '/var/www/html/LEAF_Nexus/templates/site_elements/genericJS_toolbarAlignment.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60837bad677de6_74487341',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31d64a9a5596979d5a8e8f19ffbcfd1656f419f6' => 
    array (
      0 => '/var/www/html/LEAF_Nexus/templates/site_elements/genericJS_toolbarAlignment.tpl',
      1 => 1615409011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60837bad677de6_74487341 (Smarty_Internal_Template $_smarty_tpl) {
?>//attempt to force a consistent width for the sidebar if there is enough desktop resolution
var lastScreenSize = null;
function sideBar() {
    if(lastScreenSize != $(window).width()) {
        lastScreenSize = $(window).width();

        if(lastScreenSize < 700) {
            mainWidth = lastScreenSize * 0.97;
            $("#toolbar").removeClass("toolbar_right");
            $("#toolbar").addClass("toolbar_inline");
            $("#maincontent").css("width", "98%");
            $("#toolbar").css("width", "98%");
        }
        else {
            mainWidth = (lastScreenSize * 0.8) - 2;
            $("#toolbar").removeClass("toolbar_inline");
            $("#toolbar").addClass("toolbar_right");
            // effective width of toolbar becomes around 200px
            mywidth = Math.floor((1 - 250/lastScreenSize) * 100);
            $("#maincontent").css("width", mywidth + "%");
            $("#toolbar").css("width", 98-mywidth + "%");
        }
    }
}
$(function() {
    sideBar();
    window.onresize = function() {
        sideBar();
    };
});<?php }
}
