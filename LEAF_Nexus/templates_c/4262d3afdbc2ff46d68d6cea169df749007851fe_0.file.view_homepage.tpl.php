<?php
/* Smarty version 3.1.33, created on 2021-04-24 01:41:37
  from '/var/www/html/LEAF_Nexus/templates/view_homepage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6083775132a631_17476787',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4262d3afdbc2ff46d68d6cea169df749007851fe' => 
    array (
      0 => '/var/www/html/LEAF_Nexus/templates/view_homepage.tpl',
      1 => 1615409011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:site_elements/generic_xhrDialog.tpl' => 1,
    'file:site_elements/orgchartForm_updateOutlook.js.tpl' => 1,
  ),
),false)) {
function content_6083775132a631_17476787 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/libs/smarty/plugins/modifier.sanitize.php','function'=>'smarty_modifier_sanitize',),));
?>
<div class="menu2" style="width: 315px; float: left">

<a href="?a=navigator" tabindex="-1">
    <span class="menuButtonSmall" style="background-color: #ffefa5" tabindex="0">
        <img class="menuIconSmall" src="../libs/dynicons/?img=applications-internet.svg&amp;w=76" style="position: relative" alt="Navigator" title="Navigator" />
        <span class="menuTextSmall">Browser</span><br />
        <span class="menuDescSmall">View Organizational Charts</span>
    </span>
</a>

<?php if ($_smarty_tpl->tpl_vars['groupLeader']->value != '') {?>
<a href="?a=navigator&amp;rootID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['groupLeader']->value);?>
" tabindex="-1">
    <span class="menuButtonSmall" style="background-color: #b3ceff" tabindex="0">
        <img class="menuIconSmall" src="../libs/dynicons/?img=preferences-system-windows.svg&amp;w=76" style="position: relative" alt="Search" title="Search" />
        <span class="menuTextSmall">Service Org. Chart</span><br />
        <span class="menuDescSmall">View your service's Org. Chart</span>
    </span>
</a>
<?php }?>

<a href="./utils/exportPDL.php" tabindex="-1">
    <span class="menuButtonSmall" style="background-color: black" tabindex="0">
        <img class="menuIconSmall" src="../libs/dynicons/?img=x-office-spreadsheet.svg&amp;w=76" style="position: relative" alt="Bookmarks" title="Bookmarks" />
        <span class="menuTextSmall" style="color: white">Export PDL</span><br />
        <span class="menuDescSmall" style="color: white">Download the Position Description List</span>
    </span>
</a>

<a href="?a=summary" tabindex="-1">
    <span class="menuButtonSmall" style="background-color: black" tabindex="0">
        <img class="menuIconSmall" src="../libs/dynicons/?img=x-office-presentation.svg&amp;w=76" style="position: relative" alt="Bookmarks" title="Bookmarks" />
        <span class="menuTextSmall" style="color: white">Vacancy Summary</span><br />
        <span class="menuDescSmall" style="color: white">View vacancies by Service</span>
    </span>
</a>

</div>

<div id="main">
    <div id="searchContainer" style="float: left; border: 1px solid #e0e0e0; padding: 4px; background-color: white">
        <div style="padding: 8px; color: white; font-weight: bold; font-size: 140%; background-color: #5A79A5">
            <div id="searchBorder" style="white-space: nowrap; background-color: #5a79a5;">
                <img id="searchIcon" src="../libs/dynicons/?img=search.svg&w=16" style="position: absolute; margin-left: 66px; padding: 10px" alt="search" />
                <img id="searchIconBusy" src="images/indicator.gif" style="display: none; position: absolute; margin-left: 66px; padding: 10px" alt="search" />
                Search <input id="search" name="search" aria-label="Search" style="font-size: 140%; width: 75%; padding: 2px 2px 2px 26px; border: 1px solid black; background-repeat: no-repeat; background-position: right center" type="text" />
            </div>
        </div>
        <br />
        <div id="searchTips" style="max-width: 300px">
            <fieldset><legend style="font-size: 11px; color: #767676">Available Search Options</legend>
               <div>
                   <img title="Employees" alt="Employees" style="float: left; padding: 8px" src="../libs/dynicons/?img=contact-new.svg&amp;w=32" />
                   <div><h3>Employees</h3>
                   Names</div>
               </div>
               <br />
               <div>
                   <img title="Positions" alt="Positions" style="float: left; padding: 8px" src="../libs/dynicons/?img=system-users.svg&amp;w=32" />
                   <div><h3>Positions</h3>
                   Titles, PD Number</div>
               </div>
               <br />
               <div>
                   <img title="Groups" alt="Groups" style="float: left; padding: 8px" src="../libs/dynicons/?img=preferences-desktop-theme.svg&amp;w=32" />
                   <div><h3>Groups</h3>
                   Services, Organizational</div>
               </div>
            </fieldset>
        </div>
        <div style="margin-bottom: 12px" id="employee">
            <div id="employeeHeader">
                <span id="employeeName">Employees</span>
            </div>
            <div id="employeeBody">
                    <div id="employeeSelector"></div>
                    <div id="employeeAllResults" style="padding: 4px; margin: 8px; display: none; text-align: center"><a href="?a=browse_employee">Show More Results</a></div>
            </div>
        </div>
        <div style="margin-bottom: 12px" id="position">
            <div id="positionHeader">
                <span id="positionTitle">Positions</span>
            </div>
            <div id="positionBody" style="width: 99%">
                    <div id="positionSelector"></div>
                    <div id="positionAllResults" style="padding: 4px; margin: 8px; display: none; text-align: center"><a href="?a=browse_position">Show More Results</a></div>
            </div>
        </div>
        <div style="margin-bottom: 12px" id="group">
            <div id="groupHeader">
                <span id="groupTitle">Services</span>
            </div>
            <div id="groupBody" style="width: 99%">
                    <div id="groupSelector"></div>
            </div>
        </div>
        <div id="group2" style="float: left; width: 99%; border: 1px solid black; background-color: #d0d0d0">
            <div id="group2Header" style="background-color: #353535; padding: 4px">
                <span id="group2Title" style="font-size: 140%; font-weight: bold; color: white">Distribution Groups</span>
            </div>
            <div id="group2Body" style="width: 99%; padding: 4px">
                    <div id="group2Selector"></div>
                    <div id="groupAllResults" style="padding: 4px; margin: 8px; display: none; text-align: center"><a href="?a=browse_group">Show More Results</a></div>
            </div>
        </div>
    </div>

    <div id="currentEmployee" style="float: right; width: 220px; background-color: #ffe3e3; border: 1px solid black;">
    <?php if ($_smarty_tpl->tpl_vars['employee']->value[0]['empUID'] > 0) {?>
        <div id="currentEmployeeHeader" style="background-color: #f4bcbc; font-size: 110%; font-weight: bold; padding: 4px"><a href="?a=view_employee&empUID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['employee']->value[0]['empUID']);?>
"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['employee']->value[0]['firstName']);?>
 <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['employee']->value[0]['lastName']);?>
</a></div>
        <div id="currentEmployeeBody" style="padding: 4px">Loading...</div>
    <?php } else { ?>
        <div style="padding: 8px">Your account is not present in the Org. Chart database.</div>
    <?php }?>
    </div>
</div>

<div id="orgchartForm"></div>
<?php $_smarty_tpl->_subTemplateRender("file:site_elements/generic_xhrDialog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript">
/* <![CDATA[ */

