<?php

namespace settings\entities\user;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%user_refresh_token}}".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $refresh_token
 * @property string|null $expired_date
 * @property string|null $ip
 * @property string|null $user_agent
 * @property string|null $created_at
 *
 * @property User $user
 */
class UserRefreshToken extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%user_refresh_token}}';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['user_id'], 'default', 'value' => null],
            [['user_id'], 'integer'],
            [['refresh_token', 'ip', 'user_agent'], 'string'],
            [['expired_date', 'created_at'], 'safe'],
            [['refresh_token'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'refresh_token' => Yii::t('app', 'Refresh Token'),
            'expired_date' => Yii::t('app', 'Expired Date'),
            'ip' => Yii::t('app', 'Ip'),
            'user_agent' => Yii::t('app', 'User Agent'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
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