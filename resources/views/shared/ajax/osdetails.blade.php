@php
    $inc=0;
@endphp
@foreach ($tmpos as $t)
    <tr>
        <td class="text-center" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ ++$inc }}</td>
        <td style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ $t->product->code }}</td>
        <td style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ $t->product->name_eng }} - {{ $t->product->unit }}</td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ number_format($t->qty,2) }}</td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ number_format($t->cost_price, 2) }}</td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ number_format($t->ws_price,2) }}</td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ number_format($t->sales_price,2) }}</td>
        <td class="text-center" style="border-bottom-width: 1px;border-bottom-style: solid;">
            <button type="button" 
                class="btn btn-danger fa fa-times"
                data-toggle="modal"
                data-target="#remove"
                data-id = "{{ $t->id }}"
            ></button>
        </td>
    </tr>
@endforeach