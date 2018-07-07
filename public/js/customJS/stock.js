$(".selectpicker").selectpicker("render");

$('#item_code').change(function() {
    $value = $(this).val();
    $("#item_name option:selected").val($value);
});