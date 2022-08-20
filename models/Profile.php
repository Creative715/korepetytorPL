<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;

use yii\web\UploadedFile;

/**
 * This is the model class for table "profile".
 *
 * @property int $user_id
 * @property string $first_name
 * @property string $second_name
 * @property int $status_id
 * @property string $subject
 * @property int $state_id
 * @property string $email
 * @property string $scype
 * @property int $area_id
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
 *
 * @property User $user
 */
 
class Profile extends \yii\db\ActiveRecord



{
	public $image;
   
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
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
            [['subject','email', 'skype', 'colege', 'year', 'degree','area_id', 'phone', 'experience', 'level', 'adress', 'content'], 'required'],
            ['status_id', 'default', 'value' => User::STATUS_NOT_ACTIVE, 'on' => 'default'],
            ['status_id', 'in', 'range' =>[
                User::STATUS_NOT_ACTIVE,
                User::STATUS_ACTIVE
            ]],
            [['year'], 'safe'],
            [['status_id', 'area_id'], 'integer'],
            [['price'], 'number'],
            [['content'], 'string'],
            [['email', 'skype', 'place', 'colege', 'degree', 'phone', 'experience', 'adress'], 'string', 'max' => 255],
            [['first_name', 'second_name'], 'string', 'max' => 32],
            [['image'], 'file', 'extensions' => 'png, jpg'],
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
            'first_name' => 'Imię',
            'second_name' => 'Nazwisko',
            'subject' => 'Przedmioty wykładania',
            'image' => 'Foto (dodaje się po zachowaniu profilu)',
            'status_id' => 'Status',
            'email' => 'Email',
            'scype' => 'Scype',
            'area_id' => 'Miasto',
            'place' => 'Miejsce wykładania',
            'colege' => 'Edukacyjny zakład',
            'year' => 'Rok zakończenia',
            'degree' => 'Stopień',
            'phone' => 'Telefon',
            'price' => 'Cena wykładania (za 1 godzinę)',
            'experience' => 'Doświadczenie',
            'level' => 'Poziom nauczania',
            'adress' => 'Adres pobytu',
            'content' => 'Podsumowanie wykładowcy',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function updateProfile()
    {
        $profile = ($profile = Profile::findOne(Yii::$app->user->id)) ? $profile : new Profile();
        $profile->user_id = Yii::$app->user->id;
        $profile->first_name = $this->first_name;
        $profile->second_name = $this->second_name;
        $profile->subject = $this->subject;
        $profile->status_id = $this->status_id;
        $profile->email = $this->email;
        $profile->skype = $this->skype;
        $profile->area_id = $this->area_id;
        $profile->place = $this->place;
        $profile->colege = $this->colege;
        $profile->year = $this->year;
        $profile->experience = $this->experience;
        $profile->degree = $this->degree;
        $profile->phone = $this->phone;
        $profile->price = $this->price;
        $profile->level = $this->level;
        $profile->adress = $this->adress;
        $profile->content = $this->content;
        if($profile->save()):
            $user = $this->user ? $this->user : User::findOne(Yii::$app->user->id);
            $username = Yii::$app->request->post('User')['username'];
            $user->username = isset($username) ? $username : $user->username;
            return $user->save() ? true : false;
        endif;
        return false;
    }
    
   	   public function upload(){
        if($this->validate()){
            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    
}