function postProcess()
{
    if(empSel.numResults == 0) {
        $('#employee').css('display', 'none');
    }
    else {
        $('#employee').css('display', 'inline');
    }
    if(empSel.numResults >= 4) {
        $('#employeeAllResults').css('display', 'block');
    }
    else {
        $('#employeeAllResults').css('display', 'none');
    }

    if(posSel.numResults == 0) {
        $('#position').css('display', 'none');
    }
    else {
        $('#position').css('display', 'inline');
    }
    if(posSel.numResults >= 5) {
        $('#positionAllResults').css('display', 'block');
    }
    else {
        $('#positionAllResults').css('display', 'none');
    }

    if(grpSel.numResults == 0) {
        $('#group').css('display', 'none');
    }
    else {
        $('#group').css('display', 'inline');
    }
    if(grp2Sel.numResults == 0) {
        $('#group2').css('display', 'none');
    }
    else {
        $('#group2').css('display', 'inline');
    }
    if(grp2Sel.numResults >= 5) {
        $('#groupAllResults').css('display', 'block');
    }
    else {
        $('#groupAllResults').css('display', 'none');
    }

    if(timer > 400) {
    	$('#searchIcon').css('display', "inline");
        $('#searchIconBusy').css('display', "none");
    }
    timer += (this.timer > 5000) ? 0 : 300;
}

