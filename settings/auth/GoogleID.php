<?php

namespace settings\auth;

use Google\Service\Oauth2;
use Google_Client;
use Google_Service_Oauth2;

class GoogleID
{
    // Google bilan bog'lanish uchun kalit
    private $clientId           = '583882030486-ogrp406vs90j9485tbf3qf22a3cgkl1t.apps.googleusercontent.com';
    private $clientSecret       = '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';
    private $applicationName    = 'staff_ssuv_uz';

    // Domain orqali kirish
    private $staffDevelopmentDomain     = 'http://127.0.0.1/';
    private $staffProductionDomain      = 'https://staff.ssuv.uz/';
    private $redirectUri                = 'auth/google/redirect';
    private $scope = 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email';

    // Host
    CONST HOST_LOCAL  = '127.0.0.1';
    CONST HOST_GLOBAL = 'staff.ssuv.uz';


    /**
     * @return Google_Client
     */
    public function provider(): Google_Client
    {
        if(self::HOST_LOCAL == $_SERVER['HTTP_HOST']) {
            $redirectUri = $this->staffDevelopmentDomain . $this->redirectUri;
        } elseif(self::HOST_GLOBAL == $_SERVER['HTTP_HOST']) {
            $redirectUri = $this->staffProductionDomain . $this->redirectUri;
        }

        $provider = new Google_Client();
        $provider->setClientId($this->clientId);
        $provider->setClientSecret($this->clientSecret);
        $provider->setApplicationName($this->applicationName);
        $provider->setRedirectUri($redirectUri);
        $provider->addScope($this->scope);

        return $provider;
    }

    public function fetchAuthGoogle($code)
    {

        $provider = $this->provider();

        if (isset($code)) {
            $token = $provider->fetchAccessTokenWithAuthCode($code);
        } else {
            header('Location: ' .  $provider->getRedirectUri());
            exit();
        }
        if (empty($token["error"])) {
            $oAuth = new Google_Service_Oauth2($provider);
            return $oAuth->userinfo_v2_me->get();
        } else {
            header('Location: ' .  $provider->getRedirectUri());
            exit();
        }
    }
}