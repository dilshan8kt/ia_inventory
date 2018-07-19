$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".selectpicker").selectpicker("render");

$(".bootstrap-select>button>span:last-child").removeClass("caret");

$("#product_id").change(function() {
    var x = $("#product_id>button:first-child>div:first-child").attr("title");
    console.log(x);
    $.ajax({
        type: "GET",
        url: '',
        data: {"product_id": $(this).val()},
        success: function (data) {
            // console.log(data);
            $('select[name="product_name"]').val(data[0][0].id);
            $("#p_name .bootstrap-select>button>span:first-child").text(data[0][0].name_eng);
            if(data[1][0] != null){
                $("#unit_price").val(data[1][0].cost_price);
            }else{
                $("#unit_price").val("0.00");
            }
            $("#quantity").focus();
        },
        error: function(xhr, status, error){
            alert(xhr.responseText);
        }
    });
});

$("#product_name").change(function() {
    $.ajax({
        type: "GET",
        url: '',
        data: {"product_id": $(this).val()},
        success: function (data) {
            // console.log(data);
            $('select[name="product_id"]').val(data[0][0].id);
            $("#p_code .bootstrap-select>button>span:first-child").text(data[0][0].code);
            $("#p_code .bootstrap-select>button").attr("title",data[0][0].code);
            if(data[1][0] != null){
                $("#unit_price").val(data[1][0].cost_price);
            }else{
                $("#unit_price").val("0.00");
            }
            $("#quantity").focus();
        },
        error: function(xhr, status, error){
            alert(xhr.responseText);
        }
    });
});

$("#quantity").on('keyup',function() {
    var cost =$("#unit_price").val();
    $("#total_amount").val(cost * $(this).val());
});

$("#tmp").submit(function(e) {
    e.preventDefault();

    var product_id = $("#product_id").val();
    var qty = $("#quantity").val();
    var unit_price = $("#unit_price").val();
    var h_total = parseFloat($("#h-total").val());
    var total = h_total+(qty*unit_price);
    $("#h-total").val(total);

    if(product_id != ""){
        $.ajax({
            type: "POST",
            url: 'tmp-po',
            data: {
                "product_id": product_id,
                "quantity": qty,
                "unit_price": unit_price
            },
            success: function (data) {
                $("#tbody").html(data);
                $("#p_code .bootstrap-select>button>span:first-child").attr("title", "Select Product Code");
                $("#p_code .bootstrap-select>button>span:first-child").text("Select Product Code");
                $("#p_name .bootstrap-select>button>span:first-child").attr("title", "Select Product Name");
                $("#p_name .bootstrap-select>button>span:first-child").text("Select Product Name");

                $("#total").text("LKR "+ total.toFixed(2));
                $("#tmp")[0].reset();
                $("#product_id").focus();
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
    var qty = button.data('qty');
    var unitprice = button.data('unitprice');
    
    var modal = $(this);
    modal.find('#id').val(id);
    modal.find('#qty').val(qty);
    modal.find('#unitprice').val(unitprice);
});

$("#tmp_remove").submit(function(e){
    e.preventDefault();

    var id = $("#id").val();
    var qty = $("#qty").val();
    var unit_price = $("#unitprice").val();
    var h_total = parseFloat($("#h-total").val());
    var total = h_total-(qty*unit_price);
    $("#h-total").val(total);

    $.ajax({
        type: "DELETE",
        url: 'tmp-po',
        data: {
            "id": id
        },
        success: function (data) {
            $('#remove').modal('toggle');
            $("#tbody").html(data);
            $("#total").text("LKR "+ total.toFixed(2));
        },
        error: function(xhr, status, error){
            alert(xhr.responseText);
        }
    });
});

$('#cancel').click(function(){
    console.log("cancel");
    $('#supplier_id').attr('data-parsley-required','false');
});