function setSearchWidth() {
	$('#searchContainer').css('width', $(window).width() - sideOffset + 'px');
}

var empSel, posSel, grpSel, grp2Sel;
var ppInterval;
var sideOffset = 580;
var timer = 0;
$(function() {
    empSel = new employeeSelector('employeeSelector');
    empSel.initialize();
    empSel.hideInput();
    empSel.setSelectHandler(function() {
        window.location = '?a=view_employee&empUID=' + empSel.selection;
    });
    empSel.setSelectLink('?a=view_employee');
    empSel.emailHref = true;

    posSel = new positionSelector('positionSelector');
    posSel.initialize();
    posSel.hideInput();
    posSel.setSelectHandler(function() {
         window.location = '?a=view_position&positionID=' + posSel.selection;
    });
    posSel.setSelectLink('?a=view_position');

    grpSel = new groupSelector('groupSelector');
    grpSel.configInputID('#search');
    grpSel.initialize();
    grpSel.searchTag('service');
    grpSel.hideInput();
    grpSel.setSelectHandler(function() {
        window.location = '?a=navigator_service&groupID=' + grpSel.selection;
    });
    grpSel.setSelectLink('?a=navigator_service');

    grp2Sel = new groupSelector('group2Selector');
    grp2Sel.configInputID('#search');
    grp2Sel.initialize();
    grp2Sel.hideInput();
    grp2Sel.setSelectHandler(function() {
        window.location = '?a=view_group&groupID=' + grp2Sel.selection;
    });
    grp2Sel.setSelectLink('?a=view_group');

    $('#search').focus();
    $('#search').on('keyup', function() {
    	$('#searchIcon').css('display', "none");
    	$('#searchIconBusy').css('display', "inline");
        timer = 0;
    	empSel.timer = 0;
        posSel.timer = 0;
        grpSel.timer = 0;
        grp2Sel.timer = 0;
        empSel.forceSearch($('#search').val());
        posSel.forceSearch($('#search').val());
        grpSel.forceSearch($('#search').val());
        grp2Sel.forceSearch($('#search').val());
        sideOffset = 350;
        setSearchWidth();
        if($('#search').val() != '') {
        	$('#searchTips').css('display', 'none');
        }
        else {
        	$('#searchTips').css('display', 'inline');
        }
        $('#currentEmployee').css('display', 'none');
    });

    setSearchWidth();
    window.onresize = function() {
    	setSearchWidth();
    };
    ppInterval = setInterval(function(){postProcess();}, 100);

    <?php if ($_smarty_tpl->tpl_vars['employee']->value[0]['empUID'] > 0 && is_numeric($_smarty_tpl->tpl_vars['employee']->value[0]['empUID'])) {?>
    $.ajax({
        url: "ajaxEmployee.php?a=getForm&empUID=<?php echo $_smarty_tpl->tpl_vars['employee']->value[0]['empUID'];?>
",
        success: function(response) {
            if(response != '') {
                $('#currentEmployeeBody').html(response);
                $('#currentEmployeeBody img').css('max-width', '64px');
                <?php if ($_smarty_tpl->tpl_vars['employeePositions']->value[0]['positionID'] > 0) {?>
                $.ajax({
                    url: './api/position/<?php echo $_smarty_tpl->tpl_vars['employeePositions']->value[0]['positionID'];?>
',
                    dataType: 'json',
                    success: function(positionData) {
                        title = '';
                        if(positionData.title != '') {
                            title = '<br /><span>' + positionData.title + '</span>';
                        }
                        $('#currentEmployeeHeader').append(title);
                    }
                });
                <?php }?>
            }
            else {
                $('#currentEmployeeBody').html('');
            }
        },
        cache: false
    });
    orgchartForm = new orgchartForm('orgchartForm');
    orgchartForm.initialize();
    <?php $_smarty_tpl->_subTemplateRender("file:site_elements/orgchartForm_updateOutlook.js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php }?>
});

/* ]]> */
<?php echo '</script'; ?>
>
<?php }
}
