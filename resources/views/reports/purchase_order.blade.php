<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Purchase Order</title>
</head>
<style>
    /* body { margin: 0cm 0cm; } */
    @page {
        /* size: 21cm 29.7cm; */
        margin-top: 0cm;
        margin-bottom: 0cm;
    }

    .text-right{
        text-align: right;
    }

    .text-left{
        text-align: left;
    }

    .m-t-0{
        margin-top: 0px;
    }

    .m-t-1{
        margin-top: 20px;
    }

    .m-b-0{
        margin-bottom: 0px;
    }

    .row{
        display: flex;
        margin: 0%;
    }
    
    hr{
        margin-top: 0cm;
        margin-bottom: 0cm;
    }
</style>
<body>
    <div class="container">
        <div class="row m-b-0">
            <div>
                <h3 class="m-t-1 m-b-0">{{ $po->supplier->company_name }}</h3>
                <h5 class="m-t-0 m-b-0">{{ $po->supplier->ref_name }}</h5>

                @if($po->supplier->address != null)
                    <h5 class="m-t-0 m-b-0">{{ $po->supplier->address }}</h5>
                @endif
                <h5 class="m-t-0 m-b-0">{{ $po->supplier->phone1 }}</h5>
                <h5 class="m-t-0 m-b-0">{{ $po->supplier->email}}</h5>
            </div>
            <div>
                <h1 class="text-right m-t-1 m-b-0">Purchase Order</h1>
                <h3 class="text-right m-t-0 m-b-0">{{ Auth::user()->company->company_name }}</h3>
                <h4 class="text-right m-t-0 m-b-0">{{ Auth::user()->company->address_line1 }}</h4>
                <h4 class="text-right m-t-0 m-b-0">{{ Auth::user()->company->address_line2 }}</h4>
                <h4 class="text-right m-t-0 m-b-0">{{ Auth::user()->company->address_line3 }}</h4>
                <h4 class="text-right m-t-0 m-b-0">{{ Auth::user()->company->telephone_no }}</h4>
            </div>
        </div>
        <div class="row m-t-0">
            <div>
                <h4 class="text-left m-t-0 m-b-0">PO# : {{ $po->code }}</h4>
            </div>
            <div>
                <h4 class="text-right m-t-0 m-b-0">Date : {{ $po->created_at }}</h4>
            </div>
        </div>
        <hr>
        <div class="row">
            <table style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Code</th>
                        <th class="text-left">Description</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-right">Unit Price</th>
                        <th class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=0
                    @endphp
                    @foreach ($po->purchase_order_items as $p)
                        <tr>
                            <td class="text-center">{{ ++$no }}</td>
                            <td class="text-center">{{ $p->getProduct($p->product_id)->code }}</td>
                            <td class="text-left">{{ $p->getProduct($p->product_id)->name_eng }} - {{ $p->getProduct($p->product_id)->unit }}</td>
                            <td class="text-center">{{ number_format($p->quantity,2) }}</td>
                            <td class="text-right">{{ number_format($p->unit_price,2) }}</td>
                            <td class="text-right">{{ number_format(($p->unit_price*$p->quantity),2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>