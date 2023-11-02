<?php

namespace settings\entities\user;

use settings\behaviors\AuthorBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%user_telegram}}".
 *
 * @property int $user_id
 * @property int $telegram_id
 * @property string|null $username
 * @property string $first_name
 * @property string|null $last_name
 * @property string|null $photo_url
 * @property int $auth_date
 * @property string|null $phone
 * @property string|null $ip
 * @property string $hash
 * @property int $created_by
 * @property int|null $updated_by
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property User $user
 */
class UserTelegram extends ActiveRecord
{
    public static function create
    (
        int     $telegram_id,
        string  $username = null,
        string  $first_name,
        string  $last_name = null,
        string  $photo_url = null,
        int     $auth_date,
                $phone
    ): UserTelegram
    {
        $item = new static();
        $item->user_id      = Yii::$app->user->id;
        $item->telegram_id  = $telegram_id;
        $item->username     = $username;
        $item->first_name   = $first_name;
        $item->last_name    = $last_name;
        $item->photo_url    = $photo_url;
        $item->auth_date    = $auth_date;
        $item->phone        = $phone;
        $item->ip           = Yii::$app->request->userIP;
        $item->hash         = 'hash';
        return $item;
    }

    public function edit(
        string  $username,
        string  $first_name,
        string  $last_name,
        string  $photo_url,
        $phone
    )
    {
        $this->username     = $username;
        $this->first_name   = $first_name;
        $this->last_name    = $last_name;
        $this->photo_url    = $photo_url;
        $this->phone        = $phone;
        $this->ip           = Yii::$app->request->userIP;
        $this->hash         = 'hash';
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
        $behaviors['author'] = [
            'class' => AuthorBehavior::class,
        ];

        return $behaviors;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_telegram}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['telegram_id', 'first_name', 'auth_date', 'hash'], 'required'],
            [['telegram_id', 'auth_date', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['telegram_id', 'auth_date', 'created_by', 'updated_by'], 'integer'],
            [['photo_url', 'hash'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'first_name', 'last_name', 'phone', 'ip'], 'string', 'max' => 255],
            [['telegram_id'], 'unique'],
            [['username'], 'unique'],
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
            'user_id'       => Yii::t('app', 'Foydalanuvchi id raqami'),
            'telegram_id'   => Yii::t('app', 'Telegram IO'),
            'username'      => Yii::t('app', 'Telegram foydalanuvchi nomi'),
            'first_name'    => Yii::t('app', 'Ism'),
            'last_name'     => Yii::t('app', 'Familiya'),
            'photo_url'     => Yii::t('app', 'Telegram rasm url'),
            'auth_date'     => Yii::t('app', "Telegramdan ro'yxatdan o'tgan sana"),
            'phone'         => Yii::t('app', 'Telegram Telefon'),
            'ip'            => Yii::t('app', 'Klinet Ip address'),
            'hash'          => Yii::t('app', 'Telegram Hash'),
            'created_by'    => Yii::t('app', 'Yaratgan foydalanuvchi'),
            'updated_by'    => Yii::t('app', 'Tahrirlagan foydalanuvchi'),
            'created_at'    => Yii::t('app', 'Yaratilgan vaqti'),
            'updated_at'    => Yii::t('app', 'Yangilangan vaqti'),
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
