<?php

/* @var $this yii\web\View */

use yii\helpers\Html;


$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
	<div class="row">
	<div style="min-height: 1000px;padding-top: 50px;" class="col-md-12">
	    <hr/>

        <hr class="separator1">

        <hr/>     
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

            </div>
    </div>
</div>