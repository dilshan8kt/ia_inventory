<div class="modal fade" id="add" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('site.client') }}" data-parsley-validate="true">
                    @csrf
                    
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Company Name * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('company_name') ? ' parsley-error' : '' }}" value="{{ old('company_name') }}" type="text" id="company_name" name="company_name" placeholder="Company Name" data-parsley-required="true" />
                            
                            @if ($errors->has('company_name'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('company_name') }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Owner Name * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input type="text" class="form-control {{ $errors->has('first_name') ? ' parsley-error' : '' }}" id="first_name" name="first_name" placeholder="First name" value="{{ old('first_name') }}" data-parsley-required="true" />
                            
                            @if ($errors->has('first_name'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('first_name') }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label"></label>
                        <div class="col-md-8 col-sm-8">
                            <input type="text" class="form-control {{ $errors->has('middle_name') ? ' parsley-error' : '' }}" id="middle_name" name="middle_name" placeholder="Middle name" value="{{ old('middle_name') }}" />
                            
                            @if ($errors->has('middle_name'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('middle_name') }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label"></label>
                        <div class="col-md-8 col-sm-8">
                            <input type="text" class="form-control {{ $errors->has('last_name') ? ' parsley-error' : '' }}" id="last_name" name="last_name" placeholder="Last name" value="{{ old('last_name') }}" data-parsley-required="true" />
                            
                            @if ($errors->has('last_name'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('last_name') }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Address * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input type="text" class="form-control {{ $errors->has('address_line_1') ? ' parsley-error' : '' }}" id="address_line_1" name="address_line_1" placeholder="Address line 1" value="{{ old('address_line_1') }}" data-parsley-required="true" />
                            
                            @if ($errors->has('address_line_1'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('address_line_1') }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label"></label>
                        <div class="col-md-8 col-sm-8">
                            <input type="text" class="form-control {{ $errors->has('address_line_2') ? ' parsley-error' : '' }}" id="address_line_2" name="address_line_2" placeholder="Address line 2" value="{{ old('address_line_2') }}" data-parsley-required="true" />
                            
                            @if ($errors->has('address_line_2'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('address_line_2') }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label"></label>
                        <div class="col-md-8 col-sm-8">
                            <input type="text" class="form-control {{ $errors->has('address_line_3') ? ' parsley-error' : '' }}" id="address_line_3" name="address_line_3" placeholder="Address line 3" value="{{ old('address_line_3') }}" data-parsley-required="true" />
                            
                            @if ($errors->has('address_line_3'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('address_line_3') }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Telephone no * :</label>

                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('telephone_no') ? ' parsley-error' : '' }}" value="{{ old('telephone_no') }}" type="text" id="telephone_no" name="telephone_no" placeholder="(999) 999-9999" data-parsley-required="true" />
                        
                            @if ($errors->has('telephone_no'))
                            <ul class="parsley-errors-list filled" id="parsley-id-5">
                                <li class="parsley-required">{{ $errors->first('telephone_no') }}</li>
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="email">Email * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('email') ? ' parsley-error' : '' }}" value="{{ old('email') }}" type="email" id="email" name="email" placeholder="example@example.com" data-parsley-required="true" />
                        
                            @if ($errors->has('email'))
                            <ul class="parsley-errors-list filled" id="parsley-id-5">
                                <li class="parsley-required">{{ $errors->first('email') }}</li>
                            </ul>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Package * :</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" id="package" name="package" data-parsley-required="true">
                                <option value="">Select Package</option>
                                @foreach ($package as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Staus * :</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" id="status" name="status" data-parsley-required="true">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer form-group row m-b-0">
                        <div class="col-md-8 col-sm-8">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="addSubLocation" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>