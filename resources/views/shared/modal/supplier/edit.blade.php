<div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
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
                        @method('put')
                        <input type="hidden" name="id" id="id">
                        <div class="form-group row m-b-15">
                            <label class="col-md-4 col-sm-4 col-form-label" for="name">Supplier Code :</label>
                            <div class="col-md-8 col-sm-8">
                                <input class="form-control" type="text" id="code" name="code" readonly/>
                            </div>
                        </div>
    
                        <div class="form-group row m-b-15">
                            <label class="col-md-4 col-sm-4 col-form-label" for="eref_name">Ref. Name * :</label>
                            <div class="col-md-8 col-sm-8">
                                <input class="form-control {{ $errors->has('eref_name') ? ' parsley-error' : '' }}" value="{{ old('eref_name') }}" type="text" id="eref_name" name="eref_name" placeholder="Ref. Name" data-parsley-required="true" />
                                
                                @if ($errors->has('eref_name'))
                                    <ul class="parsley-errors-list filled" id="parsley-id-5">
                                        <li class="parsley-required">{{ $errors->first('eref_name') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
    
                        <div class="form-group row m-b-15">
                            <label class="col-md-4 col-sm-4 col-form-label" for="ecompany_name">Company Name :</label>
                            <div class="col-md-8 col-sm-8">
                                <input class="form-control {{ $errors->has('ecompany_name') ? ' parsley-error' : '' }}" value="{{ old('ecompany_name') }}" type="text" id="ecompany_name" name="ecompany_name" placeholder="Company Name" />
                            </div>
                        </div>
    
                        <div class="form-group row m-b-15">
                            <label class="col-md-4 col-sm-4 col-form-label" for="eaddress">Address :</label>
                        
                            <div class="col-md-8 col-sm-8">
                                <textarea class="form-control {{ $errors->has('eaddress') ? ' parsley-error' : '' }}" id="eaddress" name="eaddress" rows="2" placeholder="Address">{{ old('eaddress') }}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row m-b-15">
                            <label class="col-md-4 col-sm-4 col-form-label" for="ephone1">Telephone No :</label>
                            <div class="col-md-8 col-sm-8">
                                <input class="form-control {{ $errors->has('ephone1') ? ' parsley-error' : '' }}" value="{{ old('ephone1') }}" type="text" id="ephone1" name="ephone1" placeholder="Mobile - (999) 999-9999" />
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-4 col-sm-4 col-form-label" for="ephone2"></label>
    
                            <div class="col-md-8 col-sm-8">
                                <input class="form-control {{ $errors->has('ephone2') ? ' parsley-error' : '' }}" value="{{ old('ephone2') }}" type="text" id="ephone2" name="ephone2" placeholder="Land - (999) 999-9999" />
                            </div>
                        </div>
    
                        <div class="form-group row m-b-15">
                            <label class="col-md-4 col-sm-4 col-form-label" for="eemail">Email :</label>
                            <div class="col-md-8 col-sm-8">
                                <input class="form-control {{ $errors->has('eemail') ? ' parsley-error' : '' }}" value="{{ old('eemail') }}" type="eemail" id="eemail" name="eemail" placeholder="example@example.com" />
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
                                <button type="submit" id="edit" class="btn btn-primary">Edit</button>                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>