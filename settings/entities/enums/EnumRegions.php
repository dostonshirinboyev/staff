<?php

namespace settings\entities\enums;

use settings\entities\user\UserPersonalData;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%enum_regions}}".
 *
 * @property int $id
 * @property string|null $title_ru
 * @property string|null $title_uz
 * @property string|null $title_oz
 * @property int|null $parent_id
 * @property int $is_deleted
 * @property int $status
 * @property int|null $order
 *
 * @property EnumRegions[] $enumRegions
 * @property EnumRegions $parent
 * @property UserPersonalData[] $userPersonalDataRegion
 * @property UserPersonalData[] $userPersonalDataDistrict
 */
class EnumRegions extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%enum_regions}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id'], 'required'],
            [['id', 'parent_id', 'is_deleted', 'status', 'order'], 'default', 'value' => null],
            [['id', 'parent_id', 'is_deleted', 'status', 'order'], 'integer'],
            [['title_ru', 'title_uz', 'title_oz'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRegions::class, 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title_ru' => Yii::t('app', 'Title Ru'),
            'title_uz' => Yii::t('app', 'Title Uz'),
            'title_oz' => Yii::t('app', 'Title Oz'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'status' => Yii::t('app', 'Status'),
            'order' => Yii::t('app', 'Order'),
        ];
    }

    /**
     * Gets query for [[EnumRegions]].
     *
     * @return ActiveQuery
     */
    public function getEnumRegions(): ActiveQuery
    {
        return $this->hasMany(EnumRegions::class, ['parent_id' => 'id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return ActiveQuery
     */
    public function getParent(): ActiveQuery
    {
        return $this->hasOne(EnumRegions::class, ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[UserPersonalDataRegion]].
     *
     * @return ActiveQuery
     */
    public function getUserPersonalDataRegion(): ActiveQuery
    {
        return $this->hasMany(UserPersonalData::class, ['region_id' => 'id']);
    }

    /**
     * Gets query for [[UserPersonalDataDistrict]].
     *
     * @return ActiveQuery
     */
    public function getUserPersonalDataDistrict(): ActiveQuery
    {
        return $this->hasMany(UserPersonalData::class, ['district_id' => 'id']);
    }
}