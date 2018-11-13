<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp;

class assetupdateController extends Controller
{
    public function __construct()
    {
        // Allow access to authenticated users only.
        $this->middleware('auth');

        // Allow access to users with 'users.manage' permission.
        //$this->middleware('permission:users.manage');
    }

    public function index(Request $request)
    {

        $FormData = array(
            'name' => $request->input('form-name'),
            'type' => 'image',
            'keywords' => $request->input('form-keywords'),
            'description' => $request->input('form-description'),
            "content-link" => $request->input('form-content-link'),
            'rating' => (is_null($request->input('form-rating'))? 0.0 : (float)$request->input('form-rating'))
        );
        //echo json_encode($FormData);
        //die;

        $client = new \GuzzleHttp\Client();
        $response = $client->request('PUT', 'http://52.66.241.21:8888/hwcms/v1.0/entity/image/' . $request->input('form-id'), ['headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'], 'body' => json_encode($FormData, JSON_FORCE_OBJECT) ]);
        $response = $response->getBody()->getContents();
        // echo '<pre>';
        // print_r($response);
        // die;

        $data = "";
        try {
            $client = new GuzzleHttp\Client();
            $res = $client->get('http://52.66.241.21:8888/hwcms/v1.0/entity/image');
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



        //return redirect()->action('list-asset@index');
        //return redirect()->route('list-asset');
    }    //
}
