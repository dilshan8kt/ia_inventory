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

//view sub location modal
$('#view').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);

    var id = button.data('id');
    var depid = button.data('depid');
    var catid = button.data('catid');
    var supid = button.data('supid');
    var code = button.data('code');
    var barcode1 = button.data('barcode1');
    var barcode2 = button.data('barcode2');
    var nameeng = button.data('nameeng');
    var namesin = button.data('namesin');
    var nameunit = button.data('nameunit');
    var status;
    var reorder = button.data('reorder');

    if(button.data('status')==1){
        status = 'Active';
    }else{
        status = 'Deactivate';
    }
    
    var modal = $(this);
    modal.find('#code').val(code);
    modal.find('#barcode_1').val(barcode1);
    modal.find('#barcode_2').val(barcode2);
    modal.find('#name_eng').val(nameeng);
    modal.find('#name_sin').val(namesin);
    modal.find('select[name="department_id"]').val(depid);
    modal.find('select[name="category_id"]').val(catid);
    modal.find('select[name="supplier_id"]').val(supid);
    modal.find('#unit_name').val(nameunit);
    modal.find('#status').val(status);
    

    $.ajax({
        type: "GET",
        url: '',
        data: {"product_id": id},
        success: function (data) {
            // $("#re-order").html(data);
            if(reorder){
                $('#re-order').show();
                modal.find('#re_order_level').val(data[0].level);
                modal.find('#re_order_quantity').val(data[0].quantity);
                modal.find('#re_order_max').val(data[0].max);
            }else{
                $('#re-order').hide();
            }
            
        },
        error: function(xhr, status, error){
            alert(xhr.responseText);
        }
    });
});

//delete modal
$('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);

    var id = button.data('id');
    
    var modal = $(this);
    modal.find('#id').val(id);
});


// var id;

//edit item modal
$('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);

    var id = button.data('id');
    var depid = button.data('depid');
    var catid = button.data('catid');
    var supid = button.data('supid');
    var code = button.data('code');
    var barcode1 = button.data('barcode1');
    var barcode2 = button.data('barcode2');
    var nameeng = button.data('nameeng');
    var namesin = button.data('namesin');
    var nameunit = button.data('nameunit');
    var status = button.data('status');
    var reorder = button.data('reorder');
    
    var modal = $(this);
    $.ajax({
        type: "GET",
        url: '',
        data: {"department_id": depid},
        success: function (data) {
            $("#category_id_edit").html(data);
            modal.find('select[name="category_id_edit"]').val(catid);
            $('#category_id_edit').prop('disabled', false);
        },
        error: function(xhr, status, error){
            alert(xhr.responseText);
        }
    });

    modal.find('#product_id').val(id);
    modal.find('#code').val(code);
    modal.find('#barcode_1').val(barcode1);
    modal.find('#barcode_2').val(barcode2);
    modal.find('#name_eng').val(nameeng);
    modal.find('#name_sin').val(namesin);
    modal.find('select[name="department_id_edit"]').val(depid);
    modal.find('select[name="supplier_id"]').val(supid);
    modal.find('#unit_name').val(nameunit);
    modal.find('#status').val(status);
    if(reorder){
        $('#re_order_edit').prop('checked', true);
        $('#if-hide-edit').show();


        $.ajax({
            type: "GET",
            url: '',
            data: {"product_id": id},
            success: function (data) {
                // console.log(data[0]);
                modal.find('#re_order_level').val(data[0].level);
                modal.find('#re_order_quantity').val(data[0].quantity);
                modal.find('#re_order_max').val(data[0].max);
            },
            error: function(xhr, status, error){
                alert(xhr.responseText);
            }
        });


    }else{
        $('#re_order_edit').prop('checked', false);
        modal.find('#re_order_level').val("");
        modal.find('#re_order_quantity').val("");
        modal.find('#re_order_max').val("");
        $('#if-hide-edit').hide();
    }

    $('#department_id_edit').change(function() {
        $value = $(this).val();
        $.ajax({
            type: "GET",
            url: '',
            data: {"department_id": $value},
            success: function (data) {
                $("#category_id_edit").html(data);
                $('#category_id_edit').prop('disabled', false);
            },
            error: function(xhr, status, error){
                alert(xhr.responseText);
            }
        });
    });
});

$('#re_order_edit').change(function(){
    if($(this).is(":checked")){
        $('#if-hide-edit').show();
    }else{
        $('#if-hide-edit').hide();
    }
});