<option value="">Please choose department</option>
@foreach($categories as $cat)
    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
@endforeach