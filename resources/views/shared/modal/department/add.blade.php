<div class="modal fade" id="add" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Item Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('department') }}" data-parsley-validate="true">
                    @csrf
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="name">Department Name * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('name') ? ' parsley-error' : '' }}" value="{{ old('name') }}" type="text" id="name" name="name" placeholder="Item Department Name" data-parsley-required="true" />
                            
                            @if ($errors->has('name'))
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{ $errors->first('name') }}</li>
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