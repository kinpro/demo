/**
 * Created by gigorok on 20.01.14.
 */

$(document).ready(function(){
    $('#addRow').on('click', function(){
        var counter = +$('.table tr:last td:first').html();

        var tr = '<tr>' +
            '<td>' + (counter + 1) + '</td>' +
            '<td><input type="text" name="src_prefix[]" class="form-control"></td>' +
            '<td><input type="text" name="dst_prefix[]" class="form-control"></td>' +
            '<td><input type="text" name="rate[]" class="form-control"></td>' +
            '<td><input type="text" name="connect_fee[]" class="form-control"></td>' +
            '<td><input type="text" name="reject_calls[]" class="form-control"></td>' +
            '<td><button type="button" class="btn btn-danger">Remove</button></td>' +
        '</tr>';

        $('.table > tbody:last').append(tr);

    });

    $('.table').on('click', 'tr button', function(){
        $(this).closest('tr').remove();
    });
});