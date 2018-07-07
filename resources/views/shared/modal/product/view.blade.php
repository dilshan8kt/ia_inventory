<div class="modal fade" id="view" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="code">Product Code* :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" type="text" id="code" name="code" readonly/>
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="barcode">Barcode* :</label>
                        <div class="col-md-4 col-sm-4">
                            <input class="form-control" type="text" id="barcode_1" name="barcode_1" readonly/>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <input class="form-control" type="text" id="barcode_2" name="barcode_2" readonly/>
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="name_eng">Product Name [English]* :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" type="text" id="name_eng" name="name_eng" readonly/>
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="name_sin">Product Name [Sinhala] :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" type="text" id="name_sin" name="name_sin" readonly />
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Department :</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" id="department_id" name="department_id" disabled>
                                @foreach($departments as $dep)
                                    <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Category :</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" id="category_id" name="category_id" data-parsley-required="true" disabled>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Supplier :</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" id="supplier_id" name="supplier_id" disabled>
                                @foreach($suppliers as $sup)
                                    <option value="{{ $sup->id }}">{{ $sup->ref_name }} - {{ $sup->company_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Unit :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" type="text" id="unit_name" name="unit_name" readonly/>
                        </div>
                    </div>

                    <div id="re-order">
                        <hr>

                        <div class="form-group row m-b-15">
                            <label class="col-md-4 col-sm-4 col-form-label" for="re_order_level">Re-Order Level :</label>
                            <div class="col-md-8 col-sm-8">
                                <input class="form-control" type="text" id="re_order_level" name="re_order_level" readonly />
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-4 col-sm-4 col-form-label" for="re_order_quantity">Re-Order Quantity :</label>
                            <div class="col-md-8 col-sm-8">
                                <input class="form-control" type="text" id="re_order_quantity" name="re_order_quantity" readonly />
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-4 col-sm-4 col-form-label" for="re_order_max">Re-Order Max :</label>
                            <div class="col-md-8 col-sm-8">
                                <input class="form-control" type="text" id="re_order_max" name="re_order_max" readonly />
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Staus :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" type="text" id="status" name="status" readonly/>
                        </div>
                    </div>

                    <div class="modal-footer form-group row m-b-0">
                        <div class="col-md-8 col-sm-8">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>