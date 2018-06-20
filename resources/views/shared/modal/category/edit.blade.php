<div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Item Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('category') }}" data-parsley-validate="true">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id" id="id">

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Department * :</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" id="select-required" name="department_id" data-parsley-required="true">
                                <option value="">Please choose department</option>
                                @foreach($departments as $dep)
                                    <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="name">Category Name * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control {{ $errors->has('name') ? ' parsley-error' : '' }}" value="{{ old('name') }}" type="text" id="name" name="name" placeholder="Category Name" data-parsley-required="true" />
                            
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
                            <select class="form-control" id="status" name="status" data-parsley-required="true">
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