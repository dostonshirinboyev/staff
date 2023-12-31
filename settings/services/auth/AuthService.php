<?php

namespace settings\services\auth;

use settings\entities\user\UserRefreshToken;
use Lcobucci\JWT\Token;
use sizeg\jwt\Jwt;
use yii\base\Security;
use yii\web\Request;

class AuthService
{
    private $jwt;
    private $security;
    private $request;
    private $accessTokenExpires;
    private $refreshTokenExpires;

    public function __construct(
        Jwt $jwt,
        Security $security,
        Request $request,
        $tokenSettings
    )
    {
        $this->jwt = $jwt;
        $this->security = $security;
        $this->request = $request;
        $this->accessTokenExpires = $tokenSettings['access_token_expires'];
        $this->refreshTokenExpires = $tokenSettings['refresh_token_expires'];
    }

    public function generateRefreshToken($user_id, $expires = null): UserRefreshToken
    {
        if ($expires === null) {
            $expires = $this->refreshTokenExpires;
        }

        return UserRefreshToken::create(
            $user_id,
            $this->security->generateRandomString(),
            date('Y-m-d H:i:s.u', time() + $expires),
            $this->request->userIP,
            $this->request->userAgent
        );
    }

    public function generateJwtToken($user_id, $expires = null): Token
    {
        if ($expires === null) {
            $expires = $this->accessTokenExpires;
        }

        $time = time();
        $signer = $this->jwt->getSigner('HS256');
        $key = $this->jwt->getKey();
        return $this->jwt->getBuilder()
            ->issuedBy('CabinetPM API') // Configures the issuer (iss claim)
            ->permittedFor('CabinetPM API') // Configures the audience (aud claim)
            ->identifiedBy('cabinet_pm', true) // Configures the id (jti claim), replicating as a header item
            ->issuedAt($time) // Configures the time that the token was issue (iat claim)
            ->expiresAt($time + $expires) // Configures the expiration time of the token (exp claim)
            ->withClaim('uid', $user_id) // Configures a new claim, called "uid"
            ->getToken($signer, $key);
    }
}