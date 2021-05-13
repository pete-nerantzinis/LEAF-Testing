<?php
/* Smarty version 3.1.33, created on 2021-04-24 23:26:57
  from '/var/www/html/LEAF_Nexus/templates/editor.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6084a941b35108_38657478',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f197c8250056aca9b133de593454d2edac15320d' => 
    array (
      0 => '/var/www/html/LEAF_Nexus/templates/editor.tpl',
      1 => 1615409011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:site_elements/generic_xhrDialog.tpl' => 1,
    'file:site_elements/generic_confirm_xhrDialog.tpl' => 1,
  ),
),false)) {
function content_6084a941b35108_38657478 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- <div id="sidebar">
placeholder<br />
</div> -->

<span id="editor_toolbar" class="noprint">
    <span id="editor_tools">
        <!-- <div onclick="alert('placeholder')"><img src="../libs/dynicons/?img=preferences-system-windows.svg&amp;w=32" style="vertical-align: middle" alt="Add Sub-Group" title="Add Sub-Group" /> Add Sub-Group</div> -->
        <span onclick="zoomIn();"><img src="../libs/dynicons/?img=gnome-zoom-in.svg&amp;w=32" style="vertical-align: middle" alt="Zoom In" title="Zoom In" /> Zoom In</span>
        <span onclick="zoomOut();"><img src="../libs/dynicons/?img=gnome-zoom-out.svg&amp;w=32" style="vertical-align: middle" alt="Zoom Out" title="Zoom Out" /> Zoom Out</span>
        <?php if ($_smarty_tpl->tpl_vars['rootID']->value != $_smarty_tpl->tpl_vars['topPositionID']->value) {?>
        <span onclick="viewSupervisor();"><img src="../libs/dynicons/?img=go-up.svg&amp;w=32" style="vertical-align: middle" alt="Zoom Out" title="Zoom Out" /> Go Up One Level</span>
        <?php }?>
        <span onclick="window.location='mailto:?subject=FW:%20Org.%20Chart%20-%20&amp;body=Organizational%20Chart%20URL:%20<?php if ($_SERVER['HTTPS'] == 'on') {?>https<?php } else { ?>http<?php }?>://<?php echo $_SERVER['SERVER_NAME'];
echo rawurlencode($_SERVER['REQUEST_URI']);?>
%0A%0A'"><img src="../libs/dynicons/?img=mail-forward.svg&amp;w=32" style="vertical-align: middle" alt="Forward as Email" title="Forward as Email" /> Forward as Email</span>        
    </span>
</span>

<div id="pageloadIndicator" style="visibility: visible">
    <div style="opacity: 0.8; z-index: 1000; position: absolute; background: #f3f3f3; height: 97%; width: 97%"></div>
    <div style="z-index: 1001; position: absolute; padding: 16px; width: 97%; text-align: center; font-size: 24px; font-weight: bold; background-color: white">Loading... <img src="images/largespinner.gif" alt="loading..." /></div>
</div>

<div id="busyIndicator" style="visibility: hidden"><img src="images/indicator.gif" alt="Busy..." /></div>

<?php $_smarty_tpl->_subTemplateRender("file:site_elements/generic_xhrDialog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:site_elements/generic_confirm_xhrDialog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript">
/* <![CDATA[ */

var positions = new Object();

function setZoomSmallest() {
    $('.positionSmall').css('width', '125px');
    $('.positionSmall').css('font-size', '63%');
    $('.positionSmall>div>div>div>img').css('width', '16px');
}

function setZoomSmall() {
    $('.positionSmall').css('width', '150px');
    $('.positionSmall').css('font-size', '75%');
    $('.positionSmall>div>div>div>img').css('width', '16px');
}

function setZoomMedium() {
    $('.positionSmall').css('width', '175px');
    $('.positionSmall').css('font-size', '87%');
    $('.positionSmall>div>div>div>img').css('width', '16px');
}

function setZoomLargest() {
    $('.positionSmall').css('width', '200px');
    $('.positionSmall').css('font-size', '100%');
    $('.positionSmall>div>div>div>img').css('width', '32px');
}

