<?php

namespace settings\entities\user;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%user_personal_networks}}".
 *
 * @property int $user_id
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $email_confirm_token
 * @property string|null $telegram
 * @property string|null $telegram_confirm_token
 * @property string|null $facebook
 * @property string|null $facebook_confirm_token
 * @property int $created_by
 * @property int|null $updated_by
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property User $user
 */
class UserPersonalNetworks extends ActiveRecord
{
    public static function createAuthHemis
    (
        $user_id,
        $phone,
        $email,
        $created_by

    ): UserPersonalNetworks
    {
        $item = new static();
        $item->user_id = $user_id;
        $item->email = $email;
        $item->phone = $phone;
        $item->created_by = $created_by;
        return $item;
    }

    public function editAuthHemis(
        $phone,
        $email,
        $updated_by
    )
    {
        $this->phone = $phone;
        $this->email = $email;
        $this->updated_by = $updated_by;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_personal_networks}}';
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
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by'], 'required'],
            [['created_by', 'updated_by'], 'default', 'value' => null],
            [['created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['phone', 'email', 'email_confirm_token', 'telegram', 'telegram_confirm_token', 'facebook', 'facebook_confirm_token'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'user_id'                   => Yii::t('app', 'Foydalanuvchi ID raqami'),
            'phone'                     => Yii::t('app', "Telefon"),
            'email'                     => Yii::t('app', 'Pochta'),
            'email_confirm_token'       => Yii::t('app', 'Email Confirm Token'),
            'telegram'                  => Yii::t('app', 'TelegramAuth'),
            'telegram_confirm_token'    => Yii::t('app', 'TelegramAuth Confirm Token'),
            'facebook'                  => Yii::t('app', 'Facebook'),
            'facebook_confirm_token'    => Yii::t('app', 'Facebook Confirm Token'),
            'created_by'                => Yii::t('app', 'Yaratgan foydalanuvchi'),
            'updated_by'                => Yii::t('app', 'Tahrirlagan foydalanuvchi'),
            'created_at'                => Yii::t('app', 'Yaratilgan vaqti'),
            'updated_at'                => Yii::t('app', 'Yangilangan vaqti'),
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
     * Gets query for [[UpdatedBy]].
     *
     * @return ActiveQuery
     */
    public function getUpdatedBy(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
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