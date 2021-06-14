<?php
    namespace  App\Http\Controllers;

    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\Response;
    use Illuminate\Routing\Controller;
    use Illuminate\Http\Request;

    

    class ApiController extends Controller{
        
        public function unsplash($page,$content,$serch){
            $json=Http::get(env('HOST_UNSPLASH'),[
                'page'=>$page,
                'query'=>$content.",".$serch,
                'client_id'=>env('API_KEY_UNSPLASH')
            ]);
           
            if($json->failed()){
                abort(500);
            }
            $newJson = array();
            for ($i = 0; $i < count($json['results']); $i++) {
                $newJson[] = array(
                    'url' => $json['results'][$i]["urls"]["small"], 
                );
            }
    
            return response()->json($newJson);
        }

        public function VIN($vin){
            $json=Http::withHeaders(
                [
                    "x-rapidapi-key" => env('API_KEY_VIN'),
                    "x-rapidapi-host"=>env('HOST_VIN')
                ]
            )->get("https://".env('HOST_VIN')."/decode_vin",[
                "vin"=>$vin
            ]);
            if($json->failed()){
                abort(500);
            }
            return response()->json([
                'make'=>$json['specification']['make'],
                'model'=>$json['specification']['model'],
                'style'=>$json['specification']['style'],
                'year'=>$json['specification']['year'],
                'standard_seating'=>$json['specification']['standard_seating'],
            ]);
        }
    }
?>