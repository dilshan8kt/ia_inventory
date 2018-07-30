<style>
    @page {
        /* size: 21cm 29.7cm; */
        margin-top: 0cm;
        margin-bottom: 0cm;
    }

    .wrapper {
        margin: 0 -20px 0;
        padding: 0 15px;
    }

    .text-right{
        text-align: right;
    }

    .text-left{
        text-align: left;
    }

    .text-center{
        text-align: center;
    }

    .m-t-0{
        margin-top: 0px;
    }

    .m-t-1{
        margin-top: 20px;
    }

    .m-t-2{
        margin-top: 35px;
    }

    .m-b-0{
        margin-bottom: 0px;
    }

    .row{
        display: flex;
    }

    .mt-2{
        margin-top: -2cm;
    }

    .header{
        color: brown;
    }

    .page-break {
        page-break-after: always;
    }

    table.table {
        /* font-size: 13px; */
        border-collapse: collapse;
        margin-bottom: 5px;
    }
    td.td{
        padding-right: 5px;
    }

    td{
        padding: 0px 5px;
    }
</style>

@php
    $no=0;
    $page_break = 20;
    $net_total=0;
    $split_address = [];

    foreach ($grn->goods_receive_note_items as $g) {
        $net_total = $net_total + ($g->unit_price*$g->qty) - $g->discount;
    }
    // dd($net_total);
    if($grn->supplier->address != null || $grn->supplier->address != ''){
        $split_address = explode(',', $grn->supplier->address, 4);
    }
@endphp


<div class="wrapper">
    <div class="row mt-2">
        <div>
            <h3 class="m-t-2 m-b-0">{{ $grn->supplier->company_name }}</h3>
            <h5 class="m-t-0 m-b-0">{{ $grn->supplier->ref_name }}</h5>
            @for ($i = 0; $i < sizeof($split_address); $i++)
                @if($i == sizeof($split_address)-1)
                    <h5 class="m-t-0 m-b-0">{{ $split_address[$i] }}</h5>
                @else
                    <h5 class="m-t-0 m-b-0">{{ $split_address[$i] }},</h5>
                @endif
            @endfor
            <h5 class="m-t-0 m-b-0">{{ $grn->supplier->phone1 }}</h5>
            <h5 class="m-t-0 m-b-0">{{ $grn->supplier->email }}</h5>
        </div>
        <div>
            <h1 class="text-right m-t-1 m-b-0 header">Goods Received Note</h1>
            <h3 class="text-right m-t-0 m-b-0">{{ Auth::user()->company->company_name }}</h3>
            <h5 class="text-right m-t-0 m-b-0">{{ Auth::user()->company->address_line1 }},</h5>
            <h5 class="text-right m-t-0 m-b-0">{{ Auth::user()->company->address_line2 }},</h5>
            <h5 class="text-right m-t-0 m-b-0">{{ Auth::user()->company->address_line3 }}.</h5>
            <h5 class="text-right m-t-0 m-b-0">{{ Auth::user()->company->telephone_no }}</h5>
        </div>
    </div>
    <div class="row">
        <h4 class="text-left m-t-0 m-b-0">GRN# : {{ $grn->code }}</h4>
        <h4 class="text-right m-t-0 m-b-0">Date : {{ $grn->date }}</h4>
    </div>
    <table style="width:100%;" border="1" class="table">
        <thead>
            <tr class="b-1">
                <th class="text-center">#</th>
                <th class="text-center">CODE</th>
                <th class="text-center">DESCRIPTION</th>
                <th class="text-center">QTY</th>
                <th class="text-center">F.QTY</th>
                <th class="text-center">U.PRICE</th>
                <th class="text-center">S.PRICE</th>
                <th class="text-center">DIS(%)</th>
                <th class="text-center">DIS(AMT)</th>
                <th class="text-center">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grn->goods_receive_note_items as $g)
                @if (++$no <= $page_break)
                    {{ --$no }}
                    <tr>
                        <td class="text-center">{{ ++$no }}</td>
                        <td class="text-center">{{ $g->getProduct($g->product_id)->code }}</td>
                        <td class="text-left">{{ $g->getProduct($g->product_id)->name_eng }} - {{ $g->getProduct($g->product_id)->unit }}</td>
                        <td class="text-center">{{ number_format($g->qty,2) }}</td>
                        <td class="text-center">{{ number_format($g->free_qty,2) }}</td>
                        <td class="text-right">{{ number_format($g->unit_price,2) }}</td>
                        <td class="text-right">{{ number_format($g->sales_price,2) }}</td>
                        <td class="text-right">{{ number_format(($g->discount * 100 / ($g->unit_price*$g->qty)),2) }}</td>
                        <td class="text-right">{{ number_format($g->discount,2) }}</td>
                        <td class="text-right">{{ number_format((($g->unit_price*$g->qty) - $g->discount),2) }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    @php
        $no = 0;
    @endphp

    @if($grn->goods_receive_note_items->count() > $page_break)
        <div class="page-break"></div>
        <table style="width:100%; margin-top:1cm;" border="1" class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">CODE</th>
                    <th class="text-center">DESCRIPTION</th>
                    <th class="text-center">QTY</th>
                    <th class="text-center">F.QTY</th>
                    <th class="text-center">U.PRICE</th>
                    <th class="text-center">S.PRICE</th>
                    <th class="text-center">DIS(%)</th>
                    <th class="text-center">DIS(AMT)</th>
                    <th class="text-center">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grn->goods_receive_note_items as $g)
                    @if(++$no > $page_break)
                        {{ --$no }}
                        <tr>
                            <td class="text-center">{{ ++$no }}</td>
                            <td class="text-center">{{ $g->getProduct($g->product_id)->code }}</td>
                            <td class="text-left">{{ $g->getProduct($g->product_id)->name_eng }} - {{ $g->getProduct($g->product_id)->unit }}</td>
                            <td class="text-center">{{ number_format($g->qty,2) }}</td>
                            <td class="text-center">{{ number_format($g->free_qty,2) }}</td>
                            <td class="text-right">{{ number_format($g->unit_price,2) }}</td>
                            <td class="text-right">{{ number_format($g->sales_price,2) }}</td>
                            <td class="text-right">{{ number_format(($g->discount * 100 / ($g->unit_price*$g->qty)),2) }}</td>
                            <td class="text-right">{{ number_format($g->discount,2) }}</td>
                            <td class="text-right">{{ number_format((($g->unit_price*$g->qty) - $g->discount),2) }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="row footer">
        <table align="right" border="0" class="table">
            <tbody>
                <tr class="tr">
                    <td width="100px" align="right">Sub Total :</td>
                    <td width="100px" align="right"><b>{{ number_format($net_total,2) }}</b></td>
                </tr>
                <tr class="tr hr">
                    <td width="100px" align="right">Discount :</td>
                    <td width="100px" align="right"><b>-</b></td>
                </tr>
                <tr class="tr hr">
                    <td width="100px" align="right">Tax :</td>
                    <td width="100px" align="right"><b>-</b></td>
                </tr>
                <tr class="tr">
                    <td width="100px" align="right">Net Total :</td>
                    <td width="100px" align="right"><b>{{ number_format($net_total,2) }}</b></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>