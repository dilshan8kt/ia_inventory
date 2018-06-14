<div class="modal fade" id="editSubLocation" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sub Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('sublocation') }}" data-parsley-validate="true">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="location_name">Location Name * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('location_name') ? ' parsley-error' : '' }}" value="{{ old('location_name') }}" type="text" id="location_name" name="location_name" placeholder="Sub Location Name" data-parsley-required="true" />
                            
                            @if ($errors->has('location_name'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('location_name') }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="description">Description :</label>
                        <div class="col-md-8 col-sm-8">
                            <textarea class="form-control {{ $errors->has('description') ? ' parsley-error' : '' }}" id="description" name="description" rows="2" placeholder="Description">{{ old('description') }}</textarea>
                            
                            @if ($errors->has('description'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('description') }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="telephone">Telephone No :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('telephone_no') ? ' parsley-error' : '' }}" value="{{ old('telephone_no') }}" type="text" id="telephone_no1" name="telephone_no" placeholder="(999) 999-9999" />
                            
                            @if ($errors->has('telephone_no'))
                            <ul class="parsley-errors-list filled" id="parsley-id-5">
                                <li class="parsley-required">{{ $errors->first('telephone_no') }}</li>
                            </ul>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="address">Address :</label>
                        <div class="col-md-8 col-sm-8">
                            <textarea class="form-control {{ $errors->has('address') ? ' parsley-error' : '' }}" id="address" name="address" rows="2" placeholder="Address">{{ old('address') }}</textarea>
                            
                            @if ($errors->has('address'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('address') }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Staus :</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" id="status" name="status" data-parsley-required="true">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer form-group row m-b-0">
                        <label class="col-md-4 col-sm-4 col-form-label">&nbsp;</label>
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