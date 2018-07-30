@php
    $inc=0;
@endphp
@foreach ($tmpgrn as $t)
    <tr>
        <td class="text-center" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ ++$inc }}</td>
        <td style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ $t->product->code }} - {{ $t->product->name_eng }} - {{ $t->product->unit }}</td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ number_format($t->unit_price, 2) }}</td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ number_format($t->sales_price, 2) }}</td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ number_format($t->qty,2) }}</td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ number_format($t->free_qty,2) }}</td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ number_format($t->dis_p,2) }}</td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ number_format($t->dis_amt,2) }}</td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">{{ number_format(($t->unit_price * $t->qty - $t->dis_amt),2) }}</td>
        <td class="text-center" style="border-bottom-width: 1px;border-bottom-style: solid;">
            <button type="button" 
                class="btn btn-danger fa fa-times"
                data-toggle="modal"
                data-target="#remove"
                data-id = "{{ $t->id }}"
                data-amount = "{{ $t->unit_price * $t->qty - $t->dis_amt }}"
            ></button>
        </td>
    </tr>
@endforeach
    <tr>
        <td class="text-center" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;">*</td>
        <td style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;"></td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;"></td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;"></td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;"></td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;"></td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;"></td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;"></td>
        <td class="text-right" style="border-right-width: 1px;border-right-style: solid;border-bottom-width: 1px;border-bottom-style: solid;"></td>
        <td class="text-center" style="border-bottom-width: 1px;border-bottom-style: solid;"></td>
    </tr>