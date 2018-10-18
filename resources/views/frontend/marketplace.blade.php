@extends('frontend.layouts.header')

@section('content')

<link href="{{ asset('css/frontend/marketplace.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('./assets/searchfilter/css/suggestion-box.min.css') }}">
<script src="{{ asset('./assets/searchfilter/js/suggestion-box.min.js') }}"></script>
<script>
    var obj = <?php echo json_encode($athletes); ?>;
</script>
<style>
    .right0 {
        padding-right:0;
    }
    .left0 {
        padding-left:0;
    }
    input[type=text] {
        color: white;
        width: 330px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: transparent;
        background-image: url('{{ asset('./images/searchicon.png') }}');
        background-position: 7px 7px;
        background-repeat: no-repeat;
        padding: 5px 20px 5px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
    }
    input[type=text]:focus {
        width: 100%;
        border-color: gold;
    }

</style>
<div class="container">
    <div class="div-page-wrap">
        <div class="row">
            <div class="col-md-12">
                {{--<a class="white-color label-team-name" href="/marketplace/{{ $team_id }}">{{ (isset($team_name)) ? $team_name : "" }}</a>--}}
                <label class="white-color label-team-name">{{ (isset($team_name)) ? $team_name : "" }}</label>
                <form id="searchForm" method="get" action="/search" >
                    <input type="text" name="search" placeholder="Search..">
                </form>
            </div>
        </div>
        @if ( $athletes )
            <div class="row athlete-wrap">
                <!-- <div class="col-xs-12 athlete-wrap" style="padding:0px;display: flex;overflow-x: auto;"> -->
                @foreach( $athletes as $idx=>$athlete )
                    <div class="col-xs-12 col-sm-6">
                    @include('frontend.partial.exathlete', ['athlete' => $athlete, 'provider' => $provider, 'contractAddress'=>$contractAddress, 'canBought'=>true, 'buyBtnTitle'=>'Buy this Card Now'])
                        <!-- <div class="athlete-card" athlete-id="{{ $athlete['_id'] }}">
                            <div class="athlete-top-title" >
                                <label class="white-text label-athlete-playername">{{ $athlete['player_name'] }}</label>
                                <div class="div-athlete-status athlete-status-icon {{ ($athlete['transactions']=='N/A') ? '' : 'hidden' }}"></div>
                            </div>
                            <div class="div-athlete-icon text-center">
                                <img src="{{ $athlete['avatar'] }}" class="athlete-thumb" />
                            </div>
                            <div class="div-athlete-detail">
                                <div class="row">
                                    <div class="col-xs-6 padding0" style="padding-right:5px;">
                                        <label class="">Price:</label>
                                        <label class="float-right" id="lbl_sell_price">{{ $athlete['price'] }}</label>
                                    </div>
                                    <div class="col-xs-6 padding0" >
                                        <label class="float-right">
                                            Txs:
                                            {{ ($athlete['transactions']=='N/A')?'0':$athlete['transactions'] }}
                                        </label>
                                    </div>
                                </div>
                                <div class="row" style="display:none;">
                                    <div class="col-xs-6 padding0" style="padding-right:5px;">
                                        <label class="">Ranking:</label>
                                        <label class="float-right">
                                            {{ (isset($athlete['ranking']) && $athlete['ranking'] != '') ? $athlete['ranking'] : ""  }}
                                        </label>
                                    </div>
                                    <div class="col-xs-6 padding0" style="display:none;">
                                        <label class="">Changed(%):</label>
                                        <label class="float-right">
                                            {{ (isset($athlete['changes']) && $athlete['changes'] != '') ? $athlete['changes'] : "N/A"  }}
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 padding0">
                                        <label class="">Created By:</label>
                                        <a href="/userathlete/{{ $athlete['owner_id'] }}" target="_blank" class="a-label span-wrap" style="width:{{ ($athlete['owner_name']=='N/A')?0:117 }}px">{{ ($athlete['owner_name']=='N/A')?'':$athlete['owner_name'] }}</a>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="div-btn-bottom-athlete-wrap text-center">
                                <a a-href="/showbuycontract/{{ $athlete['_id'] }}" class="btn-bottom-athlete" >Buy this Card Now</a>
                            </div>
                        </div> -->
                        

                    </div>
                @endforeach
                <!-- </div> -->
            </div>
        @else
            <div class="row" style="margin-top:22px;">
                <div class="col-sm-12 text-center">
                    <h1 style="color:white;">No Data</h1>
                </div>
            </div>
        @endif
    </div>
</div>


<script src="{{ asset('./js/frontend/marketplace.js') }}" ></script>
@endsection
