<?php
/* Smarty version 3.1.33, created on 2021-04-23 22:53:58
  from '/var/www/html/LEAF_Request_Portal/admin/templates/site_elements/generic_simple_xhrDialog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60835006567d38_79010709',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55f18789f469780e2703baf41fb1c878be10a57b' => 
    array (
      0 => '/var/www/html/LEAF_Request_Portal/admin/templates/site_elements/generic_simple_xhrDialog.tpl',
      1 => 1613857664,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60835006567d38_79010709 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="simplexhrDialog" role="dialog" class="leaf-dialog-container">
    
    <div role="document">
        
        <div id="simpleloadIndicator" class="leaf-dialog-loader">
            Loading...<img src="../images/largespinner.gif" alt="loading..." />
        </div>

        <main id="simplexhr" class="leaf-dialog-content" role="main"></main>
        
        <aside class="leaf-buttonBar" role="complementary">
            <div class="leaf-float-right">
                <button id="simplebutton_cancelchange" class="usa-button usa-button--outline" style="display: none;">
                    Cancel
                </button>
            </div>

            <div class="leaf-float-left">
                <button id="simplebutton_save" class="usa-button" style="display: none">
                    Save
                </button>
            </div>
        </aside>
        
    </div>

</div>
<?php }
}
