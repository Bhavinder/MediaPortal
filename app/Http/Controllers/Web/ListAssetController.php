<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp;
//use Tymon\JWTAuth\Contracts\JWTSubject;

class ListAssetController extends Controller
{
    //
    public function __construct()
    {
        // Allow access to authenticated users only.
        $this->middleware('auth');

        // Allow access to users with 'users.manage' permission.
        // $this->middleware('permission:users.manage');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }    

    public function index(Request $request)
    {

        if($request->input('search')!==null){

//            echo "bbbb";
//            die;

        }else{
        }

        $data = "";
        $API_IP = env("API_IP", "");

        try {
            $client = new GuzzleHttp\Client();
            $res = $client->get('http://'. $API_IP . ':8888/hwcms/v1.0/entity/image');
            $data = json_decode($res->getBody());
        } catch (ClientErrorResponseException $exception) {
            echo "Problem in API............";
            die;
        }
        

        // echo "<pre>";
        // print_r($data);
        // die;

        //$data = ['Balloon Fight', 'Donkey Kong', 'Excitebike'];
        //return view('games', compact('games'));
        //return view('listasset.listassetview', $data);

        return view('listasset.list-asset', compact('data'));
        
    }


}