function zoomIn() {
	switch($('.positionSmall').css('width')) {
    case '200px':
    	alert('Maximum zoom level reached');
        break;
    case '175px':
    	setZoomLargest();
        saveZoomLevel(4);
        break;
    case '150px':
    	setZoomMedium();
        saveZoomLevel(3);
        break;
    case '125px':
    	setZoomSmall();
        saveZoomLevel(2);
    	break;
	}
	jsPlumb.repaintEverything();
}

function zoomOut() {
    switch($('.positionSmall').css('width')) {
    case '200px':
    	setZoomMedium();
        saveZoomLevel(3);
        break;
    case '175px':
        setZoomSmall();
        saveZoomLevel(2);
        break;
    case '150px':
    	setZoomSmallest();
        saveZoomLevel(1);
        break;
    case '125px':
    	alert('Minimum zoom level reached');
    	break;
 }
 jsPlumb.repaintEverything();	
}

function applyZoomLevel() {
	switch(currentZoomLevel) {
        case 3:
            setZoomMedium();
            break;
        case 2:
            setZoomSmall();
            break;
        case 1:
            setZoomSmallest();
            break;
        default:
            setZoomLargest();
            break;
    }
}

function viewSupervisor() {
    $.ajax({
        url: './api/?a=position/<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
/supervisor',
        dataType: 'json',
        success: function(response) {
            window.location = '?a=editor&rootID=' + response[0].positionID;
        },
        cache: false
    });
}

