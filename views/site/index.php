<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use app\models\AreaPL;
use app\models\State;
use app\models\Subjects;


$this->title = 'Repetitor PL - Oświatowy portal';
?>
    <div id="top"></div>
    <div id="myModal" class="modal fade" role="dialog">
  	 <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
     <button class="close" data-dismiss="modal">×</button>
			<h4>Dla korepetytorów</h4>
        </div> 
    
     <div class="modal-body">
     <br/>
       <a href="/reg" class="btn btn-danger btn-block"><i class="fa fa-address-book"></i> Rejestracja</a>
       <br/>
       <a href="/profile" class="btn btn-success btn-block"><i class="fa fa-lock"></i> Osobisty gabinet</a>
       <br/><br/>
    </div>
        
          </div>
	</div>
	</div>	
	<div id="myModal1" class="modal fade" role="dialog">
  	 <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
     <button class="close" data-dismiss="modal">×</button>
			<h4>Poszukiwanie korepetytorów</h4>
        </div> 
     <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
         <form method="get" action="<?= \yii\helpers\Url::to(['site/search'])?>">
                            <input class="form-control search col-md-12" type="text" placeholder="Wprowadźcie nazwę miasta" name="a">
                        <br/><hr/><br/>
                            <input class="form-control search col-md-12" type="text" placeholder="Wprowadźcie nazwę przedmiotu" name="s">
                             <br/><hr/><br/>
                            <button class="btn btn-danger btn-block" type="submit">Znaleźć</button>
                        </form>      

                                    </div>
                                </div>
                            </div>
    </div>
  
          </div>
	</div>
	</div>	
<header>
<nav class="navbar navbar-default" id="slide-nav" data-spy="affix" data-offset-top="197">
  <div class="container-fluid">

    <div class="navbar-header">
          <a class="navbar-toggle"> 
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
     </a>
      <a class="top navbar-brand" href="#top"><img src="/images/logo.png" alt="" /><ul class="list-unstyled"><li><span class="text-danger">Repet</span><span class="text-success">itor - PL</span></li></ul></a>
    </div>

     <div id="slidemenu">
            <ul class="nav navbar-nav">
        <li><a class="top" href="#top">główna <span class="sr-only">(current)</span></a></li>
        <li><a class="repetitors" href="#repetitors">Korepetytorzy</a></li>
        <li><a class="steps" href="#steps">jak to pracuje</a></li>
        <li><a class="contact" href="#contact">kontakt</a></li>
      </ul>

       <ul class="nav navbar-nav contact navbar-right">
                <a href="https://www.facebook.com/"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
	            <a href="https://twitter.com/"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
	            <a href="https://plus.google.com/"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
	            <a href="mailto:ChapaA@ua.fm"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 
<i class="fa fa-book fa-5x animated fadeInDown delay-07s" style="color: #fff; padding-top: 7rem" aria-hidden="true"></i>
<h2 class="animated fadeInDown delay-07s">Potrzebujesz korepetytora?<br/>
    Wybieraj z najlepszych.</h2>

<h3 class="animated fadeInUp delay-1s">Teraz korepetycje są dostępne każdemu.</h3>
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-2">
	 <a data-toggle="modal" href="#myModal" class="btn btn-success btn-lg btn-block animated fadeInUp  delay-05s"><i class="fa fa-language" aria-hidden="true"></i>
 Ja korepetytor</a>
      </div>
      <div class="col-md-4">
     <a data-toggle="modal" href="#myModal1" class="btn btn-danger btn-lg btn-block animated fadeInUp  delay-05s"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
 Ja szukam korepetytora</a>
      </div>
      </div>
      </div>
      <a href="#repetitors" class="btn btn-circle page-scroll repetitors">
                            <i class="fa fa-angle-double-down wow bounce fa-2x"></i>
                        </a>
</header>
       <div class="module_top">
 <span class="section-shape">
<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><path class="elementor-shape-fill" fill="#ddd" d="M0,6V0h1000v100L0,0z"></path></svg>
</span>
</div>
<section id="repetitors">
<br/>
<hr class="separator1">

