<?php

namespace settings\entities\user;

use settings\entities\enums\EnumRegions;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%user_personal_data}}".
 *
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $full_name
 * @property string $short_name
 * @property string $birthday
 * @property int $gender
 * @property string|null $country
 * @property int|null $region_id
 * @property int|null $district_id
 * @property string|null $address
 * @property string|null $avatar
 * @property string|null $hash
 * @property int $created_by
 * @property int|null $updated_by
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property User $createdBy
 * @property EnumRegions $district
 * @property EnumRegions $region
 * @property User $updatedBy
 * @property User $user
 */
class UserPersonalData extends ActiveRecord
{
    public static function createAuthHemis
    (
        $user_id,
        $first_name,
        $last_name,
        $middle_name,
        $full_name,
        $short_name,
        $birthday,
        $gender,
        $avatar,
        $country,
        $region,
        $district,
        $address,
        $hash,
        $created_by

    ): UserPersonalData
    {
        $item = new static();
        $item->user_id = $user_id;
        $item->first_name = $first_name;
        $item->last_name = $last_name;
        $item->middle_name = $middle_name;
        $item->full_name = $full_name;
        $item->short_name = $short_name;
        $item->birthday = $birthday;
        $item->gender = $gender;
        $item->avatar = $avatar;
        $item->region_id = $region;
        $item->country = $country;
        $item->district_id = $district;
        $item->address = $address;
        $item->hash = $hash;
        $item->created_by = $created_by;
        return $item;
    }

    public function editAuthHemis(
        $first_name,
        $last_name,
        $middle_name,
        $full_name,
        $short_name,
        $birthday,
        $gender,
        $avatar,
        $country,
        $region,
        $district,
        $address,
        $hash,
        $updated_by
    )
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->middle_name = $middle_name;
        $this->full_name = $full_name;
        $this->short_name = $short_name;
        $this->birthday = $birthday;
        $this->gender = $gender;
        $this->avatar = $avatar;
        $this->country = $country;
        $this->region_id = $region;
        $this->district_id = $district;
        $this->address = $address;
        $this->hash = $hash;
        $this->updated_by = $updated_by;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%user_personal_data}}';
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
    public function rules(): array
    {
        return [
            [['first_name', 'last_name', 'middle_name', 'full_name', 'short_name', 'birthday', 'gender', 'created_by'], 'required'],
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['gender', 'region_id', 'district_id', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['gender', 'region_id', 'district_id', 'created_by', 'updated_by'], 'integer'],
            [['address'], 'string'],
            [['first_name', 'last_name', 'middle_name', 'full_name', 'short_name', 'country', 'avatar', 'hash'], 'string', 'max' => 255],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRegions::class, 'targetAttribute' => ['region_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRegions::class, 'targetAttribute' => ['district_id' => 'id']],
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
            'user_id'           => Yii::t('app', 'Foydalanuvchi ID raqami'),
            'first_name'        => Yii::t('app', 'Ism'),
            'last_name'         => Yii::t('app', 'Familiya'),
            'middle_name'       => Yii::t('app', 'Otasining ismi'),
            'full_name'         => Yii::t('app', 'F.I.O'),
            'short_name'        => Yii::t('app', 'Qisqacha ismi'),
            'birthday'          => Yii::t('app', "Tug'ilgan kun"),
            'gender'            => Yii::t('app', 'Jinsi'),
            'country'           => Yii::t('app', 'Davlat'),
            'region_id'         => Yii::t('app', 'Viloyat'),
            'district_id'       => Yii::t('app', 'Tuman yoki Shahar'),
            'address'           => Yii::t('app', 'Manzil'),
            'avatar'            => Yii::t('app', 'Avatar rasm'),
            'hash'              => Yii::t('app', 'Hash file'),
            'created_by'        => Yii::t('app', 'Yaratgan foydalanuvchi'),
            'updated_by'        => Yii::t('app', 'Tahrirlagan foydalanuvchi'),
            'created_at'        => Yii::t('app', 'Yaratilgan vaqti'),
            'updated_at'        => Yii::t('app', 'Yangilangan vaqti'),
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
     * Gets query for [[District]].
     *
     * @return ActiveQuery
     */
    public function getDistrict(): ActiveQuery
    {
        return $this->hasOne(EnumRegions::class, ['id' => 'district_id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return ActiveQuery
     */
    public function getRegion(): ActiveQuery
    {
        return $this->hasOne(EnumRegions::class, ['id' => 'region_id']);
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