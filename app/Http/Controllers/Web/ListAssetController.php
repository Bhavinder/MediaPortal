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

/*
        try {
            $client = new GuzzleHttp\Client();
            $res = $client->get('http://202.133.73.75:8888/hwcms/v1.0/entity/image');
            $data = json_decode($res->getBody());
        } catch (ClientErrorResponseException $exception) {
            echo "Problem in API............";
            die;
        }
        */
        $data = json_decode('{
            "result": [{
                    "thumbnail-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15322/storage/MDE1MzIyLzAvdGh1bWJuYWls",
                    "keywords": "Forest",
                    "name": "flower_07",
                    "rating": 3,
                    "description": "Updated description",
                    "creation-date": "2018-10-24T09:21:51Z",
                    "modified-date": "2018-11-06T16:00:31Z",
                    "id": 15322,
                    "type": "image",
                    "preview-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15322/storage/MTUzMjIvMC9wcmV2aWV3",
                    "content-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15322/storage/MDE1MzIyLzAvbWFzdGVy"
                }, {
                    "thumbnail-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15324/storage/MDE1MzI0LzAvdGh1bWJuYWls",
                    "keywords": "Forest",
                    "name": "Green Sea Turtle.jpg",
                    "rating": 3,
                    "description": "Sea Turtle Edited",
                    "creation-date": "2018-10-24T09:21:51Z",
                    "modified-date": "2018-11-06T16:08:22Z",
                    "id": 15324,
                    "type": "image",
                    "preview-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15324/storage/MTUzMjQvMC9wcmV2aWV3",
                    "content-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15324/storage/MDE1MzI0LzAvbWFzdGVy"
                }, {
                    "thumbnail-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15374/storage/MDE1Mzc0LzAvdGh1bWJuYWls",
                    "keywords": "Forest",
                    "name": "Forest.jpg",
                    "rating": 3,
                    "description": "Forest Scene",
                    "creation-date": "2018-10-24T09:21:51Z",
                    "modified-date": "2018-11-06T16:03:28Z",
                    "id": 15374,
                    "type": "image",
                    "preview-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15374/storage/MTUzNzQvMC9wcmV2aWV3",
                    "content-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15374/storage/MDE1Mzc0LzAvbWFzdGVy"
                }, {
                    "thumbnail-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15383/storage/MDE1MzgzLzAvdGh1bWJuYWls",
                    "keywords": "Flower",
                    "name": "flower_08",
                    "rating": 5,
                    "description": "flower_08",
                    "creation-date": "2018-10-24T09:21:51Z",
                    "modified-date": "2018-11-06T16:04:02Z",
                    "id": 15383,
                    "type": "image",
                    "preview-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15383/storage/MTUzODMvMC9wcmV2aWV3",
                    "content-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15383/storage/MDE1MzgzLzAvbWFzdGVy"
                }, {
                    "thumbnail-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15448/storage/MDE1NDQ4LzAvdGh1bWJuYWls",
                    "keywords": "Forest",
                    "name": "flower_09",
                    "description": "flower_09",
                    "creation-date": "2018-10-24T10:32:11Z",
                    "modified-date": "2018-11-05T13:59:31Z",
                    "id": 15448,
                    "type": "image",
                    "preview-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15448/storage/MTU0NDgvMC9wcmV2aWV3",
                    "content-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15448/storage/MDE1NDQ4LzAvbWFzdGVy"
                }, {
                    "thumbnail-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15541/storage/MDE1NTQxLzAvdGh1bWJuYWls",
                    "keywords": "Person",
                    "name": "Henri Dunant",
                    "description": "Image of Henri Dunant",
                    "creation-date": "2018-11-05T12:34:18Z",
                    "modified-date": "2018-11-05T12:34:18Z",
                    "id": 15541,
                    "type": "image",
                    "preview-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15541/storage/MTU1NDEvMC9wcmV2aWV3",
                    "content-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15541/storage/MDE1NTQxLzAvbWFzdGVy"
                }, {
                    "thumbnail-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15542/storage/MDE1NTQyLzAvdGh1bWJuYWls",
                    "keywords": "Forest, Green",
                    "name": "flower_01",
                    "rating": 2,
                    "description": "Flower 01",
                    "creation-date": "2018-11-05T13:56:17Z",
                    "modified-date": "2018-11-08T05:09:33Z",
                    "id": 15542,
                    "type": "image",
                    "preview-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15542/storage/MTU1NDIvMC9wcmV2aWV3",
                    "content-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15542/storage/MDE1NTQyLzAvbWFzdGVy"
                }, {
                    "thumbnail-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15543/storage/MDE1NTQzLzAvdGh1bWJuYWls",
                    "keywords": "Forest, Green",
                    "name": "flower_02",
                    "rating": 3,
                    "description": "Flower 02",
                    "creation-date": "2018-11-05T13:56:17Z",
                    "modified-date": "2018-11-06T06:29:06Z",
                    "id": 15543,
                    "type": "image",
                    "preview-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15543/storage/MTU1NDMvMC9wcmV2aWV3",
                    "content-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15543/storage/MDE1NTQzLzAvbWFzdGVy"
                }, {
                    "thumbnail-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15544/storage/MDE1NTQ0LzAvdGh1bWJuYWls",
                    "keywords": "Forest, Green",
                    "name": "flower_03",
                    "rating": 3,
                    "description": "Flower 03",
                    "creation-date": "2018-11-05T13:56:17Z",
                    "modified-date": "2018-11-06T06:29:06Z",
                    "id": 15544,
                    "type": "image",
                    "preview-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15544/storage/MTU1NDQvMC9wcmV2aWV3",
                    "content-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15544/storage/MDE1NTQ0LzAvbWFzdGVy"
                }, {
                    "thumbnail-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15545/storage/MDE1NTQ1LzAvdGh1bWJuYWls",
                    "keywords": "Forest, Green",
                    "name": "flower_04",
                    "rating": 4,
                    "description": "Flower 04",
                    "creation-date": "2018-11-05T13:56:17Z",
                    "modified-date": "2018-11-06T06:29:06Z",
                    "id": 15545,
                    "type": "image",
                    "preview-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15545/storage/MTU1NDUvMC9wcmV2aWV3",
                    "content-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15545/storage/MDE1NTQ1LzAvbWFzdGVy"
                }, {
                    "thumbnail-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15546/storage/MDE1NTQ2LzAvdGh1bWJuYWls",
                    "keywords": "Forest, Green",
                    "name": "flower_05",
                    "rating": 2,
                    "description": "Flower 05",
                    "creation-date": "2018-11-05T13:56:17Z",
                    "modified-date": "2018-11-06T06:29:06Z",
                    "id": 15546,
                    "type": "image",
                    "preview-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15546/storage/MTU1NDYvMC9wcmV2aWV3",
                    "content-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15546/storage/MDE1NTQ2LzAvbWFzdGVy"
                }, {
                    "thumbnail-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15547/storage/MDE1NTQ3LzAvdGh1bWJuYWls",
                    "keywords": "Person, Computer",
                    "name": "Bill Gates",
                    "description": "Image of Bill Gates",
                    "creation-date": "2018-11-05T14:02:45Z",
                    "modified-date": "2018-11-08T05:09:14Z",
                    "id": 15547,
                    "type": "image",
                    "preview-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15547/storage/MTU1NDcvMC9wcmV2aWV3",
                    "content-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15547/storage/MDE1NTQ3LzAvbWFzdGVy"
                }, {
                    "thumbnail-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15548/storage/MDE1NTQ4LzAvdGh1bWJuYWls",
                    "keywords": "Person, Computer",
                    "name": "Steve Jobs",
                    "description": "Image of Steve Jobs",
                    "creation-date": "2018-11-05T14:05:57Z",
                    "modified-date": "2018-11-06T06:26:49Z",
                    "id": 15548,
                    "type": "image",
                    "preview-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15548/storage/MTU1NDgvMC9wcmV2aWV3",
                    "content-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15548/storage/MDE1NTQ4LzAvbWFzdGVy"
                }, {
                    "thumbnail-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15549/storage/MDE1NTQ5LzAvdGh1bWJuYWls",
                    "keywords": "Person",
                    "name": "Tim Berners-Lee",
                    "description": "Image of Tim Berners-Lee",
                    "creation-date": "2018-11-05T14:09:38Z",
                    "modified-date": "2018-11-05T14:09:38Z",
                    "id": 15549,
                    "type": "image",
                    "preview-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15549/storage/MTU1NDkvMC9wcmV2aWV3",
                    "content-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15549/storage/MDE1NTQ5LzAvbWFzdGVy"
                }, {
                    "thumbnail-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15550/storage/MDE1NTUwLzAvdGh1bWJuYWls",
                    "keywords": "Person, Computer",
                    "name": "James Gosling",
                    "description": "Image of James Gosling",
                    "creation-date": "2018-11-05T14:11:41Z",
                    "modified-date": "2018-11-06T06:26:49Z",
                    "id": 15550,
                    "type": "image",
                    "preview-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15550/storage/MTU1NTAvMC9wcmV2aWV3",
                    "content-link": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/15550/storage/MDE1NTUwLzAvbWFzdGVy"
                }
            ],
            "offset": 0,
            "limit": 100,
            "count": 15,
            "total-count": 15,
            "page": {
                "current": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/?offset=0",
                "last": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/?offset=0",
                "first": "http://202.133.73.75:8888/hwcms/v1.0/entity/image/?offset=0"
            }
        }'
        );

        // echo "<pre>";
        // print_r($data);
        // die;

        //$data = ['Balloon Fight', 'Donkey Kong', 'Excitebike'];
        //return view('games', compact('games'));
        //return view('listasset.listassetview', $data);

        return view('listasset.list-asset', compact('data'));
        
    }


}
