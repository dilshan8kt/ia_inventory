$("#phone").mask("(999) 999-9999");
$("#phone_edit").mask("(999) 999-9999");

//datatable options and init
$("#data-table-default").length && $("#data-table-default").DataTable({
    responsive: !0,
    "bLengthChange": false,
    "pageLength": 5
});

//add new button to datatable area
$("#data-table-default_wrapper>div:first-child>div:first-child").addClass('addnew');
$( ".addnew" ).append( "<div class='form-group'><button name='add-new-user' data-backdrop='static' data-toggle='modal' data-target='#add' id='add-new-user' class='form-control btn btn-primary'>Add New User</button></div>");

//view modal
$('#view').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);

    var fname = button.data('fname');
    var mname = button.data('mname');
    var lname = button.data('lname');
    var phone = button.data('phone');
    var username = button.data('username');
    var role = button.data('role');
    var status;

    if(button.data('status')==1){
        status = 'Active';
    }else{
        status = 'Deactivate';
    }
    
    var modal = $(this);
    modal.find('#first_name').val(fname);
    modal.find('#middle_name').val(mname);
    modal.find('#last_name').val(lname);
    modal.find('#phone').val(phone);
    modal.find('#username').val(username);
    modal.find('#user_role').val(role);
    modal.find('#status').val(status);
});

//edit modal
$('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);

    var id = button.data('id');
    var fname = button.data('fname');
    var mname = button.data('mname');
    var lname = button.data('lname');
    var phone = button.data('phone');
    var username = button.data('username');
    var role = button.data('role');
    var status = button.data('status');
    
    var modal = $(this);
    modal.find('#id').val(id);
    modal.find('#first_name').val(fname);
    modal.find('#middle_name').val(mname);
    modal.find('#last_name').val(lname);
    modal.find('#phone_edit').val(phone);
    modal.find('#username').val(username);
    modal.find('select[name="role"]').val(role[0].id);
    modal.find('#status').val(status);
});

//delete modal
$('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)

    var id = button.data('id');
    
    var modal = $(this);
    modal.find('#id').val(id);
});
