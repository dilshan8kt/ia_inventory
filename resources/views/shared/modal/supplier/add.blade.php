<div class="modal fade" id="addSupplier" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('supplier') }}" data-parsley-validate="true">
                    @csrf
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="name">Ref. Name * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('ref_name') ? ' parsley-error' : '' }}" value="{{ old('ref_name') }}" type="text" id="ref_name" name="ref_name" placeholder="Ref. Name" data-parsley-required="true"/>
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="company_name">Company Name :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('company_name') ? ' parsley-error' : '' }}" value="{{ old('company_name') }}" type="text" id="company_name" name="company_name" placeholder="Company Name" />
                            
                            @if ($errors->has('company_name'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('company_name') }}</li>
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
                        <label class="col-md-4 col-sm-4 col-form-label" for="phone1">Telephone No :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('phone1') ? ' parsley-error' : '' }}" value="{{ old('phone1') }}" type="text" id="phone1" name="phone1" placeholder="Mobile - (999) 999-9999" />
                        
                            @if ($errors->has('phone1'))
                            <ul class="parsley-errors-list filled" id="parsley-id-5">
                                <li class="parsley-required">{{ $errors->first('phone1') }}</li>
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="phone1"></label>

                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('phone2') ? ' parsley-error' : '' }}" value="{{ old('phone2') }}" type="text" id="phone2" name="phone2" placeholder="Land - (999) 999-9999" />
                        
                            @if ($errors->has('phone2'))
                            <ul class="parsley-errors-list filled" id="parsley-id-5">
                                <li class="parsley-required">{{ $errors->first('phone2') }}</li>
                            </ul>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="email">Email :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('email') ? ' parsley-error' : '' }}" value="{{ old('email') }}" type="email" id="email" name="email" placeholder="example@example.com" />
                        
                            @if ($errors->has('email'))
                            <ul class="parsley-errors-list filled" id="parsley-id-5">
                                <li class="parsley-required">{{ $errors->first('email') }}</li>
                            </ul>
                            @endif
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