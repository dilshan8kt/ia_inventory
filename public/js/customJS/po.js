$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".search-combo").select2();

$("#product_id").change(function() {
    $.ajax({
        type: "GET",
        url: '',
        data: {"product_id": $(this).val()},
        success: function (data) {
            console.log(data);
            $('select[name="product_name"]').val(data[0][0].id);
            $("#select2-product_name-container").attr("title", data[0][0].name_eng);
            $("#select2-product_name-container").text(data[0][0].name_eng);
            if(data[1][0] != null){
                $("#unit_price").val(data[1][0].cost_price);
            }else{
                $("#unit_price").val("0.00");
            }
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
            console.log(data);
            $("select[name='product_id']").val(data[0][0].id);
            $("#select2-product_id-container").attr("title", data[0][0].code);
            $("#select2-product_id-container").text(data[0][0].code);
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

$("#quantity").change(function() {
    var cost =$("#unit_price").val();
    $("#total_amount").val(cost * $(this).val());
});

// $("#tmp").submit(function(e) {
//     e.preventDefault();

//     var product_id = $("#product_id").val();
//     var qty = $("#quantity").val();
//     var unit_price = $("#unit_price").val();

//     // console.log(product_id);
//     $.ajax({
//         type: "POST",
//         url: 'tmp-po',
//         data: {
//             "product_id": product_id,
//             "quantity": qty,
//             "unit_price": unit_price
//         },
//         success: function (data) {
//             console.log(data);
//             // $("tbody").html(data);
//         },
//         error: function(xhr, status, error){
//             alert(xhr.responseText);
//         }
//     });
// });