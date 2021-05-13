<?php
/* Smarty version 3.1.33, created on 2021-04-23 18:55:08
  from '/var/www/html/LEAF_Request_Portal/admin/templates/view_history_paginated.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6083504c98e675_84810790',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1641105b2c668f5cfa6ee2651aa93a2a8d976c46' => 
    array (
      0 => '/var/www/html/LEAF_Request_Portal/admin/templates/view_history_paginated.tpl',
      1 => 1615409011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6083504c98e675_84810790 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="history-slice"></div>

<div class="leaf-buttonBar">
    <button id="prev" class="usa-button usa-button--base leaf-btn-med leaf-float-left">Previous page</button>
    <button id="next" class="usa-button usa-button leaf-btn-med leaf-float-right">Next page</button>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
    var page = 1;
    var itemId = '<?php echo $_smarty_tpl->tpl_vars['itemId']->value;?>
';

    $.ajax({
        type: 'GET',
        url: 'ajaxIndex.php?a=gethistory&type=<?php echo $_smarty_tpl->tpl_vars['dataType']->value;?>
&gethistoryslice=1&page=1&id='+itemId,
        dataType: 'text',
        success: function(res) {
            $('#history-slice').html(res);
            adjustPageButtons(page);
        },
        cache: false
    });

    $('#prev').on('click', function() {
        page = page - 1;

        $.ajax({
            type: 'GET',
            url: 'ajaxIndex.php?a=gethistory&type=<?php echo $_smarty_tpl->tpl_vars['dataType']->value;?>
&gethistoryslice=1&page=' + page +'&id='+itemId,
            dataType: 'text',
            success: function(res) {
                $('#history-slice').html(res);
                adjustPageButtons(page);
            },
            cache: false
        });
    });

    $('#next').on('click', function() {
        page = page + 1;
        $.ajax({
            type: 'GET',
            url: 'ajaxIndex.php?a=gethistory&type=<?php echo $_smarty_tpl->tpl_vars['dataType']->value;?>
&gethistoryslice=1&id='+itemId+'&page=' + page,
            dataType: 'text',
            success: function(res) {
                $('#history-slice').html(res);
                adjustPageButtons(page);
            },
            cache: false
        });
    });

function adjustPageButtons(page) {
    if(<?php echo $_smarty_tpl->tpl_vars['totalPages']->value;?>
 < 2 || page == <?php echo $_smarty_tpl->tpl_vars['totalPages']->value;?>
) {
        $('#next').hide();
    }
    else {
        $('#next').show();
    }

    if(page == 1) {
        $('#prev').hide();
    }
    else{
        $('#prev').show();
    }
}
<?php echo '</script'; ?>
><?php }
}
