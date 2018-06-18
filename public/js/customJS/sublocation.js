//phone number input mask
$("#telephone_no").mask("(999) 999-9999");
$("#telephone_no1").mask("(999) 999-9999");

//datatable options and init
$("#data-table-default").length && $("#data-table-default").DataTable({
    responsive: !0,
    "bLengthChange": false,
    "pageLength": 5
});

//add new button to datatable area
$("#data-table-default_wrapper>div:first-child>div:first-child").addClass('addnew');
$( ".addnew" ).append( "<button name='add-new-sublocation' data-backdrop='static' data-toggle='modal' data-target='#addSubLocation' id='add-new-sublocation' class='btn btn-primary'>Add New Sub Location</button>");

//edit sub location modal
$('#editSubLocation').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);

    var id = button.data('id');
    var name = button.data('name');
    var description = button.data('description');
    var telephone = button.data('telephone');
    var address = button.data('address');
    var status = button.data('status');
    
    var modal = $(this);
    modal.find('#id').val(id);
    modal.find('#location_name').val(name);
    modal.find('#description').val(description);
    modal.find('#telephone_no1').val(telephone);
    modal.find('#address').val(address);
    modal.find('select[name="status"]').val(status);
});

//delete sublocation modal
$('#deleteSubLocation').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)

    var id = button.data('id');
    
    var modal = $(this);
    modal.find('#id').val(id);
});

//disable address text if check box is checked
$('input[type="checkbox"]').click(function () {
    if ($(this).is(":checked")) {
        $("#address").attr("disabled", "disabled");
    } else {
        $("#address").removeAttr("disabled");
        $("#address").focus();
    }
});


//view sub location modal
$('#viewSubLocation').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);

    var id = button.data('id');
    var name = button.data('name');
    var description = button.data('description');
    var telephone = button.data('telephone');
    var address = button.data('address');
    var status;

    if(button.data('status')==1){
        status = 'Active';
    }else{
        status = 'Deactivate';
    }
    
    var modal = $(this);
    modal.find('#id').val(id);
    modal.find('#location_name').val(name);
    modal.find('#description').val(description);
    modal.find('#telephone_no').val(telephone);
    modal.find('#address').val(address);
    modal.find('#status').val(status);
});