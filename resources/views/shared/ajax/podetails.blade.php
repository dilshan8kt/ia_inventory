@php
    $inc=0;
@endphp
@foreach ($tmppo as $t)
    <tr>
        <td class="text-center" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ ++$inc }}</td>
        <td style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ $t->product->code }}</td>
        <td style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ $t->product->name_eng }} - {{ $t->product->unit }}</td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ number_format($t->quantity,2) }}</td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ number_format($t->unit_price, 2) }}</td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ number_format($t->unit_price * $t->quantity,2) }}</td>
        <td class="text-center" style="border-bottom-width: 1px;border-bottom-style: solid;">
            <button type="button" 
                class="btn btn-danger fa fa-times"
                data-toggle="modal"
                data-target="#remove"
                data-id = "{{ $t->id }}"
                data-qty = "{{ $t->quantity }}"
                data-unitprice = "{{ $t->unit_price }}"
            ></button>
        </td>
    </tr>
@endforeach