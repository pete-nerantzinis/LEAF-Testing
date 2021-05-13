<?php
/* Smarty version 3.1.33, created on 2021-04-24 23:26:41
  from '/var/www/html/LEAF_Nexus/templates/navigator.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6084a931cc5218_95241441',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6739768de80f9844bb015bedc22a693d460df901' => 
    array (
      0 => '/var/www/html/LEAF_Nexus/templates/navigator.tpl',
      1 => 1615409011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6084a931cc5218_95241441 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- <div id="sidebar">
placeholder<br />
</div> -->

<span id="editor_toolbar" class="noprint">
    <span id="editor_tools">
        <span onclick="window.location='?a=editor&amp;rootID=<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
';"><img src="../libs/dynicons/?img=accessories-text-editor.svg&amp;w=32" style="vertical-align: middle" alt="Edit" title="Edit" /> Edit Orgchart</span>
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
    }
}

function viewSupervisor() {
    $.ajax({
        url: './api/?a=position/<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
/supervisor',
        dataType: 'json',
        success: function(response) {
            window.location = '?a=navigator&rootID=' + response[0].positionID;
        }
    });
}

function addSubgroup() {
    
}

function setPositionStyle(containerID, positionID) {
	//dojo.style(containerID + '_title', 'cursor', 'pointer');
	$('#' + containerID + '_title').css('cursor', 'pointer');
    $('#' + containerID + '_title').click(function() {
    	window.location = '?a=navigator&rootID=' + positionID;
    });
}

var levelLimit = 5;
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

            if(subordinate[key][15].data != '') {
                var subData = $.parseJSON(subordinate[key][15].data);
                if(subData[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
] != undefined
                    && subData[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].hideSubordinates != undefined
                    && subData[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].hideSubordinates == 1) {

                    //positionControls = '<div class="button" onclick="showSubordinates('+subordinate[key].positionID+');"><img src="../libs/dynicons/?img=system-users.svg&amp;w=32" alt="Show" title="Show" /> Show Subordinates</div>';
                    loadSubordinates = 0;
                }
            }

            if(subordinate[key].hasSubordinates == 1
                && loadSubordinates == 1) {

                $.ajax({
                    url: './api/?a=position/' + subordinate[key].positionID,
                    data: {q: this.q},
                    dataType: 'json',
                    success: function(data) {
                    	positions[subordinate[key].positionID].data = data;
                        getSubordinates(subordinate[key].positionID, level);
                    },
                    cache: false
                });
            }

            //jsPlumb.draggable(positions[subordinate[key].positionID].getDomID(), draggableOptions);
            $('#' + positions[subordinate[key].positionID].getDomID()).on('dragstop', null, subordinate[key].positionID, function(event) {
                saveLayout(event.data);
            });

            endPoints[subordinate[key].positionID] = jsPlumb.addEndpoint(positions[subordinate[key].positionID].getDomID(), {anchor: 'Center'}, endpointOptions);

            jsPlumb.connect({ source: endPoints[subordinate[key].parentID],
                target: endPoints[subordinate[key].positionID],
                connector: connectorOptions,
                paintStyle: {stroke: "black", lineWidth: 2}
            });

            positions[subordinate[key].positionID].emptyControls();

            positions[subordinate[key].positionID].addControl('<div class="button" onclick="window.location=\'?a=view_position&amp;positionID='+this.positionID+'\';"><img src="../libs/dynicons/?img=accessories-text-editor.svg&amp;w=32" alt="Edit" title="Edit" /> View Details</div>');
            positions[subordinate[key].positionID].addControl('<div class="button" onclick="window.location=\'?a=navigator&amp;rootID='+this.positionID+'\'"><img src="../libs/dynicons/?img=system-search.svg&amp;w=32" alt="Focus" title="Focus" /> Focus on This</div>');

            setPositionStyle(positions[subordinate[key].positionID].prefixID + positions[subordinate[key].positionID].positionID, positions[subordinate[key].positionID].positionID);

            applyZoomLevel();
        };
        
        positions[subordinate[key].positionID].draw(subordinate[key]);
    }
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
    endpoint: ["Rectangle", {width: 2, height: 2, stub: 0}],
    maxConnections: -1
};
var draggableOptions = {
    handle: '.positionSmall_title',
    snap: true,
    snapMode: 'outer',
    snapTolerance: 10,
    zIndex: 3000
};

var currentZoomLevel = 0;
$(function() {
    jsPlumb.Defaults.Container = "bodyarea";
    jsPlumb.DragOptions = { cursor: "pointer", zIndex:2000 };

    loadInterval = setInterval('loader()', 100);

    jsPlumb.setSuspendDrawing(true);
    positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
] = new position(<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
);
    positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].initialize('bodyarea');
    positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].setRootID(<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
);
    //jsPlumb.draggable(positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].getDomID(), draggableOptions);
    $('#' + positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].getDomID()).on('dragstop', null, function() {
        saveLayout(<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
);
    });

    positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].onLoad = function() {
    	endPoints[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
] = jsPlumb.addEndpoint(positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].getDomID(), {anchor: 'Center'}, endpointOptions);
    	getSubordinates(<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
, 0);

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
                applyZoomLevel();
            }
        }
    }

    positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].onDrawComplete = function() {
        <?php if ($_smarty_tpl->tpl_vars['header']->value == 'false') {?>
        $('#header').css('display', 'none');
        $('html').animate({scrollTop: 80}, 1000);
        <?php }?>
    };
    
    positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].emptyControls();
    positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].addControl('<div class="button" onclick="window.location=\'?a=view_position&amp;positionID=<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
\';"><img src="../libs/dynicons/?img=accessories-text-editor.svg&amp;w=32" alt="Edit" title="Edit" /> View Details</div>');
    positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].draw();
    setPositionStyle(positions[<?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
].prefixID + <?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['rootID']->value;?>
);
    
    $('#editor_toolbar').appendTo('#headerTab');
});

/* ]]> */
<?php echo '</script'; ?>
><?php }
}
