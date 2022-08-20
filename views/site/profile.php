<?php
use kartik\widgets\FileInput;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use app\models\Area;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form ActiveForm */
$this->title = 'Osobisty gabinet';
$this->params['breadcrumbs'][] = $this->title;

?>

<?php
NavBar::begin([
        'options' => [
            'class' => 'nav',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-right'],
        'items' => [

            Yii::$app->user->isGuest ? (
                ['label' => 'Увійти', 'url' => ['/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/logout'], 'post')
                . Html::submitButton(
                    'Wyjść <i class="fa fa-sign-out" aria-hidden="true"></i> (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-primary logout']
                    
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
<div class="site-profile container">

    <div class="well">
<h1><?= Html::encode($this->title) ?></h1>
<div class="profile_img">
<?php $img = $model->getImage(); ?>
 <?= DetailView::widget([

        'model' => $model,

        'attributes' => [


            [

                'attribute' => '',

                'value' => "<img src='{$img->getUrl()}'>",

                'format' => 'html',

            ],


        ],

    ]) ?>
     </div>
 <br/><br/>
    <?php $form = ActiveForm::begin() ?>

<?php
    if($model->user)
        echo $form->field($model->user, 'username');
    ?>

        <?= $form->field($model, 'first_name')->textInput(['placeholder' => "Wprowadźcie wasze imię"]) ?>
        <?= $form->field($model, 'second_name')->textInput(['placeholder' => "Wprowadźcie wasze nazwisko"]) ?>
        <?= $form->field($model, 'image',['options'=>['class'=>'col-xs-12']])->widget(\kartik\file\FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' =>  'Wybierzcie foto'
        ],
    ]);?>
        
	    <?= $form->field($model, 'email')->textInput(['placeholder' => "Wprowadźcie email"]) ?>
	    <?= $form->field($model, 'skype')->textInput(['placeholder' => "Wprowadźcie skype"]) ?>
	    <?= $form->field($model, 'subject')->textInput(['placeholder' => "Wprowadźcie przedmioty wykładania"]) ?>
        <?= $form->field($model, 'place')->textInput(['placeholder' => "Wprowadźcie miejsce wykładania dla podsumowania"]) ?>
        <?= $form->field($model, 'area_id')->dropDownList(ArrayHelper::map(Area::find()->all(),'id','title'),['promt' => 'Wybierzcie miasto']) ?>
        <?= $form->field($model, 'colege')->textInput(['placeholder' => "Wprowadźcie edukacyjny zakład który ukończyliście (Na przykład - Szkoła Języka i Kultury Polskiej Uniwersytetu Jagiellońskiego)"]) ?>
        <?= $form->field($model, 'year') ?>
        <?= $form->field($model, 'degree') ->textInput(['placeholder' => "Wprowadźcie wasz stopień nauczycielski"])?>
        <?= $form->field($model, 'phone')->textInput(['placeholder' => "Wprowadźcie wasz numer telefonu"]) ?>
        <?= $form->field($model, 'experience')->textInput(['placeholder' => "Wprowadźcie doświadczenie pracy (na przykład 5 lat)"]) ?>
        <?= $form->field($model, 'level') ->textInput(['placeholder' => "Wprowadźcie poziom nauczania (na przykład - początkowe klasy)"])?>
        <?= $form->field($model, 'adress')->textInput(['placeholder' => "Wprowadźcie adres waszego pobytu"]) ?>
        <?= $form->field($model, 'price') ?>
        <?php echo $form->field($model, 'content')->widget(CKEditor::className(),[
	    'editorOptions' => [
	        'preset' => 'full',
	        'inline' => false,
	    ],
		]); ?>
        


	  </div>
        <div class="form-group">
            <?= Html::submitButton('Zachować', ['class' => 'btn btn-primary btn-block']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    </div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div><!-- site-profile -->
