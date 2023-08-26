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

    public function http(){
        return Http::withToken($this->token)->baseUrl($this->base_url);
    }

    public function getForms($access_by = null, $withCollection = true) {
        return self::responseCollection( $this->http->get('/platform/v1/forms'), $access_by, $withCollection);
    }

    public function allClients($input = [],$access_by = null, $withCollection = true) {
        return self::responseCollection( $this->http->get('/platform/v1/clients', $input), $access_by, $withCollection);
    }

    public function createClient($input,$access_by = null, $withCollection = true) {
        return self::responseCollection( $this->http->post('/platform/v1/clients', $input), $access_by, $withCollection);
    }

    public function getClient($id, $access_by = null, $withCollection = true){
        return self::responseCollection( $this->http->get('/platform/v1/clients/'.$id), $access_by, $withCollection);
    }

    public function updateClient($id, $input, $access_by = null, $withCollection = true){
        return self::responseCollection( $this->http->put('/platform/v1/clients/'.$id, $input), $access_by, $withCollection);
    }

    public function deleteClient($id, $access_by = null, $withCollection = true){
        return self::responseCollection( $this->http->delete('/platform/v1/clients/'.$id), $access_by, $withCollection);
    }

    public function getClientMatter($id, $access_by = null, $withCollection = true){
        return self::responseCollection( $this->http->get('/business/clients/v1/matters/'.$id), $access_by, $withCollection);
    }

    public function getFields($access_by = null, $withCollection = true){
        return self::responseCollection( $this->http->get('/platform/v1/fields'), $access_by, $withCollection);
    }

    public function getBusinesses($input, $access_by = null, $withCollection = true) {
        return self::responseCollection( $this->http->get("/platform/v1/businesses", $input), $access_by, $withCollection);
    }

    public function allBusinesseStaffs($businesse_id, $input = [],$access_by = null, $withCollection = true) {
        return self::responseCollection( $this->http->get("/platform/v1/businesses/{$businesse_id}/staffs", $input), $access_by, $withCollection);
    }

    public function allServices($input = [],$access_by = null, $withCollection = true) {
        return self::responseCollection( $this->http->get("/platform/v1/services", $input), $access_by, $withCollection);
    }

    private function responseCollection($response, $access_by, $withCollection = true ) {
        if($response->successful()) {
            $data = $response->json($access_by);
            return $withCollection ? collect($data) : $data;
        }
        return $response->json();
    }
}