<?php
namespace settings\forms\auth\student;

use settings\entities\user\User;
use Yii;
use yii\base\Model;

class LoginStudentForm extends Model
{
    public $hemis_id;
    public $hemis_password;
    public $rememberMe = true;

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['hemis_id', 'hemis_password'], 'required'],
            ['rememberMe', 'boolean'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'hemis_id' => Yii::t('app', 'Hemis ID'),
            'hemis_password' => Yii::t('app', 'Hemis parol'),
            'rememberMe' => Yii::t('app', 'Eslab qolish'),
        ];
    }
}
