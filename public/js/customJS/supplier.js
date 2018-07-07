//phone number input mask
$("#phone1").mask("(999) 999-9999");
$("#phone2").mask("(999) 999-9999");
$("#ephone1").mask("(999) 999-9999");
$("#ephone2").mask("(999) 999-9999");

//datatable options and init
$("#data-table-default").length && $("#data-table-default").DataTable({
    responsive: !0,
    "bLengthChange": false,
    "pageLength": 5
});

//add new button to datatable area
$("#data-table-default_wrapper>div:first-child>div:first-child").addClass('addnew');
$( ".addnew" ).append( "<button name='add-new-supplier' data-backdrop='static' data-toggle='modal' data-target='#addSupplier' id='add-new-supplier' class='btn btn-primary'>Add New Supplier</button>");

//edit sub location modal
$('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);

    var id = button.data('id');
    var code = button.data('code');
    var refname = button.data('refname');
    var companyname = button.data('companyname');
    var address = button.data('address');
    var phone1 = button.data('phone1');
    var phone2 = button.data('phone2');
    var email = button.data('email');
    var status = button.data('status');

    var modal = $(this);
    modal.find('#id').val(id);
    modal.find('#code').val(code);
    modal.find('#eref_name').val(refname);
    modal.find('#ecompany_name').val(companyname);
    modal.find('#eaddress').val(address);
    modal.find('#ephone1').val(phone1);
    modal.find('#ephone2').val(phone2);
    modal.find('#eemail').val(email);
    modal.find('select[name="status"]').val(status);
});

//delete sublocation modal
$('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)

    var id = button.data('id');
    
    var modal = $(this);
    modal.find('#id').val(id);
});



//view sub location modal
$('#view').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);

    var code = button.data('code');
    var refname = button.data('refname');
    var companyname = button.data('companyname');
    var address = button.data('address');
    var phone1 = button.data('phone1');
    var phone2 = button.data('phone2');
    var email = button.data('email');
    var status;

    if(button.data('status')==1){
        status = 'Active';
    }else{
        status = 'Deactivate';
    }
    
    var modal = $(this);
    modal.find('#code').val(code);
    modal.find('#ref_name').val(refname);
    modal.find('#company_name').val(companyname);
    modal.find('#address').val(address);
    modal.find('#phone1').val(phone1);
    modal.find('#phone2').val(phone2);
    modal.find('#email').val(email);
    modal.find('#status').val(status);
});