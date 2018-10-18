<?php

namespace App\Http\Controllers;

use App\Mail\SignupMail;
use App\Models\Celebrity;
use App\Models\Common;
use App\Models\EthLibrary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use User;
use App\Models\BaseEthProvider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new BaseEthProvider();
        $data = $model->all()->first()->toArray();
        $provider = $data['provider'];
        if ( $provider == 'test' ) {
            $contractAddress = $data['test_contract_address'];
        }
        else {
            $contractAddress = $data['main_contract_address'];
        }
        $site_data = Common::getSiteData();

        $topCelebrities = Common::getAthletesDataPerOrder('price', 'desc', 0, 4);
        $newCelebrities = Common::getNewAthletesDataPerOrder('price', 'desc', 0, 4);
//        dd($topCelebrities);
        return view('frontend.home')->with(['site_data'=>$site_data, 'contractAddress'=>$contractAddress, 
				'provider'=>$provider, 'top_athletes'=>$topCelebrities, 'new_athletes'=>$newCelebrities]);
    }
}
