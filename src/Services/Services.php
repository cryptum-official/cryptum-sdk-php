<?php

namespace Cryptum\Services;

use CurlHandle;
use Exception;

class Services
{
  private $config;

  /**
   * Need config to instance correctly
   * 
   * config -- an object with environment and apiKey.
   */
  function __construct($config)
  {
    $this->config = $config;
  }

  /**
   * Method to get url by enviroment setted in $config variable
   */
  private function getUrl(): string
  {
    if ($this->config->environment == "development") return "https://api-dev.cryptum.io";
    if ($this->config->environment == "production") return "https://api.cryptum.io";

    throw new Exception("Environment not found");
  }

  /**
   * Method to set headers in an curl request
   * 
   * @param CurlHandle $curl - an curl handle to add headers
   */
  private function setHeaders($curl): void
  {
    $headers = array();
    $headers[] = 'Accept: application/json';
    $headers[] = 'x-api-key: ' . $this->config->apiKey;
    $headers[] = 'Content-Type: application/json';
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  }

  /**
   * Method to make an get in respective url.
   */
  public function get(string $finalUrl)
  {

    $url = $this->getUrl();
    $curl = curl_init($url . $finalUrl);

    $this->setHeaders($curl);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

    $response = json_decode(curl_exec($curl));

    $this->hasError($response, $curl);

    curl_close($curl);
    return $response;
  }

  /**
   * Method to make an get in respective url.
   */
  public function post(string $finalUrl, $payload)
  {
    $url = $this->getUrl();
    $curl = curl_init($url . $finalUrl);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($payload));

    $this->setHeaders($curl);

    $response = json_decode(curl_exec($curl));

    $this->hasError($response, $curl);

    curl_close($curl);
    return $response;
  }


  /**
   * Method to make an get in respective url.
   */
  public function delete(string $finalUrl, $payload)
  {
    $url = $this->getUrl();
    $curl = curl_init($url . $finalUrl);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($payload));

    $this->setHeaders($curl);

    $response = json_decode(curl_exec($curl));

    $this->hasError($response, $curl);

    curl_close($curl);
    return $response;
  }

  private function hasError($response, $curl)
  {
    if (curl_error($curl)) {
      throw new Exception(curl_error($curl));
    }

    if (isset($response->error)) {
      throw new Exception("Message: " . $response->error->message . " -- Type: " . $response->error->type);
    }
  }
}
