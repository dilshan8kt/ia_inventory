$("#data-table-default").length && $("#data-table-default").DataTable({
    responsive: !0,
    "bLengthChange": false,
    "pageLength": 5
});

//add new button to datatable area
$("#data-table-default_wrapper>div:first-child>div:first-child").addClass('addnew');
$( ".addnew" ).append("<div class='form-group'><button name='add-new-price' data-backdrop='static' data-toggle='modal' data-target='#add' id='add-new-price' class='form-control btn btn-primary'>Add New Price</button></div>");
