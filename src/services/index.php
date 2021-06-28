<?php

namespace services;

use Exception;

class Services {
	private $config;
  
 function __construct($config) {
    $this->config = $config;
  }

  private function getUrl(): string {
    if($this->config->environment == "development") return "https://api-dev.cryptum.io";
    if($this->config->environment == "production") return "https://prouction.url.com";
    
    throw new Exception("Environment not found");
  }

  private function setHeaders($curl): void {
    $headers = array();
    $headers[] = 'Accept: application/json';
    $headers[] = 'x-api-key: ' . $this->config->apiKey;
    $headers[] = 'Content-Type: application/json';
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  }

  public function get($finalUrl) {
    $url = $this->getUrl();
    $curl = curl_init($url . $finalUrl);

    $this->setHeaders($curl);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

    $response = json_decode(curl_exec($curl));
    return $response;
  }

  public function post($finalUrl, $payload) {
    $url = $this->getUrl();
    $curl = curl_init($url . $finalUrl);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($payload));

    $this->setHeaders($curl);

    $response = json_decode(curl_exec($curl));
    return $response;
  }
}
?> 