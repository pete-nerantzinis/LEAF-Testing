<div class="leaf-center-content">

    <aside class="sidenav-right"></aside>

    <aside class="sidenav"></aside>

    <main class="main-content">

        <h2>Site Settings</h2>
        
        <h2 id="progress" style="color: red;"></h2>

        <form class="usa-form">
        
            <label for="heading" class="usa-label">Title of LEAF site</label>
            <input id="heading" class="usa-input" type="text" title="" />

            <label for="subHeading" class="usa-label">Facility Name</label>
            <input id="subHeading" class="usa-input" type="text" title="" />

            <label for="timeZone" class="usa-label">Time Zone</label>
            <select id="timeZone" class="usa-select">
                <!--{foreach from=$timeZones item=tz}-->
                    <option value="<!--{$tz}-->"><!--{$tz}--></option>
                <!--{/foreach}-->
            </select>

            <label for="requestLabel" class="usa-label">Label for Request</label>
            <input id="requestLabel" class="usa-input" type="text" title="" />

            <div class="leaf-row-space"></div>

            <label for="leafSecureContent">LEAF Secure Status</label>
            <div class="leaf-marginTop-halfRem"><span id="leafSecureStatus">Loading...</span></div>

            <div>
                <label for="subHeading" class="usa-label">Import Tags [<a href="#" title="Groups in the Org. Chart with any one of these tags will be imported for use">?</a>]:&nbsp;</label>
                <div class="leaf-marginTop-1rem">
                    <!--{foreach from=$importTags item=importTag}-->
                        <!--{$importTag}--><br />
                    <!--{/foreach}-->
                </span>
            </div>

            <fieldset>

                <legend>Advanced Settings</legend>
                <div class="item">
                    <label for="siteType" class="usa-label">Type of Site</label>
                    <select id="siteType" class="usa-select">
                        <option value="standard">Standard</option>
                        <option value="national_primary">Nationally Standardized Primary</option>
                        <option value="national_subordinate">Nationally Standardized Subordinate</option>
                    </select>
                </div>

                <div class="item siteType national_primary" style="display: none">
                    <label for="national_linkedSubordinateList" class="usa-label">Nationally Standardized Subordinate Sites</label>
                    <div>The first site in the list should be a TEST site.<br />URLs must end with a trailing slash.</div>
                    <textarea id="national_linkedSubordinateList" cols="50" rows="5" class="usa-textarea"></textarea>
                </div>

                <div class="item siteType national_subordinate" style="display: none">
                    <label for="national_linkedPrimary" class="usa-label">Nationally Standardized Primary Site URLs must end with a trailing slash.</label>
                    <input id="national_linkedPrimary" type="text" class="usa-text" />
                </div>

            </fieldset>

            <button class="usa-button" onclick="saveSettings();">Save</button>

        </form>

    </main>

<!-- end main content -->
</div>

<!--{include file="site_elements/generic_xhrDialog.tpl"}-->
<!--{include file="site_elements/generic_confirm_xhrDialog.tpl"}-->

<script type="text/javascript">
var CSRFToken = '<!--{$CSRFToken}-->';

