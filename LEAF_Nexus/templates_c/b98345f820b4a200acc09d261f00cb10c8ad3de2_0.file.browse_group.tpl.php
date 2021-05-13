<?php
/* Smarty version 3.1.33, created on 2021-04-24 02:00:13
  from '/var/www/html/LEAF_Nexus/templates/browse_group.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60837bad492e69_67985461',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b98345f820b4a200acc09d261f00cb10c8ad3de2' => 
    array (
      0 => '/var/www/html/LEAF_Nexus/templates/browse_group.tpl',
      1 => 1615409011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:site_elements/generic_xhrDialog.tpl' => 1,
    'file:site_elements/genericJS_toolbarAlignment.tpl' => 1,
  ),
),false)) {
function content_60837bad492e69_67985461 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="toolbar" class="toolbar_right toolbar noprint">
    <div id="tools"><h1>Tools</h1>
        <button class="tools" onclick="newGroup()"><img src="../libs/dynicons/?img=folder-new.svg&amp;w=32" style="vertical-align: middle" alt="New Group" title="New Group" /> Create New Group</button>
    </div>
</div>

<div id="maincontent">
    <div id="group">
        <div id="groupHeader">
            <span id="groupTitle">Group Search:</span>
        </div>
        <div id="groupBody" style="width: 99%">
                <div id="groupSelector"></div>
        </div>
    </div>
</div>

<div id="orgchartForm"></div>
<?php $_smarty_tpl->_subTemplateRender("file:site_elements/generic_xhrDialog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript">
/* <![CDATA[ */

function newGroup()
{
    dialog.setContent('Group Name: <input id="groupName" style="width: 300px" class="dialogInput"></input>');
    dialog.setTitle('Create New Group');
    dialog.show(); // need to show early because of ie6

    dialog.setSaveHandler(function() {
        dialog.indicateBusy();
        $.ajax({
        	type: 'POST',
            url: './api/?a=group',
            data: {title: $('#groupName').val(),
            	CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
            success: function(response) {
            	if(!$.isNumeric(response)) {
            		alert(response);
            	}
            	window.location.href = './?a=view_group&groupID=' + response;
                dialog.hide();
            },
            cache: false
        });
    });
}

<?php $_smarty_tpl->_subTemplateRender("file:site_elements/genericJS_toolbarAlignment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

var grpSel;
var intval;
var dialog;
$(function() {
	grpSel = new groupSelector('groupSelector');
	grpSel.initialize();
	grpSel.enableNoLimit();

	grpSel.setSelectHandler(function() {
    	window.location = '?a=view_group&groupID=' + grpSel.selection;
    });
	grpSel.setSelectLink('?a=view_group');

    dialog = new dialogController('xhrDialog', 'xhr', 'loadIndicator', 'button_save', 'button_cancelchange');

    orgchartForm = new orgchartForm('orgchartForm');
    orgchartForm.initialize();
});

/* ]]> */
<?php echo '</script'; ?>
>
<?php }
}
