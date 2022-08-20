<?php

namespace app\modules\internal\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $user_id
 * @property string $first_name
 * @property string $second_name
 * @property string $middle_name
 * @property string $subject
 * @property int $status_id
 * @property string $place
 * @property string $colege
 * @property string $year
 * @property string $degree
 * @property string $phone
 * @property double $price
 * @property string $experience
 * @property string $level
 * @property string $adress
 * @property string $content
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'place', 'colege', 'year', 'degree', 'phone', 'experience', 'level', 'adress', 'content'], 'required'],
            [['year'], 'safe'],
            [['price'], 'number'],
            [['content'], 'string'],
            [['place', 'colege', 'degree', 'phone', 'experience', 'adress'], 'string', 'max' => 255],
             [['status_id'], 'integer'],
            [['first_name', 'second_name', 'middle_name'], 'string', 'max' => 32],
            [['subject'], 'string', 'max' => 300],
            [['level'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'first_name' => "Ім'я",
            'second_name' => 'Прізвище',
            'middle_name' => 'По батькові',
            'status_id' => 'Статус користувача',
            'subject' => 'Предмети викладання',
            'place' => 'Місце викладання',
            'colege' => 'Навчальний заклад',
            'year' => 'Рік закінчення',
            'degree' => 'Ступінь',
            'phone' => 'Телефон',
            'price' => 'Ставка викладання',
            'experience' => 'Досвід',
            'level' => 'Рівень',
            'adress' => 'Адреса проживання',
            'content' => 'Резюме',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
