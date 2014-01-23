/**
 * Created by gigorok on 20.01.14.
 */

$(document).ready(function(){
    $('#map_type').on('change', function(){
        var mapType = $(this).val();

        switch (mapType) {
            case 'voip':
                $('#voip_form').show();
                $('#map_details').prop('disabled', false);
                break;
            case 'pbxww':
                $('#voip_form').hide();
                $('#map_details').prop('disabled', true);
                break;
            default:
                $('#voip_form').hide();
                $('#map_details').prop('disabled', false);
        }
    });
});