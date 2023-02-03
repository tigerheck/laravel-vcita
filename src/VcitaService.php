<?php
namespace TigerHeck\Vcita;

use Illuminate\Support\Facades\Http;
 
class VcitaService {
    
    private $base_url;
    private $token;

    public function __construct($base_url, $token)
    {
        $this->base_url = $base_url;
        $this->token = $token;
    }

    function http(){
        return Http::withToken($this->token)->baseUrl($this->base_url);
    }
}