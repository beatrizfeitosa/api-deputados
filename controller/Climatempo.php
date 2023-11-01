<?php

class Climatempo
{

    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }


    public function fifteenDays($cityId)
    {
        $url        = 'http://apiadvisor.climatempo.com.br/api/v1/forecast/locale/' . $cityId . '/days/15?token=' . $this->token;
        $content    = $this->request($url, null, 'get', null, $httpCode);

        if ($httpCode != 200) {
            throw new \Exception($this->readErrorMessage($content), 1);
        }

        return json_decode($content);
    }

    public function findCity($name, $state = '')
    {
        $url =
            'http://apiadvisor.climatempo.com.br/api/v1/locale/city?name=' . $name .
            ($state ? '&state=' . $state : '') .
            '&token=' . $this->token;

        $content = $this->request($url, null, 'get', null, $httpCode);

        if ($httpCode != 200) {
            throw new \Exception($this->readErrorMessage($content), 1);
        }

        return json_decode($content, true);
    }


    public function addLocalesToToken($locales)
    {
        $url =
            'http://apiadvisor.climatempo.com.br/api-manager/user-token/' . $this->token . '/locales';

        $locales = (array) $locales;

        $content = $this->request($url, array('localeId' => $locales), 'put', array('Content-Type: application/x-www-form-urlencoded'), $httpCode);

        if ($httpCode != 200) {
            throw new \Exception($this->readErrorMessage($content), 1);
        }

        $json = json_decode($content, true);

        return $json['locales'];
    }

    /*-----------------------------*/

    /**
     * @param string $url
     * @param array $data
     * @param string $method
     * @param int $httpCode Will return the request code
     * @return string
     */
    protected function request($url, $data = null, $method = 'get', $headers = array(), &$httpCode = null)
    {
        $method     = strtolower($method);
        $ch         = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        switch ($method) {
            case 'post':
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'put':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
        }

        if ($headers) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $content    = curl_exec($ch);
        $httpCode   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $content;
    }

    protected function readErrorMessage($content)
    {
        $json = json_decode($content, true);
        if (json_last_error() != JSON_ERROR_NONE) {
            return $content;
        }

        return isset($json['detail']) ? $json['detail'] : $content;
    }
}
