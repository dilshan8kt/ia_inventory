//datatable options and init
$("#data-table-default").length && $("#data-table-default").DataTable({
    responsive: !0,
    "bLengthChange": false,
    "pageLength": 5
});

$('#if-hide').hide();

$('#re_order').change(function(){
    if($(this).is(":checked")){
        $('#if-hide').show();
    }else{
        $('#if-hide').hide();
    }
});

//add new button to datatable area
$("#data-table-default_wrapper>div:first-child>div:first-child").addClass('addnew');
$( ".addnew" ).append("<button name='add-new-item' data-backdrop='static' data-toggle='modal' data-target='#add' id='add-new-item' class='btn btn-primary'>Add New Item</button>");

$('#category_id').prop('disabled', true);

$('#department_id').change(function() {
    $value = $(this).val();
    $.ajax({
        type: "GET",
        url: '',
        data: {"department_id": $value},
        success: function (data) {
            $("#category_id").html(data);
            $('#category_id').prop('disabled', false);
        },
        error: function(xhr, status, error){
            alert(xhr.responseText);
        }
    });
});