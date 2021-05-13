<?php
/* Smarty version 3.1.33, created on 2021-04-23 22:00:28
  from '/var/www/html/LEAF_Request_Portal/templates/view_inbox.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60837bbc26a479_77329824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2cbb7ed02b35bb74e2462e8fba76ce53461f3b3d' => 
    array (
      0 => '/var/www/html/LEAF_Request_Portal/templates/view_inbox.tpl',
      1 => 1615409011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:site_elements/generic_dialog.tpl' => 1,
  ),
),false)) {
function content_60837bbc26a479_77329824 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/libs/smarty/plugins/modifier.sanitize.php','function'=>'smarty_modifier_sanitize',),));
?>
The following is a list of requests that are pending your action:
<?php if (count($_smarty_tpl->tpl_vars['inbox']->value) == 0) {?>
<br /><br />
<div style="width: 50%; margin: 0px auto; border: 1px solid black; padding: 16px; background-color: white">
<img src="../libs/dynicons/?img=folder-open.svg&amp;w=96" alt="empty" style="float: left; padding-right: 16px"/><div style="font-size: 200%"> Your inbox is empty.<br /><br />Have a good day!</div>
</div>
<?php }?>

<?php if (count($_smarty_tpl->tpl_vars['errors']->value) > 0 && $_smarty_tpl->tpl_vars['errors']->value[0]['code'] == 1) {?>
<br /><br />
<div style="width: 50%; margin: 0px auto; border: 1px solid black; padding: 16px; background-color: white">
<img src="../libs/dynicons/?img=folder-open.svg&amp;w=96" alt="empty" style="float: left; padding-right: 16px"/><div style="font-size: 200%">Warning: Inbox limit is in place to ensure consistent performance</div>
</div>
<?php }?>

<div id="inbox">
<?php if (count($_smarty_tpl->tpl_vars['errors']->value) == 0) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['inbox']->value, 'dep');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dep']->value) {
?>
<br /><br />
<table onKeypress="toggleDepVisibilityKeypress(event, '<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['dep']->value['dependencyID']);?>
')" tabindex="0" id="depTitle_<?php echo $_smarty_tpl->tpl_vars['dep']->value['dependencyID'];?>
" class="agenda" style="width: 100%; margin: 0px auto">
    <div aria-live="assertive" id="depTitle_<?php echo $_smarty_tpl->tpl_vars['dep']->value['dependencyID'];?>
_announce"></div>
    <tr style="background-color: <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['dep']->value['dependencyBgColor']);?>
; cursor: pointer"  onclick="toggleDepVisibility('<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['dep']->value['dependencyID']);?>
')">
      <th colspan="3">
      <span style="float: left; font-size: 120%; font-weight: bold">
          <?php if ($_smarty_tpl->tpl_vars['dep']->value['dependencyID'] > 0) {?>
              <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['dep']->value['dependencyDesc']);?>

          <?php } else { ?>
              <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['dep']->value['approverName']);?>

          <?php }?>
      </span>
      <span style="float: right; text-decoration: underline; font-weight: bold"><span aria-label="Collapsed menu" id="depTitleAction_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['dep']->value['dependencyID']);?>
">View</span> <?php echo $_smarty_tpl->tpl_vars['dep']->value['count'];?>
 requests</span>
    </th>
    </tr>
</table>
<div style="background-color: <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['dep']->value['dependencyBgColor']);?>
">
        <div id="depContainerIndicator_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['dep']->value['dependencyID']);?>
" style="display: none; border: 1px solid black; text-align: center; font-size: 24px; font-weight: bold; background: white; padding: 16px">Loading...</div>
        <div id="depContainer_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['dep']->value['dependencyID']);?>
">
    </div>
</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>
</div>

<!-- DIALOG BOXES -->
<?php $_smarty_tpl->_subTemplateRender("file:site_elements/generic_dialog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript" src="js/functions/toggleZoom.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../libs/js/LEAF/sensitiveIndicator.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
/* <![CDATA[ */
function toggleDepVisibilityKeypress(evt, depID) {
    if(evt.keyCode === 13) {
        toggleDepVisibility(depID);
    }
}
var depVisibility = [];
function toggleDepVisibility(depID, isDefault) {
    if(depVisibility[depID] == undefined
    	|| depVisibility[depID] == 1) {
    	depVisibility[depID] = 0;
    	$('#depTitleAction_' + depID).attr('aria-label', 'Collapsed menu');
        $('#depTitle_' + depID + '_announce').attr('aria-label', 'Collapsed menu');
        $('#depTitle_' + depID + '_announce').html('<div aria-label="Collapsed menu" style="position: absolute"></div>');
        $('#depContainer_' + depID).css({
    		'visibility': 'hidden',
    		'display': 'none'
    	});
    	$('#depTitle_' + depID).css({
            'width': '50%'
        });
    }
    else {
    	depVisibility[depID] = 1;
        loadInboxData(depID);
        $('#depTitleAction_' + depID).attr('aria-label', 'Expanded menu');
        $('#depTitle_' + depID + '_announce').attr('aria-label', 'Expanded menu');
        $('#depTitle_' + depID + '_announce').html('<div aria-label="Expanded menu" style="position: absolute"></div>');
        $('#depTitle_' + depID).css({
            'width': '100%'
        });
        $('#depContainer_' + depID).css({
            'visibility': 'visible',
            'display': 'inline'
        });
    }
}

function stripHtml(input) {
    var temp = document.createElement('div');
    temp.innerHTML = input;
    return temp.innerText || temp.textContent;
}

