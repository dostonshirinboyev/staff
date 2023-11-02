<?php

namespace settings\entities\user;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%user_networks}}".
 *
 * @property int $user_id
 * @property int $network_id
 * @property string $network_type
 * @property string|null $username
 * @property string $first_name
 * @property string|null $last_name
 * @property string|null $middle_name
 * @property string|null $photo_url
 * @property int $auth_date
 * @property string|null $access_token
 * @property string|null $expires_in
 * @property string|null $scope
 * @property string|null $token_type
 * @property string|null $id_token
 * @property string|null $hash
 * @property int $created_by
 * @property string $created_at
 *
 * @property User $createdBy
 * @property User $user
 */
class UserNetworks extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%user_networks}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['user_id', 'network_id', 'network_type', 'first_name', 'auth_date'], 'required'],
            [['user_id', 'network_id', 'auth_date', 'created_by'], 'default', 'value' => null],
            [['user_id', 'network_id', 'auth_date', 'created_by'], 'integer'],
            [['photo_url', 'access_token', 'expires_in', 'scope', 'token_type', 'id_token', 'hash'], 'string'],
            [['created_at'], 'safe'],
            [['network_type', 'username', 'first_name', 'last_name', 'middle_name'], 'string', 'max' => 255],
            [['user_id', 'network_id', 'network_type'], 'unique', 'targetAttribute' => ['user_id', 'network_id', 'network_type']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'user_id'       => Yii::t('app', 'Foydalanuvchi ID raqami'),
            'network_id'    => Yii::t('app', 'Ijtimoiy tarmoq ID raqmi'),
            'network_type'  => Yii::t('app', 'Ijtimoiy tarmoq turi'),
            'username'      => Yii::t('app', 'Foydalanuvchi nomi'),
            'first_name'    => Yii::t('app', 'Ism'),
            'last_name'     => Yii::t('app', 'Familiya'),
            'middle_name'   => Yii::t('app', 'Otasining ismi'),
            'photo_url'     => Yii::t('app', 'Ijtimoiy tarmoq rasmi'),
            'auth_date'     => Yii::t('app', "Ijtimiy tarmoqdan ro'yxatdan o'tgan sanasi"),
            'access_token'  => Yii::t('app', 'Access Token'),
            'expires_in'    => Yii::t('app', 'Expires In'),
            'scope'         => Yii::t('app', 'Scope'),
            'token_type'    => Yii::t('app', 'Token Type'),
            'id_token'      => Yii::t('app', 'Id Token'),
            'hash'          => Yii::t('app', 'Hash'),
            'created_by'    => Yii::t('app', 'Yaratgan foydalanuvchi'),
            'created_at'    => Yii::t('app', 'Yaratilgan vaqti'),
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return ActiveQuery
     */
    public function getCreatedBy(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery
     */
    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
