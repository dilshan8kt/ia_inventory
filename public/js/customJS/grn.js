$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".selectpicker").selectpicker("render");
$(".bootstrap-select>button>span:last-child").removeClass("caret");

$("#submit").attr("disabled","disabled");
$("#amount").val(0.00);
$("#free_qty").attr("disabled","disabled"); 
$("#unit_price").attr("disabled","disabled"); 
$("#sales_price").attr("disabled","disabled"); 
$("#dis_p").attr("disabled","disabled"); 
$("#dis_a").attr("disabled","disabled"); 


$("#product_id").change(function() {
    $.ajax({
        type: "GET",
        url: '',
        data: {"product_id": $(this).val()},
        success: function (data) {
            if(data[0] != null){
                $("#unit_price").val(data[0].cost_price);
                $("#sales_price").val(data[0].sale_price);
            }else{
                $("#unit_price").val("0.00");
                $("#sales_price").val("0.00");
            }
            $("#qty").focus();
        },
        error: function(xhr, status, error){
            alert(xhr.responseText);
        }
    });
});

$("#qty").on('keyup',function() {
    var unit_price =$("#unit_price").val();

    if($(this).val() != 0 && $(this).val() != null){
        $("#amount").val(unit_price * $(this).val());
        $("#free_qty").removeAttr("disabled"); 
        $("#unit_price").removeAttr("disabled"); 
        $("#sales_price").removeAttr("disabled"); 
        $("#dis_p").removeAttr("disabled"); 
        $("#dis_a").removeAttr("disabled"); 
        $("#submit").removeAttr("disabled"); 
    }else{
        $("#submit").attr("disabled","disabled");
        $("#amount").val(0.00);
        $("#free_qty").attr("disabled","disabled"); 
        $("#unit_price").attr("disabled","disabled"); 
        $("#sales_price").attr("disabled","disabled"); 
        $("#dis_p").attr("disabled","disabled"); 
        $("#dis_a").attr("disabled","disabled"); 
    }
});

$("#unit_price").on('keyup',function() {
    if($(this).val() != 0 && $(this).val() != null){
        var qty =$("#qty").val();
        $("#amount").val(qty * $(this).val());
        $("#submit").removeAttr("disabled"); 
    }else{
        $("#amount").val(0.00);
        $("#submit").attr("disabled","disabled");
    }
});

$("#sales_price").on('keyup',function() {
    if($(this).val() != 0 && $(this).val() != null){
        $("#submit").removeAttr("disabled"); 
    }else{
        $("#submit").attr("disabled","disabled");
    }
});

$("#dis_p").on('keyup',function() {
    var qty =$("#qty").val();
    var unit_price =$("#unit_price").val();
    var discount =((qty*unit_price)*$(this).val())/100;

    if($(this).val() != 0 && $(this).val() != null){
        $("#dis_a").val(discount);
        $("#amount").val((qty*unit_price)-discount);
    }else{
        $("#dis_a").val(0.00);
        $("#amount").val(qty*unit_price);
    }
});

$("#dis_a").on('keyup',function() {
    var qty =$("#qty").val();
    var unit_price = $("#unit_price").val();
    var discount =$(this).val();
    var net_total = (qty*unit_price) - discount;

    console.log('qty :'+qty+' '+ ' unit price:'+unit_price+' discount:'+discount+' net total:'+net_total);

    if($(this).val() != 0 && $(this).val() != null){
        $("#amount").val(net_total);
    }else{
        $("#amount").val(qty*unit_price);
    }
});

$("#tmp").submit(function(e) {
    e.preventDefault();
    
    var product_id = $("#product_id").val();
    var qty = $("#qty").val();
    var free_qty = $("#free_qty").val();
    var unit_price = $("#unit_price").val();
    var sales_price = $("#sales_price").val();
    var dis_p = $("#dis_p").val();
    var dis_a = $("#dis_a").val();

    if(free_qty == null || free_qty == ''){
        free_qty = 0;
    }

    if(dis_p == null || dis_p == ''){
        dis_p = 0;
    }

    if(dis_a == null || dis_a == ''){
        dis_a = 0;
    }

    var total = parseFloat($("#h_net_total").val());
    total = total + (qty * unit_price - dis_a);
    $("#h_net_total").val(total);
    
    if(product_id != ""){
        $.ajax({
            type: "POST",
            url: 'tmp-grn',
            data: {
                "product_id": product_id,
                "qty": qty,
                "free_qty": free_qty,
                "unit_price": unit_price,
                "sales_price": sales_price,
                "dis_p": dis_p,
                "dis_a": dis_a
            },
            success: function (data) {
                $("#tbody").html(data);
                $("#product .bootstrap-select>button>span:first-child").attr("title", "Select Product Name");
                $("#product .bootstrap-select>button>span:first-child").text("Select Product Name");

                $("#net_total").text("LKR "+ total.toFixed(2));

                $("#tmp")[0].reset();
                $("#product_id").focus();
                $("#amount").val(0.00);
                $("#free_qty").attr("disabled","disabled"); 
                $("#unit_price").attr("disabled","disabled"); 
                $("#sales_price").attr("disabled","disabled"); 
                $("#dis_p").attr("disabled","disabled"); 
                $("#dis_a").attr("disabled","disabled"); 
                $("#submit").attr("disabled","disabled");
            },
            error: function(xhr, status, error){
                alert(xhr.responseText);
            }
        });

        difference();
    }
});

$("#invoice_total").on('keyup',function() {
    difference();
});

difference();

function difference(){
    var net_total = parseFloat($('#h_net_total').val());
    var invoice_total = $('#invoice_total').val();
    var diff = net_total - invoice_total;
    if(diff != 0){
        $('#net_total_back').addClass("color");
    }else{
        $('#net_total_back').removeClass("color");
    }
}

$('#remove').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)

    var id = button.data('id');
    var amount = button.data('amount');
    
    var modal = $(this);
    modal.find('#id').val(id);
    modal.find('#m_amount').val(amount);
});

$("#tmp_remove").submit(function(e){
    e.preventDefault();

    var id = $("#id").val();
    var amount = $("#m_amount").val();
    var net_total = parseFloat($("#h_net_total").val());
    var total = net_total - amount;

    if(total == null || total == ''){
        total = 0;
    }

    $("#h_net_total").val(total);

    $.ajax({
        type: "DELETE",
        url: 'tmp-grn',
        data: {
            "id": id
        },
        success: function (data) {
            $('#remove').modal('toggle');
            $("#tbody").html(data);
            $("#net_total").text("LKR "+ total.toFixed(2));
        },
        error: function(xhr, status, error){
            alert(xhr.responseText);
        }
    });
    difference();
});

$('#cancel').click(function(){
    $('#supplier_id').attr('data-parsley-required','false');
    $('#location_id').attr('data-parsley-required','false');
    $('#invoice_no').attr('data-parsley-required','false');
    $('#grn_date').attr('data-parsley-required','false');
    $('#invoice_total').attr('data-parsley-required','false');
});