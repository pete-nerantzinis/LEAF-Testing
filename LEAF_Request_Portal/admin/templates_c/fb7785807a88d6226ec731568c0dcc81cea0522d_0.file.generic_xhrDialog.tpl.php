<?php
/* Smarty version 3.1.33, created on 2021-04-28 00:12:13
  from '/var/www/html/LEAF_Request_Portal/admin/templates/site_elements/generic_xhrDialog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6088a85d7c1860_47713185',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb7785807a88d6226ec731568c0dcc81cea0522d' => 
    array (
      0 => '/var/www/html/LEAF_Request_Portal/admin/templates/site_elements/generic_xhrDialog.tpl',
      1 => 1619564206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6088a85d7c1860_47713185 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="xhrDialog" class="leaf-dialog-container" role="dialog">

    <form id="record" enctype="multipart/form-data" action="javascript:void(0);">

        <div role="document">
            
            <div id="loadIndicator" class="leaf-dialog-loader">
                Loading...<img src="../images/largespinner.gif" alt="loading..." />
            </div>
            
            <main id="xhr" class="leaf-dialog-content" role="main"></main>

            <aside class="leaf-buttonBar" role="complementary">
                <div class="leaf-float-right">
                    <button id="button_cancelchange" class="usa-button usa-button--outline leaf-btn-med">
                        Cancel
                    </button>
                </div>

                <div class="leaf-float-left">
                    <button id="button_save" class="usa-button leaf-btn-med">
                        Save
                    </button>
                </div>
            </aside>

        </div>

    </form>

</div>
<?php }
}
