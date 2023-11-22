<?php

namespace settings\entities\menu;

use settings\behaviors\AuthorBehavior;
use settings\entities\enums\EnumMenuCategory;
use settings\entities\user\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property int $id ID raqami
 * @property int|null $parent_id O'zidan yuqori turuvchi menu
 * @property int $category_id Menyu Kategoriyasi
 * @property string $title_uz Menyu nomi krilcha
 * @property string $title_oz Menyu nomi lotincha
 * @property string $title_ru Menyu nomi ruscha
 * @property string $title_en Menyu nomi inglizcha
 * @property string $code_name Kod nomi
 * @property int $order Tartibga solish
 * @property int $status Holati
 * @property int $is_deleted O'chirildi
 * @property int $created_by Yaratgan foydalanuvchi
 * @property int|null $updated_by Tahrirlagan foydalanuvchi
 * @property string $created_at Yaratilgan vaqti
 * @property string|null $updated_at Yangilangan vaqti
 *
 * @property EnumMenuCategory $category
 * @property User $createdBy
 * @property Menu[] $menus
 * @property Menu $parent
 * @property User $updatedBy
 */
class Menu extends ActiveRecord
{
    /**
     * @return array
     */
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

    public static function create
    (
        $category_id,
        $parent_id,
        $title_uz,
        $title_oz,
        $title_ru,
        $title_en,
        $code_name,
        $order,
        $status
    ): Menu
    {
        $item = new static();
        $item->category_id  = $category_id;
        $item->parent_id    = $parent_id;
        $item->title_uz     = $title_uz;
        $item->title_oz     = $title_oz;
        $item->title_ru     = $title_ru;
        $item->title_en     = $title_en;
        $item->code_name    = $code_name;
        $item->order        = $order;
        $item->status       = $status;
        return $item;
    }

    public function edit(
        $category_id,
        $parent_id,
        $title_uz,
        $title_oz,
        $title_ru,
        $title_en,
        $code_name,
        $order,
        $status
    )
    {
        $this->category_id  = $category_id;
        $this->parent_id    = $parent_id;
        $this->title_uz     = $title_uz;
        $this->title_oz     = $title_oz;
        $this->title_ru     = $title_ru;
        $this->title_en     = $title_en;
        $this->code_name    = $code_name;
        $this->order        = $order;
        $this->status       = $status;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%menu}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['parent_id', 'category_id', 'order', 'status', 'is_deleted', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['parent_id', 'category_id', 'order', 'status', 'is_deleted', 'created_by', 'updated_by'], 'integer'],
            [['category_id', 'title_uz', 'title_oz', 'title_ru', 'title_en', 'code_name', 'created_by'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_uz', 'title_oz', 'title_ru', 'title_en', 'code_name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumMenuCategory::class, 'targetAttribute' => ['category_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::class, 'targetAttribute' => ['parent_id' => 'id']],
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
            'parent_id'     => Yii::t('app', "O'zidan yuqori turuvchi menu"),
            'category_id'   => Yii::t('app', "Menyu Kategoriyasi"),
            'title_uz'      => Yii::t('app', "Menyu nomi krilcha"),
            'title_oz'      => Yii::t('app', "Menyu nomi lotincha"),
            'title_ru'      => Yii::t('app', "Menyu nomi ruscha"),
            'title_en'      => Yii::t('app', "Menyu nomi inglizcha"),
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
     * Gets query for [[Category]].
     *
     * @return ActiveQuery
     */
    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(EnumMenuCategory::class, ['id' => 'category_id']);
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
     * Gets query for [[Menus]].
     *
     * @return ActiveQuery
     */
    public function getMenus(): ActiveQuery
    {
        return $this->hasMany(Menu::class, ['parent_id' => 'id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return ActiveQuery
     */
    public function getParent(): ActiveQuery
    {
        return $this->hasOne(Menu::class, ['id' => 'parent_id']);
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
