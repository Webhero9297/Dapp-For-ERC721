@if ( !isset($athlete_type) )
<div class="athlete-card-ex" athlete-id="{{ $athlete['_id'] }}">
    <div class="athlete-top-title-ex row">
        <label class="col-xs-3 white-text label-athlete-playername-ex label-athlete-ex-title">{{ $athlete['type_name'] }}</label>
        <label class="col-xs-7 white-text float-right label-athlete-playername-ex label-athlete-ex-title" style="border-left: 1px solid #c5c5c538;">{{ $athlete['team_name'] }}</label>
        <label class="col-xs-2 div-athlete-status float-right athlete-status-icon-ex pull-right {{ ($athlete['transactions']=='N/A') ? '' : 'hidden' }}">NEW</label>
    </div>
    <div class="athlete-ex-content">
        <div class="athlete-pic-rect">
            <img src="{{ $athlete['avatar'] }}" class="athlete-thumb-ex" />
            <label class="white-text label-athlete-playername text-center" style="width:140px;">{{ $athlete['player_name'] }}</label>
        </div>
        <div class="div-athlete-detail-ex">
            <!-- <div class="row">
                <div class="col-xs-12 padding0" style="padding-right:5px;">
                    <label class="">Team:</label>
                    <label class="float-right label-athlete-playername" style="width:170px; font-size:13px;">{{ $athlete['team_name'] }}</label>
                </div>
            </div> -->
            <div class="row">
                <div class="col-xs-5 padding0" style="padding-right:5px;">
                    <label class="athlete-ex-label">Price:</label>
                </div>
                <div class="col-xs-7 padding0 dot-border-bt" style="padding-right:5px;">
                    <label class="" id="lbl_sell_price">{{ $athlete['price'] }}ETH</label>
                </div>
                <!-- <div class="col-xs-6 padding0" >
                    <label class="float-right">
                        Txs:
                        <a href="https://{{ ($provider == 'test') ? 'ropsten.' : '' }}etherscan.io/address/{{ $contractAddress }}" target="_blank" class="a-label span-wrap" style="width:30px;text-align: right;">
                            {{ ($athlete['transactions']=='N/A')?'0':$athlete['transactions'] }}
                        </a>
                    </label>
                </div> -->
            </div>
            <div class="row" style="display: none;">
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
                <div class="col-xs-5 padding0">
                    <label class="athlete-ex-label">Owner:</label>
                </div>
                <div class="col-xs-7 padding0 dot-border-bt">
                    <a href="/userathlete/{{ $athlete['owner_id'] }}" class="a-label span-wrap padding0" style="width:{{ ($athlete['owner_name']=='N/A')?0:117 }}px">{{ ($athlete['owner_name']=='N/A')?'':$athlete['owner_name'] }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 padding0">
                    <label class="athlete-ex-label">Created by:</label>
                </div>
                <div class="col-xs-7 padding0 dot-border-bt">
                @if (isset($athlete['creator_id']))
                    <a href="/userathlete/{{ $athlete['creator_id'] }}" class="a-label span-wrap padding0" style="width:{{ ($athlete['creator_name']=='N/A')?0:117 }}px">{{ ($athlete['creator_name']=='N/A')?'':$athlete['creator_name'] }}</a>                
                @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 padding0">
                    <label class="athlete-ex-label">Created at:</label>
                </div>
                <div class="col-xs-7 padding0 dot-border-bt">
                    <label class="">{{ $athlete['created_date'] }}</a>
                </div>
            </div>
            @if ( $canBought )
                <div id="div_buy" class="a-label text-center" style="width:100%;padding-top:10px;">
                    <a href="/showbuycontract/{{ $athlete['_id'] }}" class="btn-bottom-athlete athlete-ex-buy-btn">
                    {{ (isset($buyBtnTitle)) ? $buyBtnTitle : 'Create Card For  '.$athlete['price'].'ETH' }}</a>
                </div>
            @endif
            
            <div class="div-qrcode" athlete-id="{{ $athlete['_id'] }}">
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->margin(1)->size(44)->generate($athlete['_id'])) !!} ">
            </div>
        </div>
    </div>
    
    <!-- <div class="a-label div-btn-bottom-athlete-wrap-ex" style="width:100%;">
        <label class="bottom-fantasy-title">Cryptofantasy</label>
    </div> -->
