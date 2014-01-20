/**
 * Created by gigorok on 20.01.14.
 */

$(document).ready(function(){
    $('#map_type').on('change', function(){
        var mapType = $(this).val();

        switch (mapType) {
            case 'voip':
                $('#voip_form').show();
                break;
            default:
                $('#voip_form').hide();
        }
    });
});