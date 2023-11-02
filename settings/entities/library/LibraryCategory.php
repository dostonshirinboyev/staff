<?php

namespace settings\entities\library;

use settings\behaviors\AuthorBehavior;
use settings\entities\user\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%library_category}}".
 *
 * @property int $id ID raqami
 * @property string|null $title_ru Kutubxona nomi ruscha
 * @property string|null $title_uz Kutubxona nomi krilcha
 * @property string|null $title_oz Kutubxona nomi lotincha
 * @property string $code_name Kod nomi
 * @property int $status Holati
 * @property int $created_by Yaratgan foydalanuvchi
 * @property int|null $updated_by Tahrirlagan foydalanuvchi
 * @property string $created_at Yaratilgan vaqti
 * @property string|null $updated_at Yangilangan vaqti
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class LibraryCategory extends ActiveRecord
{
    public static function create
    (
        string $title_ru,
        string $title_uz,
        string $title_oz,
        string $code_name,
        int    $status
    ): LibraryCategory
    {
        $item = new static();
        $item->title_ru = $title_ru;
        $item->title_uz = $title_uz;
        $item->title_oz = $title_oz;
        $item->code_name = $code_name;
        $item->status = $status;
        return $item;
    }

    public function edit(
        string $title_ru,
        string $title_uz,
        string $title_oz,
        string $code_name,
        int    $status
    )
    {
        $this->title_ru = $title_ru;
        $this->title_uz = $title_uz;
        $this->title_oz = $title_oz;
        $this->code_name = $code_name;
        $this->status = $status;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%library_category}}';
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
    public function rules(): array
    {
        return [
            [['code_name'], 'required'],
            [['status', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_ru', 'title_uz', 'title_oz', 'code_name'], 'string', 'max' => 255],
            [['code_name'], 'unique'],
            [['title_oz'], 'unique'],
            [['title_ru'], 'unique'],
            [['title_uz'], 'unique'],
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
            'id'            => Yii::t('app', 'ID raqami'),
            'title_ru'      => Yii::t('app', 'Kutubxona nomi ruscha'),
            'title_uz'      => Yii::t('app', 'Kutubxona nomi krilcha'),
            'title_oz'      => Yii::t('app', 'Kutubxona nomi lotincha'),
            'code_name'     => Yii::t('app', 'Kod nomi'),
            'status'        => Yii::t('app', 'Holati'),
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
}
