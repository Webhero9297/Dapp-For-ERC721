@extends('frontend.layouts.header')

@section('content')
<link href="{{ asset('css/frontend/marketplace.css') }}" rel="stylesheet">
<link href="{{ asset('css/cryptocoins.css') }}" rel="stylesheet">
<link href="{{ asset('css/frontend/home.css') }}" rel="stylesheet">
<link href="{{ asset('css/fileupload.css') }}" rel="stylesheet">
<script>
    var athlete_id = "{{ $athlete['_id'] }}";
    var price = "{{ $athlete['price'] }}";
    var athlete_price = "{{ $athlete['purchase_price'] }}";
    var send_fee = {{ $athlete['send_fee'] }};
    var site_fee = {{ $athlete['site_fee'] }};
</script>
<style>
    .btn-primary {
        color: #fff;
        background-color: #081627;
        border-color: #0b3146;
    }
    .btn-primary:hover {
        background-color: #113448;
    }
    .form-group {
        margin-bottom: 0;
    }
</style>
<div class="container">
    <h3 class="h-title fontsize28" style="margin-top:50px;"> Athlete </h3>
    <div class="row" style="margin-right: -15px;">
        <div class="col-xs-12 col-sm-5">

            @include('frontend.partial.exathlete', ['athlete' => $athlete, 'provider' => $provider, 'contractAddress'=>$contractAddress, 'canBought'=>false])

            <div class="row" style="margin-top: 50px;">
                <div class="col-sm-12 text-center">
                    <form id="form_change_price" action="{{ route('changeathleteprice') }}" method="post" class="form-horizontal form-bordered crypto-form">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <input type="hidden" name="athlete_id" >
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <label class="control-label" style="color: white;">Change sell price</label>
                                    <input type='range' id="slider_price" step="0.00001" min="0" max="1" value="0" style="margin-bottom: 25px;" oninput="showVal(this.value)" onchange="showVal(this.value)"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-5" style="padding-right:0;">
                                    <input id="input_price" type="text" value="0" name="price" class="form-control" style="background: transparent;text-align: right;color: white;font-family: sans-serif;" readonly>
                                </div>
                                <div class="col-xs-7">
                                    <button type="submit" class="btn btn-primary wide-width" >Change Price</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="margin: 10px;">
                                    <span class="label-title italic" >You can change the selling price between min</span>
                                    <span class="label-title italic" id="min_price"></span>
                                    <span class="label-title italic">to max</span>
                                    <span class="label-title italic" id="max_price"></span>
                                    <span class="label-title italic">only.</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="label-title italic" style="margin: 10px;">
                                    *You will receive <label id="span_receive_eth"></label>ETH after sell this athlete.
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="h-title fontsize28"> Athlete Details </div>
                        <div class="panel-body panel-athlete-detail-body">
                            <div class="row">
                                <div class="col-xs-7 col-sm-3 text-right">Current Owner:</div>
                                <div class="col-xs-5 col-sm-3">{{ $athlete['player_name'] }}</div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-sm-3 text-right">Verification status:</div>
                                <div class="col-xs-5 col-sm-3" style="padding-right: 5px;">Not verified yet</div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-sm-3 text-right">Ranking:</div>
                                <div class="col-xs-5 col-sm-3 xs-text">{{ (isset($athlete['ranking']) && $athlete['ranking'] != '') ? $athlete['ranking'] : "N/A"  }}</div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-sm-3 text-right xs-text">Changes:</div>
                                <div class="col-xs-5 col-sm-3 xs-text">{{ (isset($athlete['changes']) && $athlete['changes'] != '') ? $athlete['changes']."%" : "N/A" }}</div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-sm-3 text-right">Current Price:</div>
                                <div class="col-xs-5 col-sm-3">{{ $athlete['price'] }}</div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-sm-3 text-right">Token ID:</div>
                                <div class="col-xs-5 col-sm-3">{{ $athlete['token_id'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel">
                        <div class="h-title fontsize28"> Latest Transactions </div>
                        <div class="panel-body" style="padding:0;">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Owner</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if ($owner_history)
                                        @foreach( $owner_history as $idx=>$history )
                                            <tr>
                                                <td>{{ $idx+1 }}</td>
                                                <td>
                                                    <a href="/userathlete/{{ $history['owner_id'] }}">{{ $history['owner_name'] }}</a>
                                                </td>
                                                <td>{{ $history['price'] }}</td>
                                                <td>{{ $history['date'] }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('./js/frontend/myathletedetail.js') }}"></script>
</div>

@endsection