function saveLayout(positionID) {
	$('#busyIndicator').css('visibility', 'visible');
	var position = $('#' + positions[positionID].getDomID()).offset();
	var newPosition = new Object();
	newPosition.x = position.left;
	newPosition.y = position.top;
    $.ajax({
    	type: 'POST',
        url: './api/?a=position/' + positionID,
        data: {15: JSON.stringify({<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
: newPosition}),
        	CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
        success: function(res) {
            $('#busyIndicator').css('visibility', 'hidden');
        },
        cache: false
    });
}

function changeSupervisor(currPositionID) {
    dialog.setContent('Supervisor\'s Name or Title: <div id="positionSelector"></div>');
    dialog.show(); // need to show early because of ie6

    posSel = new positionSelector('positionSelector');
    posSel.initialize();
    posSel.enableEmployeeSearch();
    
    dialog.setSaveHandler(function() {
        dialog.indicateBusy();
        $.ajax({
        	type: 'POST',
            url: './api/?a=position/' + currPositionID + '/supervisor',
            data: {positionID: posSel.selection,
                      CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
            success: function(response) {
                window.location.reload();
            },
            cache: false
        });
    });
}

function addSupervisor(positionID) {
    positions[positionID].unsetFocus();
    dialog.setContent('Full Position Title: <input id="inputtitle" style="width: 300px" class="dialogInput"></input>');
    dialog.setTitle('Add Supervisor');
    dialog.show(); // need to show early because of ie6
    $('#inputtitle').focus();

    dialog.setSaveHandler(function() {
        dialog.indicateBusy();
        $.ajax({
            type: 'POST',
            url: './api/?a=position',
            dataType: 'json',
            data: {title: $('#inputtitle').val(),
                      parentID: 0,
                      groupID: '<?php echo $_smarty_tpl->tpl_vars['resolvedService']->value[0]['groupID'];?>
',
                      CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
            success: function(response) {
                if(isNaN(parseFloat(response))) {
                    alert('Error: Please check position title. ' + response);
                    dialog.indicateIdle();
                    return 0;
                }
                $.ajax({
                    type: 'POST',
                    url: './api/?a=position/' + positionID + '/supervisor',
                    data: {positionID: response,
                              CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
                    success: function(response) {

                    },
                    cache: false
                });
                loadTimer = 0;
                // create position box
                positions[response] = new position(response);
                positions[response].initialize('bodyarea');
                positions[response].setRootID(0);
                positions[response].setTitle($('#inputtitle').val());
                positions[response].setContent('-');
                parentDomPosition = $('#' + positions[positionID].getDomID()).offset();
                parentDomPosition.left += 0;
                parentDomPosition.top -= 60;
                positions[response].setDomPosition(parentDomPosition.left, parentDomPosition.top);
                // make position box draggable
                draggableOptions.stop = function() {
                    saveLayout(response);
                };
                jsPlumb.draggable(positions[response].getDomID(), draggableOptions);

                // create and connect endpoints
                endPoints[response] = jsPlumb.addEndpoint(positions[response].getDomID(), {anchor: 'Center'}, endpointOptions);
                jsPlumb.connect({ source: endPoints[positionID],
                    target: endPoints[response],
                    connector: connectorOptions,
                    paintStyle: {stroke: "black", lineWidth: 2}
                });
                dialog.hide();
                applyZoomLevel();
            },
            cache: false
        });
    });
}


function addSubordinate(parentID) {
	positions[parentID].unsetFocus();
    dialog.setContent('Full Position Title: <input id="inputtitle" style="width: 300px" class="dialogInput"></input>');
    dialog.setTitle('Add Subordinate');
    dialog.show(); // need to show early because of ie6
    $('#inputtitle').focus();
    
    dialog.setSaveHandler(function() {
        dialog.indicateBusy();
        $.ajax({
        	type: 'POST',
            url: './api/?a=position',
            dataType: 'json',
            data: {title: $('#inputtitle').val(),
                      parentID: parentID,
                      groupID: '<?php echo $_smarty_tpl->tpl_vars['resolvedService']->value[0]['groupID'];?>
',
                      CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
            success: function(response) {
            	if(isNaN(parseFloat(response))) {
            		alert('Error: ' + response);
            		dialog.indicateIdle();
            		return 0;
            	}
            	loadTimer = 0;
            	// create position box
                positions[response] = new position(response);
                positions[response].initialize('bodyarea');
                positions[response].setRootID(parentID);
                positions[response].setTitle($('#inputtitle').val());
                positions[response].setContent('-');
                parentDomPosition = $('#' + positions[parentID].getDomID()).offset();
                parentDomPosition.left += 0;
                parentDomPosition.top += 80;
                positions[response].setDomPosition(parentDomPosition.left, parentDomPosition.top);
                positions[response].addControl('<div class="button" onclick="removePosition('+response+');"><img src="../libs/dynicons/?img=process-stop.svg&amp;w=32" alt="Remove Position" title="Remove Position" /> Remove Position</div>');
                positions[response].addControl('<div class="button" onclick="changeSupervisor('+response+');"><img src="../libs/dynicons/?img=system-users.svg&amp;w=32" alt="Change Supervisor" title="Change Supervisor" /> Change Supervisor</div>');
                // make position box draggable
                draggableOptions.stop = function() {
                	saveLayout(response);
                };
                jsPlumb.draggable(positions[response].getDomID(), draggableOptions);

                // create and connect endpoints
                endPoints[response] = jsPlumb.addEndpoint(positions[response].getDomID(), {anchor: 'Center'}, endpointOptions);
                jsPlumb.connect({ source: endPoints[parentID],
                    target: endPoints[response],
                    connector: connectorOptions,
                    paintStyle: {stroke: "black", lineWidth: 2}
                });
                dialog.hide();
                applyZoomLevel();
            },
            cache: false
        });
    });
}

function addSubgroup() {
	
}

var levelLimit = 5;
var undefinedPositionOffset = 80;
function getSubordinates(positionID, level) {
	loadTimer = 0;
    if(level >= levelLimit) {
        return false;
    }
    level++;
    for(var key in positions[positionID].data.subordinates) {
    	var subordinate = positions[positionID].data.subordinates;

        positions[subordinate[key].positionID] = new position(subordinate[key].positionID);
        positions[subordinate[key].positionID].initialize('bodyarea');
        positions[subordinate[key].positionID].setRootID(<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
);
        positions[subordinate[key].positionID].setParentID(positionID);

        positions[subordinate[key].positionID].onLoad = function() {
        	var loadSubordinates = 1;
        	var positionControls = '<div class="button" onclick="hideSubordinates('+subordinate[key].positionID+');"><img src="../libs/dynicons/?img=gnome-system-users.svg&amp;w=32" alt="Hide" title="Hide" /> Hide Subordinates</div>';
        	if(subordinate[key][15].data != '') {
                var subData = $.parseJSON(subordinate[key][15].data);
                if(subData[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
] != undefined
                	&& subData[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].hideSubordinates != undefined
               		&& subData[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].hideSubordinates == 1) {

                	positionControls = '<div class="button" onclick="showSubordinates('+subordinate[key].positionID+');"><img src="../libs/dynicons/?img=system-users.svg&amp;w=32" alt="Show" title="Show" /> Show Subordinates</div>';
                	loadSubordinates = 0;
                }
        	}
        	else {
        		$('#' + positions[subordinate[key].positionID].getDomID()).css('box-shadow', ' 0 0 6px yellow');
        		positions[subordinate[key].positionID].setDomPosition(20, undefinedPositionOffset);
        		undefinedPositionOffset += 80;
        	}

        	if(subordinate[key].hasSubordinates == 1
       			&& loadSubordinates == 1) {
                $.ajax({
                    url: './api/?a=position/' + subordinate[key].positionID,
                    dataType: 'json',
                    data: {q: this.q},
                    success: function(response) {
                    	positions[subordinate[key].positionID].data = response;
                    	getSubordinates(subordinate[key].positionID, level);
                    },
                    cache: false
                });
        	}

        	if(subordinate[key].hasSubordinates == 1) {
        		   positions[subordinate[key].positionID].addControl(positionControls);
        	}
        	else {
        		positions[subordinate[key].positionID].addControl('<div class="button" onclick="removePosition('+subordinate[key].positionID+');"><img src="../libs/dynicons/?img=process-stop.svg&amp;w=32" alt="Remove Position" title="Remove Position" /> Remove Position</div>');
        	}

        	var tPID = subordinate[key].positionID;
            draggableOptions.stop = function(params) {
                saveLayout(tPID);
            };
            jsPlumb.draggable(positions[subordinate[key].positionID].getDomID(), draggableOptions);

            endPoints[subordinate[key].positionID] = jsPlumb.addEndpoint(positions[subordinate[key].positionID].getDomID(), {anchor: 'Center'}, endpointOptions);

            jsPlumb.connect({ source: endPoints[subordinate[key].parentID],
                target: endPoints[subordinate[key].positionID],
                connector: connectorOptions,
                paintStyle: {stroke: "black", lineWidth: 2},
                cssClass: "editMode"
            });
            // dim other connectors while current selection is being modified
            $('#' + positions[subordinate[key].positionID].containerHeader).on('mousedown', function() {
            	$('svg.editMode path').css({'stroke': '#d0d0d0'});
            });

        	positions[subordinate[key].positionID].addControl('<div class="button" onclick="changeSupervisor('+subordinate[key].positionID+');"><img src="../libs/dynicons/?img=system-users.svg&amp;w=32" alt="Change Supervisor" title="Change Supervisor" /> Change Supervisor</div>');
        	positions[subordinate[key].positionID].addControl('<div class="button" onclick="window.location=\'?a=editor&amp;rootID='+subordinate[key].positionID+'\'"><img src="../libs/dynicons/?img=system-search.svg&amp;w=32" alt="Focus" title="Focus" /> Focus on This</div>');

            applyZoomLevel();
        };
        
        positions[subordinate[key].positionID].draw(subordinate[key]);
    }
}

function showSubordinates(positionID) {
    var data = new Object();
    data.hideSubordinates = 0;
    $.ajax({
    	type: 'POST',
        url: './api/?a=position/' + positionID,
        data: {15: JSON.stringify({<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
: data}),
        	CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
        success: function(res, args) {
        	window.location.reload();
        },
        cache: false
    });
}

function hideSubordinates(positionID) {
    var data = new Object();
    data.hideSubordinates = 1;
    $.ajax({
    	type: 'POST',
        url: './api/?a=position/' + positionID,
        data: {15: JSON.stringify({<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
: data}),
        	CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
        success: function(res, args) {
            window.location.reload();
        },
        cache: false
    });
}

function removePosition(positionID) {
    confirm_dialog.setContent('<img src="../libs/dynicons/?img=help-browser.svg&amp;w=48" alt="question icon" style="float: left; padding-right: 16px" /> <span style="font-size: 150%">Are you sure you want to delete this position?</span>');
    confirm_dialog.setTitle('Confirmation');
    confirm_dialog.setSaveHandler(function() {
        $.ajax({
        	type: 'DELETE',
            url: './api/?a=position/' + positionID + '&' + $.param({CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'}),
            success: function(response) {
                if(response == 1) {
                    alert('Position has been deleted.');
                    window.location.reload();
                }
                else {
                    alert('Error: ' + response);
                }
            },
            cache: false
        });
    });
    confirm_dialog.show();
}

function saveZoomLevel(zoomLevel) {
    var data = new Object();
    data.zoom = zoomLevel;
    $.ajax({
    	type: 'POST',
        url: './api/?a=position/' + <?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
,
        data: {15: JSON.stringify({<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
: data}),
        	CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
        success: function(res, args) {
            //window.location.reload();
        },
        cache: false
    });
}

var loadTimer = 0;
var loadInterval;
function loader() {
	if(loadTimer > 299) {
		$('#pageloadIndicator').css('visibility', 'hidden');
		$('#pageloadIndicator').css('display', 'none');
		clearInterval(loadInterval);
	    $('#footer').css('position', 'absolute');
	    $('#footer').css('top', document.documentElement.scrollHeight + 'px');
	    $('#footer').css('right', '4px');
	    jsPlumb.setSuspendDrawing(false, true);
	}
	loadTimer += 100;
}

//jsPlumb
var connectorOptions = ["Flowchart", {stub: 2, cornerRadius: 10, midpoint: 0.7}];
var endPoints = new Object();
var endpointOptions = {
    isSource: true,
    isTarget: true,
    endpoint: ["Rectangle", {width: 2, height: 2, stub: 50}],
    maxConnections: -1
};

var draggableOptions = {
    handle: '.positionSmall_title',
    snap: true,
    snapMode: 'outer',
    snapTolerance: 10,
    zIndex: 3000,
    start: function() {

    },
    drag: function() {

    },
    stop: function(params) {
//        jsPlumb.repaintEverything();
    }
};

var dialog;
var currentZoomLevel = 0;
$(function() {
    jsPlumb.Defaults.Container = "bodyarea";
    jsPlumb.DefaultDragOptions = { cursor: "pointer", zIndex:2000 };

    loadInterval = setInterval('loader()', 100);

    dialog = new dialogController('xhrDialog', 'xhr', 'loadIndicator', 'button_save', 'button_cancelchange');
    confirm_dialog = new dialogController('confirm_xhrDialog', 'confirm_xhr', 'confirm_loadIndicator', 'confirm_button_save', 'confirm_button_cancelchange');

    jsPlumb.setSuspendDrawing(true);
    positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
] = new position(<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
);
    positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].initialize('bodyarea');
    positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].setRootID(<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
);
    positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].addControl('<div class="button" onclick="addSupervisor(\'<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
\');"><img src="../libs/dynicons/?img=system-users.svg&amp;w=32" alt="Change Supervisor" title="Change Supervisor" /> Add Supervisor</div>');

    draggableOptions.stop = function() {
        saveLayout(<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
);
    };
    jsPlumb.draggable(positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].getDomID(), draggableOptions);

    positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].onLoad = function() {
    	endPoints[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
] = jsPlumb.addEndpoint(positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].getDomID(), {anchor: 'Center'}, endpointOptions);
    	if(positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].data[15].data != '') {
            var positionData = $.parseJSON(positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].data[15].data);
            if(positionData[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
] != undefined
                && positionData[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].zoom != undefined) {
                currentZoomLevel = positionData[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].zoom; 
            }
        }

    	getSubordinates(<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
, 0);
    }

    positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].draw();

    $('#header').css('background-image', "url('images/gradient_admin.png')");
    $('#editor_toolbar').appendTo('#headerTab');
    $('#xhrDialog').on('keydown', function(e) {
        if(e.keyCode == 13) { // enter key
            e.preventDefault();
            $('#xhrDialog button#button_save').click();
        }
    });
});

/* ]]> */
<?php echo '</script'; ?>
><?php }
}
