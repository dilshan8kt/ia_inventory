<div class="modal fade" id="add" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('user') }}" data-parsley-validate="true">
                    @csrf
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="name">Name * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('first_name') ? ' parsley-error' : '' }}" value="{{ old('first_name') }}" type="text" id="first_name" name="first_name" placeholder="First name" data-parsley-required="true"/>
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="name"></label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('middle_name') ? ' parsley-error' : '' }}" value="{{ old('middle_name') }}" type="text" id="middle_name" name="middle_name" placeholder="Middle name" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="name"></label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('last_name') ? ' parsley-error' : '' }}" value="{{ old('last_name') }}" type="text" id="last_name" name="last_name" placeholder="Last name" data-parsley-required="true"/>
                        </div>
                    </div>
                    
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="phone">Telephone No :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('phone') ? ' parsley-error' : '' }}" value="{{ old('phone') }}" type="text" id="phone" name="phone" placeholder="Mobile - (999) 999-9999" />
                        
                            @if ($errors->has('phone'))
                            <ul class="parsley-errors-list filled" id="parsley-id-5">
                                <li class="parsley-required">{{ $errors->first('phone') }}</li>
                            </ul>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="username">Username :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('username') ? ' parsley-error' : '' }}" value="{{ old('username') }}" type="email" id="username" name="username" placeholder="example@example.com" />
                        
                            @if ($errors->has('username'))
                            <ul class="parsley-errors-list filled" id="parsley-id-5">
                                <li class="parsley-required">{{ $errors->first('username') }}</li>
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
                            <button type="submit" id="addSupplier" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>