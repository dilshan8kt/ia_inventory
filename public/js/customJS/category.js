//datatable options and init
$("#data-table-default").length && $("#data-table-default").DataTable({
    responsive: !0,
    "bLengthChange": false,
    "pageLength": 5
});

//add new button to datatable area
$("#data-table-default_wrapper>div:first-child>div:first-child").addClass('addnew');
$( ".addnew" ).append( "<button name='add-new-category' data-backdrop='static' data-toggle='modal' data-target='#add' id='add-new-category' class='btn btn-primary'>Add New Category</button>");

//view modal
$('#view').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);

    var department = button.data('dept');
    var name = button.data('name');
    var description = button.data('description');
    var status;

    if(button.data('status')==1){
        status = 'Active';
    }else{
        status = 'Deactivate';
    }
    
    var modal = $(this);
    modal.find('#department').val(department);
    modal.find('#name').val(name);
    modal.find('#description').val(description);
    modal.find('#status').val(status);
});

//delete modal
$('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)

    var id = button.data('id');
    
    var modal = $(this);
    modal.find('#id').val(id);
});

//edit modal
$('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);

    var department = button.data('dept');
    var id = button.data('id');
    var name = button.data('name');
    var description = button.data('description');
    var status = button.data('status');
    
    var modal = $(this);
    modal.find('select[name="department_id"]').val(department);
    modal.find('#id').val(id);
    modal.find('#name').val(name);
    modal.find('#description').val(description);
    modal.find('select[name="status"]').val(status);
});