@extends('frontend.layouts.header')
<style>
    .form-control, .control-label{
        background: transparent!important;
        color: white!important;
        border-radius: 0!important;
    }
    .nav>li>a.tab-menu {
        font-weight: bold!important;
        padding: 5px 15px!important;
    }
    li.active>a {
        color: #22fb0a!important;
        background-color: rgba(255,255,255,0.3)!important;

    }
    .carousel-control {
        font-size: 50px!important;
    }
    .athlete-list-wrap {
        height: 400px;
        overflow-x: auto;
        overflow-y: hidden;
        margin-bottom: 20px;
    }
    .athlete-list {
        height: 100%;
        width: max-content;
    }
    .athlete {
        display: inline-block;
    }
    .athlete-active {
        border-color: gold !important;
    }
    .buy {
        color: red;
    }
    .sell {
        color: #38D865;
    }
    .thdr {

    }
    body {
        background: url( '{{ asset('./images/background/login-bg.png') }}' );
        font-family: monospace, sans-serif;
        background-size: cover;
    }
</style>
@section('content')
    <link href="{{ asset('css/frontend/marketplace.css') }}" rel="stylesheet">
<div class="container div-page-wrap">
    <h3 class="h-title">Dashboard (Total: {{ count($athletes) }})</h3>
    @if ( $athletes )
        <div class="row">
            @foreach( $athletes as $idx=>$athlete )
                <div class="col-xs-12 col-sm-6">
                @include('frontend.partial.exathlete', ['athlete' => $athlete, 'provider' => $provider, 'contractAddress'=>$contractAddress, 'canBought'=>false])
                </div>
            @endforeach
        </div>
    @else
        <div class="row" style="margin-top:22px;">
            <div class="col-sm-12 text-center">
                <h1 style="color:white;">No Data</h1>
            </div>
        </div>
    @endif
</div>
    <script src="{{ asset('./js/frontend/dashboard.js') }}"></script>
@endsection