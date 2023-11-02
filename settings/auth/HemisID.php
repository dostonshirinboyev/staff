<?php

namespace settings\auth;

use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GenericProvider;
use Yii;

class HemisID
{
    // Hemis bilan bog'lanish uchun kalit
    private $clientId                  = '4';
    private $clientSecret              = '2wYsvY1NMjVMGn13OYicTTwHZrXQjc0dNtMw9v9p';

    // Domain orqali kirish
    private $staffDevelopmentDomain    = 'http://127.0.0.1/';
    private $staffProductionDomain     = 'https://staff.ssuv.uz/';
    private $studentRedirectUri        = 'hemis-student-login';
    private $employeeRedirectUri       = 'hemis-employee-login';

    // Universitetning Sudent va hodimlar manzili
    private $clientStudentDoamin       = 'https://student.otmsamvmi.uz/';
    private $clientEmployeeDoamin      = 'https://hemis.otmsamvmi.uz/';
    private $urlAuthorize              = 'oauth/authorize';
    private $urlAccessToken            = 'oauth/access-token';
    private $urlResourceOwnerDetails   = 'oauth/api/user?fields=id,login,employee_id_number,uuid,type,surname,firstname,patronymic,birth_date,picture,phone,email';

    // Turi
    CONST TYPE_STUDENT  = 'student';
    CONST TYPE_EMPLOYEE = 'employee';

    // Host
    CONST HOST_LOCAL  = '127.0.0.1';
    CONST HOST_GLOBAL = 'staff.ssuv.uz';

    /**
     * @param $type
     * @return GenericProvider
     */
    public function provider($type): GenericProvider
    {
        if(self::TYPE_STUDENT == $type){

            if(self::HOST_LOCAL == $_SERVER['HTTP_HOST']) {
                $redirectUri = $this->staffDevelopmentDomain . $this->studentRedirectUri;
            } elseif(self::HOST_GLOBAL == $_SERVER['HTTP_HOST']) {
                $redirectUri = $this->staffProductionDomain . $this->studentRedirectUri;
            }

            $urlAuthorize = $this->clientStudentDoamin . $this->urlAuthorize;
            $urlAccessToken = $this->clientStudentDoamin . $this->urlAccessToken;
            $urlResourceOwnerDetails = $this->clientStudentDoamin . $this->urlResourceOwnerDetails;

        }elseif (self::TYPE_EMPLOYEE == $type){

            if(self::HOST_LOCAL == $_SERVER['HTTP_HOST']) {
                $redirectUri = $this->staffDevelopmentDomain . $this->employeeRedirectUri;
            } elseif(self::HOST_GLOBAL == $_SERVER['HTTP_HOST']) {
                $redirectUri = $this->staffProductionDomain . $this->employeeRedirectUri;
            }

            $urlAuthorize = $this->clientEmployeeDoamin . $this->urlAuthorize;
            $urlAccessToken = $this->clientEmployeeDoamin . $this->urlAccessToken;
            $urlResourceOwnerDetails = $this->clientEmployeeDoamin . $this->urlResourceOwnerDetails;

        }
        $provider = new GenericProvider([
            'clientId' => $this->clientId,
            'clientSecret' => $this->clientSecret,
            'redirectUri' => $redirectUri,
            'urlAuthorize' => $urlAuthorize,
            'urlAccessToken' => $urlAccessToken,
            'urlResourceOwnerDetails' => $urlResourceOwnerDetails
        ]);
        return $provider;
    }

    /**
     * @param $code
     * @param $state
     * @param $type
     * @return array|string
     */
    public function fetchAuthHemis($code, $state, $type)
    {
        $provider = $this->provider($type);
        $session = Yii::$app->session;
        if (empty($code)) {
            $authorizationUrl = $provider->getAuthorizationUrl();
            $session['oauth2state'] = $provider->getState();
            header('Location: ' . $authorizationUrl);
            exit;
        } else if (empty($state) || (!empty($session['oauth2state']) && $state !== $session['oauth2state'])) {
            if (isset($session['oauth2state'])) {
                unset($session['oauth2state']);
            }
            return Yii::t('app', "Invalid state");
        } else {

            try {
                $accessToken = $provider->getAccessToken('authorization_code', [
                    'code' => $code
                ]);
                $resourceOwner = $provider->getResourceOwner($accessToken);

                return [
                    'access_token'    => $accessToken->getToken(),
                    'refresh_token'   => $accessToken->getRefreshToken(),
                    'expired_in'      => $accessToken->getExpires(),
                    'already_expired' => ($accessToken->hasExpired() ? 'expired' : 'not expired'),
                    'hemis_user_data'       => $resourceOwner->toArray(),
                ];

            } catch (IdentityProviderException $e) {
                return $e->getMessage();
            }
        }
    }
}