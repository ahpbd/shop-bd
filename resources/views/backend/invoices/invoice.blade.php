<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ translate('INVOICE') }}</title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
  
    <style media="all">
        * {
            margin: 0;
            padding: 0;
            line-height: 1.3;
            color: #333542;
          -webkit-print-color-adjust: exact !important;
          color-adjust: exact !important; 
        }
      @page {
    size:A4 portrait;
      }

        /* IE 6 */
        * html .footer {
            position: absolute;
            top: expression((0-(footer.offsetHeight)+(document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight)+(ignoreMe = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop))+'px');
        }

        body {
            font-size: .875rem;
        }

        .gry-color *,
        .gry-color {
            color: #333542;
        }

        table {
            width: 100%;
        }

        table th {
            font-weight: normal;
        }

        table.padding th {
            padding: .5rem .7rem;
        }

        table.padding td {
            padding: .7rem;
        }

        table.sm-padding td {
            padding: .2rem .7rem;
        }

        .border-bottom td,
        .border-bottom th {
            border-bottom: 0px solid #862633;
        }

        .col-12 {
            width: 100%;
        }

        [class*='col-'] {
            float: left;
            /*border: 1px solid #F3F3F3;*/
        }

        .row:after {
            content: ' ';
            clear: both;
            display: block;
        }

        .wrapper {
            width: 100%;
            height: auto;
            margin: 0 auto;
        }

        .header-height {
            height: 15px;
            border: 1px #862633;
            background: #862633;
        }

        .content-height {
            display: flex;
        }

        .customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        table.customers {
            background-color: #FFFFFF;
        }

        table.customers > tr {
            background-color: #FFFFFF;
        }

        table.customers tr > td {
            border-top: 1px solid #FFF;
            border-bottom: 1px solid #FFF;
        }

        .header {
            border: 1px solid #ecebeb;
        }

        .customers th {
            /*border: 1px solid #A1CEFF;*/
            padding: 8px;
        }

        .customers td {
            /*border: 1px solid #F3F3F3;*/
            padding: 14px;
        }

        .customers th {
            color: white;
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
        }

        .bg-primary {
            /*font-weight: bold !important;*/
            font-size: 0.95rem !important;
            text-align: left;
            color: white;
            {{--background-color:  #862633;--}}
            
              background-color: #862633;
        }

        .bg-secondary {
            /*font-weight: bold !important;*/
            font-size: 0.95rem !important;
            text-align: left;
            color: #333542 !important;
            background-color: #E6E6E6;
        }

        .big-footer-height {
            height: 250px;
            display: block;
        }

        .table-total {
            font-family: Arial, Helvetica, sans-serif;
        }

        .table-total th, td {
            text-align: left;
            padding: 10px;
        }

        .footer-height {
            height: 75px;
        }

        .for-th {
            color: white;
        {{--border: 1px solid  ;--}}


        }

        .for-th-font-bold {
            /*font-weight: bold !important;*/
            font-size: 0.95rem !important;
            text-align: left !important;
            color: #333542 !important;
            background-color: #E6E6E6;
        }

        .for-tb {
            margin: 10px;
        }

        .for-tb td {
            /*margin: 10px;*/
            border-style: hidden;
        }


        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .small {
            font-size: .85rem;
        }

        .currency {

        }

        .strong {
            font-size: 0.95rem;
        }

        .bold {
            font-weight: bold;
        }

        .for-footer {
            position: relative;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: rgb(214, 214, 214);
            height: auto;
            margin: auto;
            text-align: center;
        }

        .flex-start {
            display: flex;
            justify-content: flex-start;
        }

        .flex-end {
            display: flex;
            justify-content: flex-end;
        }

        .flex-between {
            display: flex;
            justify-content: space-between;
        }

        .inline {
            display: inline;
        }

        .content-position {
            padding: 15px 40px;
        }

        .content-position-y {
            padding: 0px 40px;
        }

        .triangle {
            width: 0;
            height: 0;
            border: 22px solid #862633;
            border-top-color: transparent;
            border-bottom-color: transparent;
            border-right-color: transparent;
        }

        .triangle2 {
            width: 0;
            height: 0;
            border: 22px solid white;
            border-top-color: white;
            border-bottom-color: white;
            border-right-color: white;
            border-left-color: transparent;
        }

        .h1 {
            font-size: 2em;
            margin-block-start: 0.67em;
            margin-block-end: 0.67em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
        }

        .h2 {
            font-size: 1.5em;
            margin-block-start: 0.83em;
            margin-block-end: 0.83em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
        }

        .h4 {
            margin-block-start: 1.33em;
            margin-block-end: 1.33em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
        }

        .montserrat-normal-600 {
            font-family: Montserrat;
            font-style: normal;
            font-weight: 600;
            font-size: 18px;
            line-height: 6px;
            /* or 150% */


            color: #363B45;
        }

        .montserrat-bold-700 {
            font-family: Montserrat;
            font-style: normal;
            font-weight: 700;
            font-size: 18px;
            line-height: 6px;
            /* or 150% */


            color: #363B45;
        }

        .text-white {
            color: white !important;
        }

        .bs-0 {
            border-spacing: 0;
        }
    </style>
</head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body onload="window.print()">
		@php
			$logo = get_setting('header_logo');
		@endphp

<div class="first" style="height:auto !important;background-color: #E6E6E6">
    <table class="content-position">
        <tr>
            <th style="text-align: left">
                        @if($logo != null)
							<img src="{{ uploaded_asset($logo) }}" height="30" style="display:inline-block;">
						@else
							<img src="{{ static_asset('assets/img/logo.png') }}" height="30" style="display:inline-block;">
						@endif
               <br/> Registered Address: Shop no-GB-001, Jamuna Future Park<br/>Dhaka - 1229<br/>
              Corporate Address: H#12, R#19, Sector#07, Uttara<br/>Dhaka-1230, Bangladesh
            </th>
            <th style="text-align: right">
                <h1 style="color: #030303; margin-bottom: 0px; font-size: 30px;">{{  translate('INVOICE') }}</h1>
                
            </th>
        </tr>
    </table>

    <table class="bs-0">
        <tr>
            <th class="bg-primary content-position-y" style="padding-right: 0; height: 44px; text-align: left">
                <div>
                    <span class="h3 inline text-white">{{ translate('UNIQUE ORDER ID') }}</span>
                    <span class="inline">
                        <span class="h3 text-white" style="display: inline">{{ $order->code }}</span>
                    </span>
                </div>
            </th>
            <th class="bg-secondary content-position-y" style="text-align: right; height: 44px;">
                BIN : 002080586 - 0101 (Mushak-6.3)<br/>
                <span class="h4 inline"
                      style="color: #030303;padding-right: 15px;">{{  translate('Date') }}: </span>
                <span class="inline h4">
                    <strong style="color: #030303; ">{{date('d-m-Y h:i:s a', $order->date)}}</strong>
                </span>
            </th>
        </tr>
    </table>
</div>
{{--<hr>--}}
{{--<table>--}}
  @php
					$shipping_address = json_decode($order->shipping_address);
				@endphp
<div class="row">
    <section>
        <table class="content-position-y" style="width: 100%">
            <tr>
                <td style="vertical-align: text-top;width: 60px; padding-left: 0;">
                    <span class="h4" style="margin: 0px;">{{ translate('Bill To') }}</span>
                </td>
                <td>
                    <div class="h5 montserrat-normal-500">
                        <p style=" margin-top: 6px; margin-bottom:0px;">{{ $shipping_address->name }}</p>
                        <p style=" margin-top: 6px; margin-bottom:0px;">Mobile no: {{ $shipping_address->phone }}</p>
                        <p style=" margin-top: 6px; margin-bottom:0px;"><b>Delivery Address</b></p>
                        <p style=" margin-top: 6px; margin-bottom:0px;">{{ $shipping_address->address }}, {{ $shipping_address->city }}, {{ $shipping_address->country }}</p>
                    </div>
                </td>
            </tr>
        </table>
    </section>
</div>
{{--</table>--}}

<br>

<div class="row" style="margin: 0px 0; display:block; height:auto !important ;">
    <div class=" content-height content-position-y" style="">
        <table class="customers bs-0">
            <thead>
            <tr class="for-th">
                <th class="for-th bg-primary">{{ translate('no') }}</th>
                <th class="for-th bg-primary">{{ translate('Product Name') }}</th>
                <th class="for-th bg-secondary for-th-font-bold" style="color: black">
                    {{ translate('Rate') }}
                </th>
                <th class="for-th for-th-font-bold" style="color: black">
                    {{ translate('Quantity') }}
                </th>
                <th class="for-th for-th-font-bold" style="color: black">
                    {{ translate('Amount') }}
                </th>
            </tr>
            </thead>
            
            <tbody>
              @foreach ($order->orderDetails as $key => $orderDetail)
  		                @if ($orderDetail->product != null)
                <tr class="for-tb" style=" border: 1px solid #D8D8D8;margin-top: 5px">
                    <td class="for-tb for-th-font-bold">{{$key+1}}</td>
                    <td class="for-tb">
                      <img height="30" src="{{ uploaded_asset($orderDetail->product->thumbnail_img) }}"> <span style="vertical-align: baseline;">{{ $orderDetail->product->name }} @if($orderDetail->variation != null) ({{ $orderDetail->variation }}) @endif</span>
                    </td>
                    <td class="for-tb for-th-font-bold">Tk. {{ $orderDetail->price/$orderDetail->quantity }}</td>
                    <td class="for-tb">{{ $orderDetail->quantity }}</td>
                    <td class="for-tb for-th-font-bold">Tk. {{ $orderDetail->price+$orderDetail->tax }}</td>
                </tr>

            @endif
			@endforeach
            </tbody>

        </table>
    </div>
</div>

<div class="content-position-y" style=" display:block; height:auto !important;margin-top: 40px">
    <table>
        <tr>
            <th style="text-align: left">
            <table style="width: 46%;margin-left:41%; display: inline " class="sm-padding strong bs-0">
            <tbody>
              @if ($order->payment_status == 'paid')
                    
                        <img src="{{ static_asset('assets/img/paid_sticker.svg') }}">
                    
                @elseif($order->payment_type == 'cash_on_delivery')
                    
                        <img src="{{ static_asset('assets/img/cod_sticker.svg') }}">
                    
                @endif
            </tbody>
            </table>
            </th>
            <th style="text-align: right">
                <table style="width: 46%;margin-left:41%; display: inline " class="text-right sm-padding strong bs-0">
                    <tbody>

                    <tr>
                        <th class="gry-color text-left"><b>{{ translate('Sub Total') }}</b></th>
                        <td class="currency">Tk. {{ $order->orderDetails->sum('price') }}</td>

                    </tr>
                    
                    <tr>
                        <th class="gry-color text-left"><b>{{ translate('Shipping Cost') }}</b></th>
                        <td class="currency">Tk. {{ $order->orderDetails->sum('shipping_cost') }}</td>
                    </tr>
                    <tr>
                        <th class="gry-color text-left"><b>{{ translate('Discount') }}</b></th>
                        <td class="currency">
                            - Tk. {{ $order->coupon_discount }}</td>
                    </tr>
                    
                    <tr class="bg-primary">
                        <th class="text-left"><b class="text-white">{{ translate('Total') }}</b></th>
                        <td class="text-white currency">
                            Tk. {{ $order->grand_total }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </th>
        </tr>
    </table>
</div>
<br><br>
* All Prices are including VAT

<br>
<br>
<br><br><br>
<div class="row">
    <section>
        <table style="width: 100%">
            <tr>
                <th class="bg-secondary content-position-y" style="text-align: center; ">
                     **This is a computer generated invoice, no signature required.**<br/>
                  
                </th>
            </tr>
        </table>
    </section>
</div>
<!--<script type="text/javascript">
window.onafterprint = back;

        function back() {
            window.history.back();
        }
</script>-->
    <script type="text/javascript">
        try {
            this.print();
        } catch (e) {
            window.onload = window.print;
        }
        window.onbeforeprint = function() {
            setTimeout(function() {
                window.close();
            }, 1500);
        }
    </script>
</body>
</html>
