<?php
/* Smarty version 3.1.33, created on 2021-04-28 00:12:13
  from '/var/www/html/libs/smarty/loading_spinner.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6088a85d6d7216_59937216',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e70a6a90b326584e53f637cb21de6ec8b59451d' => 
    array (
      0 => '/var/www/html/libs/smarty/loading_spinner.tpl',
      1 => 1619564206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6088a85d6d7216_59937216 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="loading-modal">
    <div class="loading-image">
        <div class="load-text"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</div>
        <div class="load-cancel"><button id="load-cancel" type="button" class="usa-button usa-button--outline usa-button--inverse" title="Cancel">Cancel</button></div>
    </div>
</div>

<?php echo '<script'; ?>
>
// loading spinner on each ajax request > 1 second
let loadTime;
$(document).ajaxStart(function() {
    loadTime = setTimeout(function() {$('#body').addClass("loading");}, 1000);
}).ajaxStop(function() {
    clearTimeout(loadTime);
    $('#body').removeClass("loading");
}).ready(function() {
    // loading cancel button
    $('#load-cancel').click(function () {
        $('#body').removeClass("loading");
    });
});
<?php echo '</script'; ?>
><?php }
}
