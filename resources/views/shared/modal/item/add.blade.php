<div class="modal fade" id="add" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="" data-parsley-validate="true">
                    @csrf

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="barcode">Barcode* :</label>
                        <div class="col-md-4 col-sm-4">
                            <input class="form-control" value="{{ old('barcode_1') }}" type="text" id="barcode_1" name="barcode_1" placeholder="Barcode 1" data-parsley-required="true" />
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <input class="form-control" value="{{ old('barcode_2') }}" type="text" id="barcode_2" name="barcode_2" placeholder="Barcode 2" />
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="name_eng">Item Name [English]* :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('name_eng') ? ' parsley-error' : '' }}" value="{{ old('name_eng') }}" type="text" id="name_eng" name="name_eng" placeholder="Item name in english" data-parsley-required="true" />
                            
                            @if ($errors->has('name_eng'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('name_eng') }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="name_sin">Item Name [Sinhala] :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" value="{{ old('name_sin') }}" type="text" id="name_sin" name="name_sin" placeholder="Item name in sinhala" />
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Department :</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" id="department_id" name="department_id" data-parsley-required="true">
                                <option value="">Please choose department</option>
                                @foreach($departments as $dep)
                                    <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Category :</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" id="category_id" name="category_id" data-parsley-required="true">
                                
                            </select>
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Supplier :</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" id="supplier_id" name="supplier_id" data-parsley-required="true">
                                <option value="">Please choose Supplier</option>
                                @foreach($suppliers as $sup)
                                    <option value="{{ $sup->id }}">{{ $sup->ref_name }} - {{ $sup->company_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Unit :</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" id="unit_name" name="unit_name" data-parsley-required="true">
                                <option value="">Please choose unit</option>
                                @foreach($units as $uni)
                                    <option value="{{ $uni->unit_name }}">{{ $uni->unit_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="address">Re-Order Options :</label>
                    
                        <div class="col-md-8 col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="re_order" name="re_order" />
                                <label class="form-check-label" for="re_order">Enable Re-Order Option</label>
                            </div>
                        </div>
                    </div>

                    <div id="if-hide">
                        <hr>
                        <div class="form-group row m-b-15">
                            <label class="col-md-4 col-sm-4 col-form-label" for="re_order_level">Re-Order Level :</label>
                            <div class="col-md-8 col-sm-8">
                                <input class="form-control" value="{{ old('re_order_level') }}" type="text" id="re_order_level" name="re_order_level" placeholder="level" />
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-4 col-sm-4 col-form-label" for="re_order_quantity">Re-Order Quantity :</label>
                            <div class="col-md-8 col-sm-8">
                                <input class="form-control" value="{{ old('re_order_quantity') }}" type="text" id="re_order_quantity" name="re_order_quantity" placeholder="quantity" />
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-4 col-sm-4 col-form-label" for="re_order_max">Re-Order Max :</label>
                            <div class="col-md-8 col-sm-8">
                                <input class="form-control" value="{{ old('re_order_max') }}" type="text" id="re_order_max" name="re_order_max" placeholder="max" />
                            </div>
                        </div>
                        <hr>
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
                            <button type="submit" id="addSubLocation" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>