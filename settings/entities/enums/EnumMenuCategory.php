<?php

namespace settings\entities\enums;

use settings\behaviors\AuthorBehavior;
use settings\entities\menu\Menu;
use settings\entities\user\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%enum_menu_category}}".
 *
 * @property int $id ID raqami
 * @property string|null $title_uz Kategoriya nomi krilcha
 * @property string|null $title_oz Kategoriya nomi lotincha
 * @property string|null $title_ru Kategoriya nomi ruscha
 * @property string|null $title_en Kategoriya nomi inglizcha
 * @property string $code_name Kod nomi
 * @property int $status Holati
 * @property int $is_deleted O'chirildi
 * @property int $created_by Yaratgan foydalanuvchi
 * @property int|null $updated_by Tahrirlagan foydalanuvchi
 * @property string $created_at Yaratilgan vaqti
 * @property string|null $updated_at Yangilangan vaqti
 *
 * @property User $createdBy
 * @property Menu[] $menus
 * @property User $updatedBy
 */
class EnumMenuCategory extends ActiveRecord
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


    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%enum_menu_category}}';
    }

    public static function create
    (
        $title_uz,
        $title_oz,
        $title_ru,
        $title_en,
        $code_name,
        $status
    ): EnumMenuCategory
    {
        $item = new static();
        $item->title_uz     = $title_uz;
        $item->title_oz     = $title_oz;
        $item->title_ru     = $title_ru;
        $item->title_en     = $title_en;
        $item->code_name    = $code_name;
        $item->status       = $status;
        return $item;
    }

    public function edit(
        $title_uz,
        $title_oz,
        $title_ru,
        $title_en,
        $code_name,
        $status
    )
    {
        $this->title_uz     = $title_uz;
        $this->title_oz     = $title_oz;
        $this->title_ru     = $title_ru;
        $this->title_en     = $title_en;
        $this->code_name    = $code_name;
        $this->status       = $status;
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['code_name'], 'required'],
            [['updated_by'], 'default', 'value' => null],
            [['status', 'is_deleted', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_uz', 'title_oz', 'title_ru', 'title_en', 'code_name'], 'string', 'max' => 255],
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
            'title_uz'      => Yii::t('app', "Kategoriya nomi krilcha"),
            'title_oz'      => Yii::t('app', "Kategoriya nomi lotincha"),
            'title_ru'      => Yii::t('app', "Kategoriya nomi ruscha"),
            'title_en'      => Yii::t('app', "Kategoriya nomi inglizcha"),
            'code_name'     => Yii::t('app', "Kod nomi"),
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
     * Gets query for [[Menus]].
     *
     * @return ActiveQuery
     */
    public function getMenus(): ActiveQuery
    {
        return $this->hasMany(Menu::class, ['category_id' => 'id']);
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