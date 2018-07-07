<div class="modal fade" id="change-password" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('changepassword') }}" data-parsley-validate="true">
                    @csrf
                    
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="current_password">Current Password * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('current_password') ? ' parsley-error' : '' }}" type="password" id="current_password" name="current_password" data-parsley-required="true" />
                            
                            @if ($errors->has('current_password'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('current_password') }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="new_password">New Password * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('new_password') ? ' parsley-error' : '' }}" type="password" id="new_password" name="new_password" data-parsley-required="true" />
                            
                            @if ($errors->has('new_password'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('new_password') }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="confirm_password">Confirm Password * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('confirm_password') ? ' parsley-error' : '' }}" type="password" id="confirm_password" name="confirm_password" data-parsley-equalto="#new_password" data-parsley-required="true" />
                            
                            @if ($errors->has('confirm_password'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('confirm_password') }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer form-group row m-b-0">
                        <div class="col-md-8 col-sm-8">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="addSubLocation" class="btn btn-primary">Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>