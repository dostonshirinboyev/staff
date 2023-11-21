<?php

namespace settings\entities\category;

use settings\behaviors\AuthorBehavior;
use settings\entities\user\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%university_category}}".
 *
 * @property int $id ID raqami
 * @property int|null $parent_id Ota ID raqami
 * @property string|null $title_ru Kategorya nomi ruscha
 * @property string|null $title_uz Kategorya nomi krilcha
 * @property string|null $title_oz Kategorya nomi lotincha
 * @property string $code_name Kod nomi
 * @property int $order Tartibga solish
 * @property int $status Holati
 * @property int $is_deleted O'chirildi
 * @property int $created_by Yaratgan foydalanuvchi
 * @property int|null $updated_by Tahrirlagan foydalanuvchi
 * @property string $created_at Yaratilgan vaqti
 * @property string|null $updated_at Yangilangan vaqti
 *
 * @property User $createdBy
 * @property UniversityCategory $parent
 * @property UniversityCategory[] $universityCategories
 * @property User $updatedBy
 */
class UniversityCategory extends ActiveRecord
{
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
    public static function tableName(): string
    {
        return '{{%university_category}}';
    }

    public static function create
    (
        $parent_id,
        $title_ru,
        $title_uz,
        $title_oz,
        $code_name,
        $order,
        $status
    ): UniversityCategory
    {
        $item = new static();
        $item->parent_id = $parent_id;
        $item->title_ru  = $title_ru;
        $item->title_uz  = $title_uz;
        $item->title_oz  = $title_oz;
        $item->code_name = $code_name;
        $item->order     = $order;
        $item->status    = $status;
        return $item;
    }

    public function edit(
        $parent_id,
        $title_ru,
        $title_uz,
        $title_oz,
        $code_name,
        $order,
        $status
    )
    {
        $this->parent_id = $parent_id;
        $this->title_ru  = $title_ru;
        $this->title_uz  = $title_uz;
        $this->title_oz  = $title_oz;
        $this->code_name = $code_name;
        $this->order     = $order;
        $this->status    = $status;
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['parent_id', 'order', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['parent_id', 'order', 'status', 'is_deleted', 'created_by', 'updated_by'], 'integer'],
            [['code_name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_ru', 'title_uz', 'title_oz', 'code_name'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => UniversityCategory::class, 'targetAttribute' => ['parent_id' => 'id']],
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
            'id'            => Yii::t('app', "ID raqami"),
            'parent_id'     => Yii::t('app', "Yuqori turuvchi katagoriya"),
            'title_ru'      => Yii::t('app', "Kategorya nomi ruscha"),
            'title_uz'      => Yii::t('app', "Kategorya nomi krilcha"),
            'title_oz'      => Yii::t('app', "Kategorya nomi lotincha"),
            'code_name'     => Yii::t('app', "Kod nomi"),
            'order'         => Yii::t('app', "Tartibga solish"),
            'status'        => Yii::t('app', "Holati"),
            'is_deleted'    => Yii::t('app', "O'chirildi"),
            'created_by'    => Yii::t('app', "Yaratgan foydalanuvchi"),
            'updated_by'    => Yii::t('app', "Tahrirlagan foydalanuvchi"),
            'created_at'    => Yii::t('app', "Yaratilgan vaqti"),
            'updated_at'    => Yii::t('app', "Yangilangan vaqti"),
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
     * Gets query for [[Parent]].
     *
     * @return ActiveQuery
     */
    public function getParent(): ActiveQuery
    {
        return $this->hasOne(UniversityCategory::class, ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[UniversityCategories]].
     *
     * @return ActiveQuery
     */
    public function getUniversityCategories(): ActiveQuery
    {
        return $this->hasMany(UniversityCategory::class, ['parent_id' => 'id']);
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
}
