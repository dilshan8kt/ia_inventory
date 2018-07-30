//datatable options and init
$("#data-table-default").length && $("#data-table-default").DataTable({
    responsive: !0,
    "bLengthChange": false,
    "pageLength": 5
});

$("#telephone_no").mask("(999) 999-9999");

//add new button to datatable area
$("#data-table-default_wrapper>div:first-child>div:first-child").addClass('addnew');
$( ".addnew" ).append( "<div class='form-group'><button name='add-new-client' data-backdrop='static' data-toggle='modal' data-target='#add' id='add-new-client' class='form-control btn btn-primary'>Add New Client</button></div>");

//view modal
$('#view').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);

    var companyname = button.data('companyname');
    var aline1 = button.data('aline1');
    var aline2 = button.data('aline2');
    var aline3 = button.data('aline3');
    var telephoneno = button.data('telephoneno');
    var email = button.data('email');
    var status;

    if(button.data('status')==1){
        status = 'Active';
    }else{
        status = 'Deactivate';
    }
    
    var modal = $(this);
    modal.find('#company_name').val(companyname);
    modal.find('#address_line_1').val(aline1);
    modal.find('#address_line_2').val(aline2);
    modal.find('#address_line_3').val(aline3);
    modal.find('#telephone_no').val(telephoneno);
    modal.find('#email').val(email);
    modal.find('#status').val(status);
});