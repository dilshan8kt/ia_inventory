<div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('profile') }}" data-parsley-validate="true">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="first_name">First Name * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('first_name') ? ' parsley-error' : '' }}" type="text" id="first_name" name="first_name" data-parsley-required="true" />
                            
                            @if ($errors->has('first_name'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('first_name') }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="middle_name">Middle Name :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" type="text" id="middle_name" name="middle_name" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="last_name">Last Name * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('last_name') ? ' parsley-error' : '' }}" type="text" id="last_name" name="last_name" data-parsley-required="true" />
                            
                            @if ($errors->has('last_name'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('last_name') }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="telephone">Telephone No :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('phone_edit') ? ' parsley-error' : '' }}" type="text" id="phone_edit" name="phone_edit" placeholder="(999) 999-9999" data-parsley-required="true"/>
                            
                            @if ($errors->has('phone_edit'))
                            <ul class="parsley-errors-list filled" id="parsley-id-5">
                                <li class="parsley-required">{{ $errors->first('phone_edit') }}</li>
                            </ul>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">User Role :</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" id="select-required" name="role" data-parsley-required="true">
                                <option value="" selected>Select User Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Staus :</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" id="select-required" name="status" data-parsley-required="true">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer form-group row m-b-0">
                        <div class="col-md-8 col-sm-8">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>