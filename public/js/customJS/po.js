$(".selectpicker").selectpicker("render");

$("#product_code").change(function() {
    $('#product_name').val($(this).val());
    // $.ajax({
    //     type: "GET",
    //     url: '',
    //     data: {"product_id": $value},
    //     success: function (data) {
    //         // $("#cost_price").val('10.00');
    //         console.log(data);
    //         $("select[name='product_name']").val(data[0].id);
    //     },
    //     error: function(xhr, status, error){
    //         alert(xhr.responseText);
    //     }
    // });
});