</div>
@else
<div class="athlete-card-ex" athlete-id="{{ $athlete['_id'] }}">
    <div class="athlete-top-title-ex row">
        <label class="col-xs-3 white-text label-athlete-playername-ex label-athlete-ex-title">{{ $athlete['type_name'] }}</label>
        <label class="col-xs-7 white-text float-right label-athlete-playername-ex label-athlete-ex-title" style="border-left: 1px solid #c5c5c538;">{{ $athlete['team_name'] }}</label>
        <label class="col-xs-2 div-athlete-status float-right athlete-status-icon-ex pull-right {{ ($athlete['transactions']=='N/A') ? '' : 'hidden' }}">NEW</label>
    </div>
    <div class="athlete-ex-content">
        <div class="athlete-pic-rect">
            <img src="{{ $athlete['avatar'] }}" class="athlete-thumb-ex" />
            <label class="white-text label-athlete-playername text-center" style="width:140px;">{{ $athlete['player_name'] }}</label>
        </div>
        <div class="div-athlete-detail-ex">
            <!-- <div class="row">
                <div class="col-xs-12 padding0" style="padding-right:5px;">
                    <label class="">Team:</label>
                    <label class="float-right label-athlete-playername" style="width:170px; font-size:13px;">{{ $athlete['team_name'] }}</label>
                </div>
            </div> -->
            <div class="row">
                <div class="col-xs-5 padding0" style="padding-right:5px;">
                    <label class="athlete-ex-label">Price:</label>
                </div>
                <div class="col-xs-7 padding0 dot-border-bt" style="padding-right:5px;">
                    <label class="" id="lbl_sell_price">{{ $athlete['price'] }}ETH</label>
                </div>
                <!-- <div class="col-xs-6 padding0" >
                    <label class="float-right">
                        Txs:
                        <a href="https://{{ ($provider == 'test') ? 'ropsten.' : '' }}etherscan.io/address/{{ $contractAddress }}" target="_blank" class="a-label span-wrap" style="width:30px;text-align: right;">
                            {{ ($athlete['transactions']=='N/A')?'0':$athlete['transactions'] }}
                        </a>
                    </label>
                </div> -->
            </div>
            <div class="row" style="display: none;">
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
                <div class="col-xs-5 padding0">
                    <label class="athlete-ex-label">Owner:</label>
                </div>
                <div class="col-xs-7 padding0 dot-border-bt">
                    <a href="/userathlete/{{ $athlete['owner_id'] }}" target="_blank" class="a-label span-wrap padding0" style="width:{{ ($athlete['owner_name']=='N/A')?0:117 }}px">{{ ($athlete['owner_name']=='N/A')?'':$athlete['owner_name'] }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 padding0">
                    <label class="athlete-ex-label">Created by:</label>
                </div>
                <div class="col-xs-7 padding0 dot-border-bt">
                @if (isset($athlete['creator_id']))
                    <a href="/userathlete/{{ $athlete['creator_id'] }}" target="_blank" class="a-label span-wrap padding0" style="width:{{ ($athlete['creator_name']=='N/A')?0:117 }}px">{{ ($athlete['creator_name']=='N/A')?'':$athlete['creator_name'] }}</a>                
                @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 padding0">
                    <label class="athlete-ex-label">Created at:</label>
                </div>
                <div class="col-xs-7 padding0 dot-border-bt">
                    <label class="">{{ $athlete['created_date'] }}</a>
                </div>
            </div>
            @if ( $canBought )
                <div id="div_buy" class="a-label text-center" style="width:100%;padding-top:10px;">
                    <a href="/showbuycontract/{{ $athlete['_id'] }}" class="btn-bottom-athlete athlete-ex-buy-btn">
                    {{ (isset($buyBtnTitle)) ? $buyBtnTitle : 'Create Card For  '.$athlete['price'].'ETH' }}</a>
                </div>
            @endif
            <div class="div-qrcode" athlete-id="{{ $athlete['_id'] }}">
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->margin(1)->size(44)->generate($athlete['_id'])) !!} ">
            </div>
        </div>
    </div>
    
    <!-- <div class="a-label div-btn-bottom-athlete-wrap-ex" style="width:100%;">
        <label class="bottom-fantasy-title">Cryptofantasy</label>
    </div> -->
</div>
@endif
<script>
// $(document).ready(function(){
//     $('.div-qrcode').each(function(index, dom){
//         var qrText = $(dom).attr('athlete-id');
//         var qr_div_id = $(dom).attr('id');
//         var qrcode = new QRCode(document.getElementById(qr_div_id), { width : 44, height : 44 });
//         qrcode.makeCode(qrText);
//     });
// });
</script>