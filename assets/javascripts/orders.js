$(document).ready(function(){
    $('#country').on('change', function(){
        var countryIso = $(this).val();

        $.getJSON('index.php?controller=cities', {iso: countryIso }, function(json){
            var html = '<option value="">Select city...</option>';
            for(var i in json) {
                var city = json[i];
                html += '<option value="' + city.id + '">' + city.name + '</option>';
            }
            $('#city').html(html);
        });
    });
});