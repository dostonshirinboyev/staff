<?php

namespace settings\entities\library;

use settings\entities\user\User;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%library_file}}".
 *
 * @property int $id ID raqami
 * @property int $hemis_id_number HemisID raqami
 * @property int $hemis_id Hemis ID
 * @property int $category_id Kategoriya
 * @property int $user_id Foydalanuvchi ID raqami
 * @property string|null $title_ru Fayl nomi ruscha
 * @property string|null $title_uz Fayl nomi krilcha
 * @property string|null $title_oz Fayl nomi lotincha
 * @property string|null $file Word, Pdf, Doc, ...
 * @property int $status Holati
 * @property int $created_by Yaratgan foydalanuvchi
 * @property int|null $updated_by Tahrirlagan foydalanuvchi
 * @property string $created_at Yaratilgan vaqti
 * @property string|null $updated_at Yangilangan vaqti
 *
 * @property LibraryFile $category
 * @property User $createdBy
 * @property LibraryFile[] $libraryFiles
 * @property User $updatedBy
 * @property User $user
 */
class LibraryFile extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%library_file}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['hemis_id_number', 'hemis_id', 'category_id', 'user_id'], 'required'],
            [['hemis_id_number', 'hemis_id', 'category_id', 'user_id', 'status', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['hemis_id_number', 'hemis_id', 'category_id', 'user_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_ru', 'title_uz', 'title_oz', 'file'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => LibraryFile::class, 'targetAttribute' => ['category_id' => 'id']],
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
            'id'                => Yii::t('app', 'ID raqami'),
            'hemis_id_number'   => Yii::t('app', 'HemisID raqami'),
            'hemis_id'          => Yii::t('app', 'Hemis ID'),
            'category_id'       => Yii::t('app', 'Kategoriya'),
            'user_id'           => Yii::t('app', 'Foydalanuvchi ID raqami'),
            'title_ru'          => Yii::t('app', 'Fayl nomi ruscha'),
            'title_uz'          => Yii::t('app', 'Fayl nomi krilcha'),
            'title_oz'          => Yii::t('app', 'Fayl nomi lotincha'),
            'file'              => Yii::t('app', 'Word, Pdf, Doc, ...'),
            'status'            => Yii::t('app', 'Holati'),
            'created_by'        => Yii::t('app', 'Yaratgan foydalanuvchi'),
            'updated_by'        => Yii::t('app', 'Tahrirlagan foydalanuvchi'),
            'created_at'        => Yii::t('app', 'Yaratilgan vaqti'),
            'updated_at'        => Yii::t('app', 'Yangilangan vaqti'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return ActiveQuery
     */
    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(LibraryFile::class, ['id' => 'category_id']);
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
     * Gets query for [[LibraryFiles]].
     *
     * @return ActiveQuery
     */
    public function getLibraryFiles(): ActiveQuery
    {
        return $this->hasMany(LibraryFile::class, ['category_id' => 'id']);
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