function saveSettings()
{
    $.when(
            $.ajax({
                type: 'POST',
                url: '../api/?a=system/settings/heading',
                data: {heading: $('#heading').val(),
                    CSRFToken: '<!--{$CSRFToken}-->'},
                success: function(res) {
                }
            }),
            $.ajax({
                type: 'POST',
                url: '../api/?a=system/settings/subHeading',
                data: {subHeading: $('#subHeading').val(),
                    CSRFToken: '<!--{$CSRFToken}-->'},
                success: function(res) {
                }
            }),
            $.ajax({
                type: 'POST',
                url: '../api/?a=system/settings/requestLabel',
                data: {requestLabel: $('#requestLabel').val(),
                    CSRFToken: '<!--{$CSRFToken}-->'},
                success: function(res) {
                }
            }),
            $.ajax({
                type: 'POST',
                url: '../api/?a=system/settings/timeZone',
                data: {timeZone: $('#timeZone').val(),
                    CSRFToken: '<!--{$CSRFToken}-->'},
                success: function(res) {
                }
            }),
            $.ajax({
                type: 'POST',
                url: '../api/?a=system/settings/siteType',
                data: {siteType: $('#siteType').val(),
                    CSRFToken: '<!--{$CSRFToken}-->'},
                success: function(res) {
                }
            }),
            $.ajax({
                type: 'POST',
                url: '../api/?a=system/settings/national_linkedSubordinateList',
                data: {national_linkedSubordinateList: $('#national_linkedSubordinateList').val(),
                    CSRFToken: '<!--{$CSRFToken}-->'},
                success: function(res) {
                }
            }),
            $.ajax({
                type: 'POST',
                url: '../api/?a=system/settings/national_linkedPrimary',
                data: {national_linkedPrimary: $('#national_linkedPrimary').val(),
                    CSRFToken: '<!--{$CSRFToken}-->'},
                success: function(res) {
                }
            })
         ).then(function() {
        	 $('#progress').html('Settings saved.');
        	 $('#progress').fadeIn(10, function() {
                 $('#progress').fadeOut(2000);
        	 });
         });
}

function renderSiteType() {
    $('.siteType').css('display', 'none');
    switch($('#siteType').val()) {
        case 'national_primary':
            $('.national_primary').css('display', 'inline');
            break;
        case 'national_subordinate':
            $('.national_subordinate').css('display', 'inline');
            break;
        default:
            break;
    }
}

function renderSettings(res) {
    var query = new LeafFormQuery();
    query.setRootURL('../');
    query.addTerm('categoryID', '=', 'leaf_secure');

    for(var i in res) {
        $('#' + i).val(res[i]);
        if(i == 'leafSecure') {
            if(res[i] >= 1) { // Certified
                query.addTerm('stepID', '=', 'resolved');
                query.join('recordResolutionData');
                query.onSuccess(function(data) {
                    var mostRecentID = null;
                    var mostRecentDate = 0;
                    for(var i in data) {
                        if(data[i].recordResolutionData.lastStatus == 'Approved'
                            && data[i].recordResolutionData.fulfillmentTime > mostRecentDate) {
                            mostRecentDate = data[i].recordResolutionData.fulfillmentTime;
                            mostRecentID = i;
                        }
                    }
                    $('#leafSecureStatus').html('<span style="font-size: 120%; padding: 4px; background-color: green; color: white; font-weight: bold">Certified</span> <button class="usa-button usa-button--accent-cool leaf-btn-med" href="../index.php?a=printview&recordID='+ mostRecentID +'">View Details</button>');
                });
                query.execute();
            }
            else { // Not certified
                query.addTerm('stepID', '!=', 'resolved');
                query.onSuccess(function(data) {
                    if(data.length == 0) {
                        $('#leafSecureStatus').html('<span style="font-size: 120%; padding: 4px; background-color: red; color: white; font-weight: bold">Not Certified</span> <button class="usa-button usa-button--accent-cool leaf-btn-med" href="../report.php?a=LEAF_start_leaf_secure_certification">Start Certification Process</button>');
                    }
                    else {
                        var recordID = data[Object.keys(data)[0]].recordID;
                        $('#leafSecureStatus').html('<span style="font-size: 120%; padding: 4px; background-color: red; color: white; font-weight: bold">Not Certified</span> <button class="usa-button usa-button--accent-cool leaf-btn-med" href="../index.php?a=printview&recordID='+ recordID +'">Check Certification Progress</button>');
                    }
                });
                query.execute();
            }
        }
    }
    renderSiteType();
}

var dialog, dialog_confirm;
$(function() {
	dialog = new dialogController('xhrDialog', 'xhr', 'loadIndicator', 'button_save', 'button_cancelchange');
    dialog_confirm = new dialogController('confirm_xhrDialog', 'confirm_xhr', 'confirm_loadIndicator', 'confirm_button_save', 'confirm_button_cancelchange');

    $.ajax({
        type: 'GET',
        url: '../api/system/settings',
        cache: false
    })
    .then(function(res) {
        renderSettings(res)
    });

    $('#siteType').on('change', function() {
        renderSiteType();
    });
});

</script>