var CSRFToken = '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
';
var inboxDataLoaded = new Object();
function loadInboxData(depID) {
	$('#depContainerIndicator_' + depID).css('display', 'block');
	var formGrid = new LeafFormGrid('depContainer_' + depID);

    $.ajax({
        type: 'GET',
        url: 'api/?a=inbox/dependency/_' + depID,
        success: function(res) {
            inboxDataLoaded[depID] = 1;

            var recordIDs = '';
            for (var i in res[depID]['records']) {
                recordIDs += res[depID]['records'][i].recordID + ',';
            }

            formGrid.setDataBlob(res);
            formGrid.setHeaders([
                 {name: 'Type', indicatorID: 'type', editable: false, callback: function(data, blob) {
                	 var categoryNames = '';
                	 if(blob[depID]['records'][data.recordID].categoryNames != undefined) {
                		 categoryNames = blob[depID]['records'][data.recordID].categoryNames.replace(' | ', ', ');
                	 }
                	 else {
                		 categoryNames = '<span style="color: red">Warning: This request is based on an old or deleted form.</span>';
                	 }
                	 $('#'+data.cellContainerID).html(categoryNames);
                     $('#'+data.cellContainerID).attr('tabindex', '0');
                 }},
                 {name: 'Service', indicatorID: 'service', editable: false, callback: function(data, blob) {
                	 $('#'+data.cellContainerID).html(blob[depID]['records'][data.recordID].service);
                     $('#'+data.cellContainerID).attr('tabindex', '0');
                 }},
                 {name: 'Title', indicatorID: 'title', editable: false, callback: function(data, blob) {
                     $('#'+data.cellContainerID).attr('tabindex', '0');
                     $('#'+data.cellContainerID).attr('aria-label', blob[depID]['records'][data.recordID].title);
                     $('#'+data.cellContainerID).html(blob[depID]['records'][data.recordID].title + ' <button id="'+ data.cellContainerID +'_preview" class="buttonNorm">View Request</button><div id="inboxForm_' + depID + '_' + data.recordID +'" style="background-color: white; display: none; height: 300px; overflow: scroll"></div>');
                     $('#'+data.cellContainerID + '_preview').on('click', function() {
                    	 $('#'+data.cellContainerID + '_preview').hide();
                    	 if($('#inboxForm_'+depID+'_'+data.recordID).html() == '') {
                    		 $('#inboxForm_'+depID+'_'+data.recordID).html('Loading...');
                    		 $('#inboxForm_'+depID+'_'+data.recordID).slideDown();
                             $.ajax({
                                 type: 'GET',
                                 url: 'ajaxIndex.php?a=printview&recordID=' + data.recordID,
                                 success: function(res) {
                                     $('#inboxForm_'+depID+'_'+data.recordID).html(res);
                                     $('#inboxForm_'+depID+'_'+data.recordID).slideDown();
                                     $('#requestTitle').attr('tabindex', '0');
                                     $('#requestInfo').attr('tabindex', '0');
                                    ariaSubIndicators(1);
                                 }
                             });
                    	 }
                     });
                 }},
                 {name: 'Action', indicatorID: 'action', editable: false, sortable: false, callback: function(data, blob) {
                	 var depDescription = 'Take Action';
                	 $('#'+data.cellContainerID).html('<button class="buttonNorm" style="text-align: center; font-weight: bold; white-space: normal" onclick="loadWorkflow('+ data.recordID +', \''+ depID +'\', \''+ formGrid.getPrefixID() +'\');">'+ depDescription +'</button>');
                 }}
             ]);
            formGrid.loadData(recordIDs);
            $('#' + formGrid.getPrefixID() + 'header_title').css('width', '60%');
            $('#depContainerIndicator_' + depID).css('display', 'none');
        },
        error: function(err) {
        	alert('Error: ' + err.statusText + ' in api/inbox/dependency/_' + depID);
        },
        cache: false,
        timeout: 5000
    });
}

function ariaSubIndicators(i) {
    if(document.getElementById('PHindicator_' + i + '_1') !== null) {
        $('#PHindicator_' + i + '_1').append('<div aria-label="' +i +'"></div>');
        $('#PHindicator_' + i + '_1').attr('tabindex', '0');
        $('#xhrIndicator_' + i + '_1').attr('tabindex', '0');
        ariaIndicatorSeries(i, 1);
        i = i + 1;
        ariaSubIndicators(i);
    }
}

function ariaIndicatorSeries(i, j) {
    if(document.getElementById('PHindicator_' + i + '_' + j) !== null) {
        $('#PHindicator_' + i + '_' + j).attr('tabindex', '0');
        $('#xhrIndicator_' + i + '_' + j).attr('tabindex', '0');
        j = j + 1;
        ariaIndicatorSeries(i, j);
    }
}

// empty handles
function getForm(indicatorID, series) {}

function loadWorkflow(recordID, dependencyID, prefixID) {
	dialog_message.setTitle('Apply Action to #' + recordID);

    currRecordID = recordID;
    dialog_message.setContent('<div id="workflowcontent"></div><div id="currItem"></div>');
    workflow = new LeafWorkflow('workflowcontent', '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
');
    workflow.setActionSuccessCallback(function() {
        dialog_message.hide();
    	$('#' + prefixID + 'tbody_tr' + recordID).fadeOut(1500);
    });
    workflow.getWorkflow(recordID);
    dialog_message.show();
}

var currRecordID = null;

var intvalStatus = null;
var lastActTime = null;

var dialog_message;
$(function() {
	dialog_message = new dialogController('genericDialog', 'genericDialogxhr', 'genericDialogloadIndicator', 'genericDialogbutton_save', 'genericDialogbutton_cancelchange');
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['inbox']->value, 'dep');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dep']->value) {
?>
    toggleDepVisibility('<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['dep']->value['dependencyID']);?>
', 1);
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

});


/* ]]> */
<?php echo '</script'; ?>
>
<?php }
}
