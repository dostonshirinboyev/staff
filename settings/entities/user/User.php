<?php

namespace settings\entities\user;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\base\Exception;
use yii\db\Expression;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $access_token
 * @property string $uuid
 * @property string $type
 * @property int $status
 * @property int $hemis_id_number
 * @property int $hemis_id
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property UserPersonalData $userPersonalData
 * @property UserPersonalData[] $userPersonalDataCreatedBy
 * @property UserPersonalData[] $userPersonalDataUpdatedBy
 * @property UserPersonalNetworks $userPersonalNetwork
 * @property UserPersonalNetworks[] $userPersonalNetworkCreatedBy
 * @property UserPersonalNetworks[] $userPersonalNetworkUpdatedBy
 * @property UserRefreshToken[] $userRefreshTokens
 * @property UserTelegram $userTelegram
 * @property UserTelegram[] $userTelegramCreatedBy
 * @property UserTelegram[] $userTelegramUpdatedBy
 */
class User extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    public static function createAuthHemis
    (
        string $username,
        string $hemis_id_number,
        string $password,
        string $type,
        string $hemis_id,
        string $uuid,
        string $access_token
    )
    {
        $item = new static();
        $item->username = $username;
        $item->hemis_id_number = $hemis_id_number;
        $item->setPassword($password);
        $item->type = $type;
        $item->hemis_id = $hemis_id;
        $item->uuid = $uuid;
        $item->status = self::STATUS_ACTIVE;
        $item->auth_key = Yii::$app->security->generateRandomString();
        $item->access_token = $access_token;
        return $item;
    }

    public function editAuthHemis(
        string $username,
        string $hemis_id_number,
        string $password,
        string $type,
        string $uuid,
        string $access_token
    ): void
    {
        $this->username = $username;
        $this->hemis_id_number = $hemis_id_number;
        $this->setPassword($password);
        $this->type = $type;
        $this->uuid = $uuid;
        $this->status = self::STATUS_ACTIVE;
        $this->auth_key = Yii::$app->security->generateRandomString();
        $this->access_token = $access_token;
    }

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%user}}';
    }

    public function behaviors(): array
    {
        $behaviors = parent::behaviors();

        $behaviors['timestamp'] = [
            'class' => TimestampBehavior::class,
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
            ],
            'value' => new Expression('NOW()'),
        ];

        return $behaviors;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['username', 'auth_key', 'password_hash', 'access_token', 'uuid', 'type', 'hemis_id_number', 'hemis_id'], 'required'],
            [['access_token'], 'string'],
            [['status', 'hemis_id_number', 'hemis_id'], 'default', 'value' => null],
            [['status', 'hemis_id_number', 'hemis_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key', 'uuid'], 'string', 'max' => 50],
            [['type'], 'string', 'max' => 10],
            [['hemis_id'], 'unique'],
            [['hemis_id_number'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['username'], 'unique'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'id' =>                     Yii::t('app', 'ID raqami'),
            'username' =>               Yii::t('app', 'Foydalanuvchi nomi'),
            'auth_key' =>               Yii::t('app', 'Auth Key'),
            'password_hash' =>          Yii::t('app', 'Password Hash'),
            'password_reset_token' =>   Yii::t('app', 'Password Reset Token'),
            'access_token' =>           Yii::t('app', 'Access Token'),
            'uuid' =>                   Yii::t('app', 'Uuid'),
            'type' =>                   Yii::t('app', 'Turi'),
            'status' =>                 Yii::t('app', 'Holati'),
            'hemis_id_number' =>        Yii::t('app', 'Hemisdagi ID raqami'),
            'hemis_id' =>               Yii::t('app', 'Hemis ID'),
            'created_at' =>             Yii::t('app', 'Yaratilgan vaqti'),
            'updated_at' =>             Yii::t('app', 'Yangilangan vaqti'),
        ];
    }
    /**
     * Gets query for [[UserProfile]].
     *
     * @return ActiveQuery
     */
    public function getUserPersonalData(): ActiveQuery
    {
        return $this->hasOne(UserPersonalData::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserProfiles]].
     *
     * @return ActiveQuery
     */
    public function getUserPersonalDataCreatedBy(): ActiveQuery
    {
        return $this->hasMany(UserPersonalData::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[UserProfiles0]].
     *
     * @return ActiveQuery
     */
    public function getUserPersonalDataUpdatedBy(): ActiveQuery
    {
        return $this->hasMany(UserPersonalData::class, ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[UserPersonalNetworks]].
     *
     * @return ActiveQuery
     */
    public function getUserPersonalNetwork(): ActiveQuery
    {
        return $this->hasOne(UserPersonalNetworks::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserPersonalNetworksCreatedBy]].
     *
     * @return ActiveQuery
     */
    public function getUserPersonalNetworkCreatedBy(): ActiveQuery
    {
        return $this->hasMany(UserPersonalNetworks::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[UserPersonalNetworksUpdatedBy]].
     *
     * @return ActiveQuery
     */
    public function getUserPersonalNetworkUpdatedBy(): ActiveQuery
    {
        return $this->hasMany(UserPersonalNetworks::class, ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[UserRefreshTokens]].
     *
     * @return ActiveQuery
     */
    public function getUserRefreshTokens(): ActiveQuery
    {
        return $this->hasMany(UserRefreshToken::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserTelegram]].
     *
     * @return ActiveQuery
     */
    public function getUserTelegram()
    {
        return $this->hasOne(UserTelegram::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserTelegramCreatedBy]].
     *
     * @return ActiveQuery
     */
    public function getUserTelegramCreatedBy(): ActiveQuery
    {
        return $this->hasMany(UserTelegram::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[UserTelegramUpdatedBy]].
     *
     * @return ActiveQuery
     */
    public function getUserTelegramUpdatedBy(): ActiveQuery
    {
        return $this->hasMany(UserTelegram::class, ['updated_by' => 'id']);
    }

    /**
     * @param $password
     * @throws Exception
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * @throws Exception
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
}