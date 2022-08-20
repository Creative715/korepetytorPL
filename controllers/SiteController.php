<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\ContactForm;
use app\models\RegForm;
use app\models\User;
use app\models\Profile;
use app\models\State;
use app\models\Area;
use app\models\Subjects;
use app\models\SendEmailForm;
use app\models\ResetPasswordForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\UploadedFile;
use app\models\AccountActivation;

class SiteController extends BehaviorsController
{
    /**
     * @inheritdoc
     */

    /**
     * @inheritdoc
     */
    public $image; 
     
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

 
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
    
    $profile = Profile::find()->where(['status_id' => '1'])->select('user_id, status_id, first_name, state_id, area_id, second_name, subject, subject_id, place, price')->all();
    $subjects = Subjects::find()->select('id, title')->all(); 
    $area = Area::find()->select('id, state_id, title')->all();
    $state = State::find()->select('id, title')->all();
    
    
    $model = new \app\models\Profile();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            
            return;
        }
    }


    
    
    return $this->render('index', 
    
     [
     
     'profile' => $profile,
     'subjects' => $subjects,
     'state' => $state,
     'area' => $area,
     'model' => $model,
     
     ]
     
     );
      
    
    
       
    }
    

		public function actionDynamiccities()
		{
		    $data=State::model()->findAll('id=:id', 
				          array(':id'=>(int) $_POST['state_id']));
		    
		    $data=CHtml::listData($data,'id','title');
		    foreach($data as $value=>$title)
		    {
		        echo CHtml::tag('option',
						   array('value'=>$value),CHtml::encode($title),true);
		    }
		}
       	public function actionCity($id) {        
        $id = Yii::$app->request->get('id');
        $area = Area::findOne($id);
        $profile = Profile::find()->where(['area_id' => $id,'status_id' => '1'])->all();;
        $this->setMeta('Korepetytorzy - po miastu ' . $area->title);
        return $this->render('city', compact('profile'));
        
    }
		public function actionSubjects($id) {        
        $id = Yii::$app->request->get('id');
        $subjects = Subjects::findOne($id);
        $profile = Profile::find()->where(['subject_id' => $id, 'status_id' => '1'])->all();;
        $this->setMeta('Korepetytorzy - po przedmiocie ' . $subjects->title);
        return $this->render('subjects', compact('profile'));
        
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
   
    /**
     * Logout action.
     *
     * @return Response
     */

    

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

  public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['/']);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

   
   public function actionReg()
    {
        $emailActivation = Yii::$app->params['emailActivation'];
        $model = $emailActivation ? new RegForm(['scenario' => 'emailActivation']) : new RegForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()):
            if ($user = $model->reg()):
                if ($user->status === User::STATUS_ACTIVE):
                    if (Yii::$app->getUser()->login($user)):
                        return $this->goHome();
                    endif;
                else:
                    if($model->sendActivationEmail($user)):
                        Yii::$app->session->setFlash('success', 'List z aktywacją nadesłano na e-mail <strong>'.Html::encode($user->email).'</strong> (sprawdźcie również teczkę spam).');
                    else:
                        Yii::$app->session->setFlash('error', 'Błąd. List nie nadesłano.');
                        Yii::error('Помилка відправки листа.');
                    endif;
                    return $this->refresh();
                endif;
            else:
                Yii::$app->session->setFlash('error', 'Powstał błąd przy rejestracji.');
                Yii::error('Błąd przy rejestracji');
                return $this->refresh();
            endif;
        endif;

        return $this->render(
            'reg',
            [
                'model' => $model
            ]
        );
    }
    
    public function actionActivateAccount($key)
    {
        try {
            $user = new AccountActivation($key);
        }
        catch(InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if($user->activateAccount()):
            Yii::$app->session->setFlash('success', 'Aktywacja przeszła umiejętnie. <strong>'.Html::encode($user->username).'</strong> Teraz możecie zajść do swojego osobistego gabinetu');
        else:
            Yii::$app->session->setFlash('error', 'Błąd aktywacji.');
            Yii::error('Błąd przy aktywacji.');
        endif;

        return $this->redirect(Url::to(['/site/login']));
    }
    
    public function actionProfile()
	 {       
        
        
        $model = ($model = Profile::findOne(Yii::$app->user->id)) ? $model : new Profile();
    
            $model->image = UploadedFile::getInstance($model, 'image');
            if( $model->image ){
                $model->upload();
            }
            if($model->load(Yii::$app->request->post()) && $model->validate()):
            if($model->updateProfile()):
            Yii::$app->session->setFlash('success', 'Profil zmieniono');
            else:

                Yii::$app->session->setFlash('error', 'Profil ne zmieniono');
                Yii::error('Błąd zapisu. Profil ne zmieniono');
                return $this->refresh();
            endif;
        endif;
                 
        return $this->render(
            'profile',
            [
                'model' => $model
            ]
        );
       
    }
    
       public function actionFeedback()
    {
        // ajax validation
        if (Yii::$app->request->isAjax) {

            $data = json_decode($_POST['feedback']);

            $htmlMail = '<h3>User Information </h3> Browser Version: ' . $data->browser->appVersion 
                    . '<p>User Agent: ' . $data->browser->userAgent.'</p>'
                    . '<p>Platform: ' . $data->browser->platform.'</p><hr>'
                    . '<p>URL: ' . $data->url .'</p>'
                    . '<p>Note: ' . $data->note .'</p>';

            // Send email with image attached as HTML file
            Yii::$app->mailer->compose()
                ->setFrom('EMAIL_ADDRESS_HERE@gmail.com')
                ->setTo('SEND_TO_ADDRESS_HERE@gmail.com')
                ->setSubject('SUBJECT_GOES_HERE')
                ->setHtmlBody($htmlMail)
                ->attachContent('<!DOCTYPE html><html><body><img src="' . $data->img .'" /></body></html>', ['fileName' => 'screengrab.html', 'contentType' => 'text/html'])
                ->send();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $data;
        }
        return false;
    }

    	public function actionRepetitor($user_id) {
        
        $id = \Yii::$app->request->get('user_id');
        $profile = Profile::findOne($user_id);
        $this->setMeta('' . $profile->first_name . ' ' . $profile->second_name);
        if(empty($profile)) throw new \yii\web\HttpException(404);
        return $this->render('repetitor', compact('profile'));
    }
    

		 public function actionSendEmail()
    {
        $model = new SendEmailForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if($model->sendEmail()):
                    Yii::$app->getSession()->setFlash('warning', 'Sprawdźcie pocztową skrzynkę. (Sprawdźcie również teczkę spam).');
                    return $this->render('sendEmail', [
            'model' => $model,
        ]);
                else:
                    Yii::$app->getSession()->setFlash('error', 'Niemożliwie zrzucić parol.');
                endif;
            }
        }

        return $this->render('sendEmail', [
            'model' => $model,
        ]);
    }
 public function actionSearch(){
        
        
        $s = trim(Yii::$app->request->get('s'));
        $this->setMeta('Wynik poszukiwania po zapytaniu: ' . $s . $a);
        
        if(!$s)
        return $this->render('search');
        $query = Profile::find()->where(['like', 'subject', $s]);
        
        
        $a = trim(Yii::$app->request->get('a'));
        if(!$a)
        
        return $this->render('search');
        $query = Profile::find()->where(['like', 'adress', $a]);

        
        $profile = $query->all();
        return $this->render('search', compact('profile','adress','s','subject','a'));
    }
	
	
	
	
	
	
	
	
		 public function actionResetPassword($key)
    {
        try {
            $model = new ResetPasswordForm($key);
        }
        catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->resetPassword()) {
                Yii::$app->getSession()->setFlash('warning', 'Parol zmieniono.');
                return $this->redirect(['/site/login']);
            }
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}

		     
