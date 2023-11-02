<?php

namespace settings\auth;

use Yii;
use yii\helpers\Html;

class TelegramAuth
{
    // Test bot
    private $development_bot_token      = '6986758482:AAHNriHqB4NuzgzHK8F3p_jDc7spYoTbcYI';
    private $development_bot_username   = 'test_staff_ssuv_bot';

    // Production bot
    private $production_bot_token       = '6414932243:AAFKz9WwdG2ukHSr9alpkl_d2deujBBl2i8';
    private $production_bot_username    = 'staff_ssuv_bot';

    private $clientTelegramDoamin       = 'https://telegram.org/js/telegram-widget.js';

    // Host
    CONST HOST_LOCAL  = '127.0.0.1';
    CONST HOST_GLOBAL = 'staff.ssuv.uz';

    // Data size
    CONST DATA_SIZE_LARGE  = 'large';
    CONST DATA_SIZE_MEDIUM = 'medium';
    CONST DATA_SIZE_SMALL  = 'small';

    public function botAuth()
    {
        if (self::HOST_LOCAL == $_SERVER['HTTP_HOST']) {
            return [
                'username'  => $this->development_bot_username,
                'token'     => $this->development_bot_token
            ];
        } elseif (self::HOST_GLOBAL == $_SERVER['HTTP_HOST']) {
            return [
                'username'  => $this->production_bot_username,
                'token'     => $this->production_bot_token
            ];
        }
    }

    /**
     * @param $auth_url
     * @param string $data_size
     * @return string
     */
    public function buttonHtmTelegramAuth($auth_url, $data_size=self::DATA_SIZE_LARGE): string
    {
        return Html::tag('script','', [
            'async src'           => $this->clientTelegramDoamin,
            'data-telegram-login' => $this->botAuth()['username'],
            'data-size'           => $data_size,
            'data-auth-url'       => $auth_url,
        ]);
    }

    /**
     * @param $auth_data
     * @return mixed
     */
    public function checkTelegramAuth($auth_data)
    {
        if ($auth_data == null) {
            return null;
        }
        $check_hash = $auth_data['hash'];
        unset($auth_data['hash']);
        unset($auth_data['r']);
        unset($auth_data['SettingsWebapp_page']);
        $data_check_arr = [];
        foreach ($auth_data as $key => $value) {
            $data_check_arr[] = $key . '=' . $value;
        }
        sort($data_check_arr);
        $data_check_string = implode("\n", $data_check_arr);
        $secret_key = hash('sha256', $this->botAuth()['token'], true);
        $hash = hash_hmac('sha256', $data_check_string, $secret_key);

        if (strcmp($hash, $check_hash) !== 0) {
            return Yii::t('app', "Ma'lumotlar telgramdan kelmayapti!");
        }
        if ((time() - $auth_data['auth_date']) > 86400) {
            return Yii::t('app', "Ma'lumotlar eskirgan!");
        }
        return $auth_data;
    }
}