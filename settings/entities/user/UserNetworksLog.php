<?php

namespace settings\entities\user;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%user_networks_log}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $deleted_data
 * @property int $created_by
 * @property string $created_at
 *
 * @property User $createdBy
 */
class UserNetworksLog extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%user_networks_log}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['user_id', 'deleted_data', 'created_by'], 'required'],
            [['user_id', 'created_by'], 'default', 'value' => null],
            [['user_id', 'created_by'], 'integer'],
            [['deleted_data', 'created_at'], 'safe'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id'            => Yii::t('app', 'ID raqami'),
            'user_id'       => Yii::t('app', 'Foydalanuvchi ID raqami'),
            'deleted_data'  => Yii::t('app', "O'chirilgan ma'lumotlar"),
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
}