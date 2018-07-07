<div class="modal fade" id="edit-profile" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Profile Details</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('profile') }}" enctype="multipart/form-data" data-parsley-validate="true">
                    @method('put')
                    @csrf
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="first_name">First Name * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('first_name') ? ' parsley-error' : '' }}" value="{{ Auth::user()->first_name }}" type="text" id="first_name" name="first_name" data-parsley-required="true" />
                            
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
                            <input class="form-control" value="{{ Auth::user()->middle_name }}" type="text" id="middle_name" name="middle_name" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="last_name">Last Name * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('last_name') ? ' parsley-error' : '' }}" value="{{ Auth::user()->last_name }}" type="text" id="last_name" name="last_name" data-parsley-required="true" />
                            
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
                            <input class="form-control {{ $errors->has('telephone_no') ? ' parsley-error' : '' }}" value="{{ Auth::user()->telephone_no }}" type="text" id="telephone_no" name="telephone_no" placeholder="(999) 999-9999" data-parsley-required="true"/>
                            
                            @if ($errors->has('telephone_no'))
                            <ul class="parsley-errors-list filled" id="parsley-id-5">
                                <li class="parsley-required">{{ $errors->first('telephone_no') }}</li>
                            </ul>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Image :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control-file" type="file" id="image" name="image" placeholder="Profile Picture"/>
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