<?php
namespace TigerHeck\Vcita;

use Illuminate\Support\Facades\Http;
 
class VcitaService {
    
    private $base_url;
    private $token;
    private $http;

    public function __construct($base_url, $token)
    {
        $this->base_url = $base_url;
        $this->token = $token;
        $this->http = $this->http();
    }

    function http(){
        return Http::withToken($this->token)->baseUrl($this->base_url);
    }

    public function getForms($access_by = null) {
        $response = $this->http->get('/platform/v1/forms');

        if($response->successful()) {
            $data = $response->json($access_by);
            return collect($data);
        }
    }

    public function allClients($access_by = null) {
        $response = $this->http->get('/platform/v1/clients');

        if($response->successful()) {
            $data = $response->json($access_by);
            return collect($data);
        }
    }

    public function createClients($data,$access_by = null) {
        $response = $this->http->post('/platform/v1/clients');

        if($response->successful()) {
            $data = $response->json($access_by);
            return collect($data);
        }
    }

    public static function getClient($id, $access_by = null){
        $response = $this->http()->get('/platform/v1/clients/'.$id);

        if($response->successful()) {
            $data = $response->json($access_by);
            return collect($data);
        }
    }

    public static function updateClient($id, $data, $access_by = null){
        $response = $this->http()->put('/platform/v1/clients/'.$id, $data);

        if($response->successful()) {
            $data = $response->json($access_by);
            return collect($data);
        }
    }

    public static function deleteClient($id, $access_by = null){
        $response = $this->http()->delete('/platform/v1/clients/'.$id);

        if($response->successful()) {
            $data = $response->json($access_by);
            return collect($data);
        }
    }
}