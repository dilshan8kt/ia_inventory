@foreach ($tmppo as $t)
    <tr>
        <td>{{ $t->product_id }}</td>
        <td>{{ $t->product_id }}</td>
        <td>{{ $t->quantity }}</td>
        <td>{{ $t->unit_price }}</td>
        <td>{{ $t->unit_price * $t->quantity }}</td>
        <td>
            <button type="button" class="btn btn-danger fa fa-times"></button>
        </td>
    </tr>
@endforeach