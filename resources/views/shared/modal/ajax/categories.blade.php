<option value="">Please choose category</option>
@foreach($categories as $cat)
    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
@endforeach