<?php



/* @var $this \yii\web\View */

/* @var $content string */



use app\widgets\Alert;

use yii\helpers\Html;

use yii\bootstrap\Nav;

use yii\bootstrap\NavBar;

use yii\widgets\Breadcrumbs;

use app\assets\AppAsset;



AppAsset::register($this);

?>

<?php $this->beginPage() ?>

<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>">

<head>

    <meta charset="<?= Yii::$app->charset ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>

</head>

<body>

<?php $this->beginBody() ?>




        <?= Breadcrumbs::widget([

            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],

        ]) ?>



        <?= Alert::widget() ?>

        <?= $content ?>
<footer class="footer">

    <div class="footer" id="contact">

        <div class="container">

            <div class="row">

                <div class="col-md-4">

                    <h3> Kontakt </h3>

                    <p>Lorem ipsum dolor sit amet, eu est soleat graeco epicurei, alterum omittam his ad, quo ut probo accusamus. </p><p>Cu mei epicurei incorrupte, mel id vidisse pericula corrumpit, per ornatus mandamus eu. Te dictas audiam his. Id nam viris theophrastus, his no meliore suscipit rationibus. Vix etiam erant an, in suscipit tractatos contentiones cum, eirmod labitur vel ut.</p>

                </div>

                <div class="col-md-4">

                    <h3> Ważne linki </h3>

                    <ul>

                        <li> <a href="#"> Lorem Ipsum </a> </li>

                        <li> <a href="#"> Lorem Ipsum </a> </li>

                        <li> <a href="#"> Lorem Ipsum </a> </li>

                        <li> <a href="/profile"> Wejście dla korepetytorów</a> </li>

                    </ul>

                </div>

                <div class="col-md-4">

                    <h3> O nas </h3>

                    <p>Lorem ipsum dolor sit amet, eu est soleat graeco epicurei, alterum omittam his ad, quo ut probo accusamus. </p><p>Cu mei epicurei incorrupte, mel id vidisse pericula corrumpit, per ornatus mandamus eu. Te dictas audiam his. Id nam viris theophrastus, his no meliore suscipit rationibus. Vix etiam erant an, in suscipit tractatos contentiones cum, eirmod labitur vel ut.</p>

                </div>

            </div>

            <!--/.row-->

        </div>

        <!--/.container-->

    </div>

    

        <div class="footer-bottom">

        <div class="container">

            <p class="pull-left"> Copyright © <?= date('Y') ?>, Repetitor PL - Oświatowy portal. All rights reserved.</p>

            <div class="pull-right">

                <ul class="nav nav-pills payments">

                    <li><i class="fa fa-cc-visa"></i></li>

                    <li><i class="fa fa-cc-mastercard"></i></li>

                    <li><i class="fa fa-cc-amex"></i></li>

                    <li><i class="fa fa-cc-paypal"></i></li>

                </ul>

            </div>

        </div>

        

    </div>
<!-- hit.ua -->

<a href='https://hit.ua/?x=80287' rel="nofollow" target='_blank'>

<script language="javascript" type="text/javascript">
<!--

Cd=document;Cr="&"+Math.random();Cp="&s=1";

Cd.cookie="b=b";if(Cd.cookie)Cp+="&c=1";

Cp+="&t="+(new Date()).getTimezoneOffset();

if(self!=top)Cp+="&f=1";

//--></script>

<script language="javascript1.1" type="text/javascript"><!--

if(navigator.javaEnabled())Cp+="&j=1";

//--></script>

<script language="javascript1.2" type="text/javascript"><!--

if(typeof(screen)!='undefined')Cp+="&w="+screen.width+"&h="+

screen.height+"&d="+(screen.colorDepth?screen.colorDepth:screen.pixelDepth);

//--></script>

<script language="javascript" type="text/javascript"><!--

Cd.write("<img src='//c.hit.ua/hit?i=80287&g=0&x=2"+Cp+Cr+

"&r="+escape(Cd.referrer)+"&u="+escape(window.location.href)+

"' border='0' wi"+"dth='1' he"+"ight='1'/>");

//--></script>

<noscript>

<img src='//c.hit.ua/hit?i=80287&amp;g=0&amp;x=2' border='0'/>

</noscript></a>

<!-- / hit.ua -->
</footer>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>

    wow = new WOW(

      {

        animateClass: 'animated',

        offset:       100

      }

    );

    wow.init();

  </script>

  <script type="text/javascript">

<!--

			$(document).ready(function(){   

			$(window).scroll(function () {

				if ($(this).scrollTop() > 0) {

					$('#scroller').fadeIn();

				} else {

					$('#scroller').fadeOut();

				}

			});

			$('#scroller').click(function () {

				$('body,html').animate({

					scrollTop: 0

				}, 800);

				return false;

			});

		});

	

//-->

</script>

<script type="text/javascript">
$(document).ready(function(){ 
    $("#myTab a").click(function(e){
    	e.preventDefault();
    	$(this).tab('show');
    });
});
</script>

<div id="scroller"><i class="fa fa-angle-double-up text-danger wow bounce fa-4x" aria-hidden="true"></i></div>

<?php $this->endBody() ?>

</body>

</html>

<?php $this->endPage() ?>

