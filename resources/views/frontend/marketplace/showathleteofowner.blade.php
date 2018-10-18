@extends('frontend.layouts.header')

@section('content')

<link href="{{ asset('css/frontend/marketplace.css') }}" rel="stylesheet">
<link href="{{ asset('css/cryptocoins.css') }}" rel="stylesheet">
<link href="{{ asset('css/frontend/home.css') }}" rel="stylesheet">
<script>
    var obj = <?php echo json_encode($celebrities); ?>;
    console.log(obj);
</script>
<style>
    .a-label{
        font-size: 13px;
    }
</style>
<div class="div-page-wrap" style="padding-top:50px;">
    <h3 class="text-center white-text">
        @if ( $user_info['user_role'] != 1 )
            {{ $user_info['username'] }}:
            @if ( $provider == 'test' )
                <a href="https://ropsten.etherscan.io/address/{{ $account_wallet }}" target="_blank">{{ $account_wallet }}</a>
            @else
                <a href="https://etherscan.io/address/{{ $account_wallet }}" target="_blank">{{ $account_wallet }}</a>
            @endif
        @endif
    </h3>
    @if ( $celebrities )
        <h4 class="text-center white-text">Contracts: {{ count($celebrities) }}</h4>
        <div class="row">
            @foreach( $celebrities as $idx=>$athlete )
                <div class="col-xs-12 col-sm-6">
                    @include('frontend.partial.exathlete', ['athlete' => $athlete, 'provider' => $provider, 'contractAddress'=>$contractAddress, 'canBought'=>false])
                </div>
            @endforeach
        </div>
    @endif
</div>

<script src="{{ asset('./js/frontend/marketplace.js') }}" ></script>
@endsection
