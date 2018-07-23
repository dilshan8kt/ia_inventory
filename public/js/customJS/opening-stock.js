$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#submit").attr("disabled","disabled");

$(".selectpicker").selectpicker("render");
$(".bootstrap-select>button>span:last-child").removeClass("caret");

$("#product_id").change(function() {
    $("#quantity").focus();
});

$("#sales_price").on('keyup',function() {
    if($(this).val() != 0 && $(this).val() != null){
        $("#submit").removeAttr("disabled"); 
    }else{
        $("#submit").attr("disabled","disabled");
    }
});


$("#tmp").submit(function(e) {
    e.preventDefault();
    
    var product_id = $("#product_id").val();
    var qty = $("#quantity").val();
    var cost_price = $("#cost_price").val();
    var ws_price = $("#ws_price").val();
    var sales_price = $("#sales_price").val();

    if(product_id != ""){
        $.ajax({
            type: "POST",
            url: 'tmp-os',
            data: {
                "product_id": product_id,
                "quantity": qty,
                "cost_price": cost_price,
                "ws_price": ws_price,
                "sales_price": sales_price
            },
            success: function (data) {
                $("#tbody").html(data);
                $("#product .bootstrap-select>button>span:first-child").attr("title", "Select Product Name");
                $("#product .bootstrap-select>button>span:first-child").text("Select Product Name");

                $("#tmp")[0].reset();
                $("#product_id").focus();
                $("#submit").attr("disabled","disabled");
            },
            error: function(xhr, status, error){
                alert(xhr.responseText);
            }
        });
    }
});

$('#remove').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)

    var id = button.data('id');
    
    var modal = $(this);
    modal.find('#id').val(id);
});

$("#tmp_remove").submit(function(e){
    e.preventDefault();

    var id = $("#id").val();

    $.ajax({
        type: "DELETE",
        url: 'tmp-os',
        data: {
            "id": id
        },
        success: function (data) {
            $('#remove').modal('toggle');
            $("#tbody").html(data);
        },
        error: function(xhr, status, error){
            alert(xhr.responseText);
        }
    });
});