<h2 class="text-center">Korepetytorzy</h2>
<p class="text-center text-primary lead">Przedstawiam wszystkich korepetytorów</p>
<div class="container">
<ul class="five">
<?php if( !empty($profile) ): ?>
      <?php foreach($profile as $profile): ?>
          <?php $mainImg = $profile->getImage();?>
  <li class="transition">
    <div class="wrapper"> 
      <ul class="social">
       <br/><br/>
      </ul>

      <?= Html::img($mainImg->getUrl('235x250'))?>
      <h3 class="transition"><a href="<?=  yii\helpers\Url::to(['site/repetitor', 'user_id' => $profile->user_id])?>"><?=$profile->first_name?> <?=$profile->second_name?></a>
      	
      <hr/> 
      <p class="small">miejsce wykładania</p>
      <?= $profile->place ?>
      	
      
      
      
     
        </h3>
      <span class="transition">
      <div class="text-wrapper transition">
        <p>Przedmioty - <strong><?=$profile->subject?></strong></p>
        <p>Stawka - <strong><?=$profile->price?></strong> zł.</p>
        
      </div>
            
      </span> </div>
  </li>
<?php endforeach;?>

<?php endif; ?>
</ul>
<hr class="separator1">
        
</section>
<section id="filtr">

		<h2 class="text-center animated fadeInDown delay-07s">Popularne lokacje i przedmioty</h2>
		<br/>
		<ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#sectionA"><h3>Miasta</h3></a></li>
        <li><a href="#sectionB"><h3>Przedmioty</h3></a></li>
    </ul>
    <div class="tab-content">
        <div id="sectionA" class="tab-pane fade in active">
            <h3>Wybierzcie miasto</h3>
             <?php if (!empty($area)): ?>
    <?php foreach ($area as $area): ?>
       <div class="col-md-4">
    <ul class="list-group">
        <li class="list-group-item wow fadeInUp" data-wow-delay="0.3s"><h3><i class="fas fa-map-marker-alt text-primary"></i>
<a href="<?=  yii\helpers\Url::to(['site/city', 'id' => $area->id])?>"><?=$area->title?></a></h3>     
            </li>

    </ul>
    </div>

<?php endforeach; ?>
<?php endif; ?>
        </div>
        <div id="sectionB" class="tab-pane fade">
            <h3>Wybierzcie przedmiot</h3>
            <?php if (!empty($subjects)): ?>
    <?php foreach ($subjects as $subject): ?>
<div class="col-md-4">
    <ul class="list-group">

        <li class="list-group-item wow fadeInUp" data-wow-delay="0.3s"><h3><i class="fas fa-book text-primary"></i>
	   
<a href="<?=  yii\helpers\Url::to(['site/subjects', 'id' => $subject->id])?>"><?=$subject->title?></a>      
    
            </h3>
            
            </li>

    </ul>
    </div>
<?php endforeach; ?>
<?php endif; ?>
        </div>
    </div>
    <div class="container">

<div class="row">


    <div class="col-md-12 col-sm-3 col-xs-3"></div>
</div>
        <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-6 filtr">                            
			  
			      
                         
                            
<br/><br/><br/>
                       
            
        </div>
        
        
        </div>
        <br>
        
    </div>

                        <br/><br/><br/><br/><br/><br/><br/><br/><br/>
</section>
<section id="steps">
<span class="section-shape">
<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><path class="elementor-shape-fill" fill="#133a5b" d="M0,6V0h1000v100L0,0z"></path></svg>
</span>
<h2>Jak to pracuje?</h2>
<div class="container">
 <div class="row">
  <div class="process">
   <div class="process-row nav nav-tabs">
    <div class="process-step">
     <button type="button" class="btn btn-info" data-toggle="tab" href="#menu1"><i class="fa fa-id-card-o fa-5x" aria-hidden="true"></i></button>
     <p>Rejestracja</p>
    </div>
    <i class="fa fa-angle-double-right fa-3x" aria-hidden="true"></i>
    <div class="process-step">
     <button type="button" class="btn btn-info" data-toggle="tab" href="#menu2"><i class="fa fa-file-text-o fa-5x" aria-hidden="true"></i></button>
     <p>Podanie dokumentów</p>
    </div><i class="fa fa-angle-double-right fa-3x" aria-hidden="true"></i>
    <div class="process-step">
     <button type="button" class="btn btn-info" data-toggle="tab" href="#menu3"><i class="fa fa-book fa-5x" aria-hidden="true"></i></button>
    <p>Początek nauczania</p>
    </div>
   </div>
  </div>
  <div class="tab-content">
   <div id="menu1" class="tab-pane fade active in">
    <h3>Krok 1</h3>
    <p>Odbywa się wasza rejestracja.</p>

   </div>
   <div id="menu2" class="tab-pane fade">
    <h3>Krok 2</h3>
    <p>Podajecie całe konieczne dokumenty.</p>

   </div>
   <div id="menu3" class="tab-pane fade">
    <h3>Krok 3</h3>
    <p>Zaczynacie nauczanie.</p>

   </div>
  </div>
 </div>
</div>
</section>
