<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use ogheo\comments\widget\Comments;


$this->params['breadcrumbs'][] = $this->title;
?>
<?php $mainImg = $profile->getImage();?>
<section class="repetitor">
	<div align="center">
	 <?= Html::img($mainImg->getUrl('400x'), ['class' => 'img-thumbnail', 'alt' => $profile->first_name, 'title' => $profile->first_name])?>
	 </div>
	<h1><span class="blue">&lt;</span><?= $profile->first_name ?><?= $profile->middle_name ?><span class="blue">&gt;</span> <span class="yellow"><?= $profile->second_name ?></pan></h1>
<h2>Kontakt z korepetytorem</h2>

<table class="container" style="text-align: center">
	<tbody>
		<tr>
			<td><a href="skype:<?= $profile->skype ?>?call"><img src="/images/skype.png" border="0" alt="Kontakt z korepetytorem przez Skype" title="Kontakt z korepetytorem przez Skype"></a></td>
			<td><a href="mailto:<?= $profile->email ?>"><img src="/images/email.png" border="0" alt="Kontakt z korepetytorem przez Email" title="Kontakt z korepetytorem przez Email"></a></td>
		</tr>
	</tbody>
</table>
<br/><hr class="hr_white"/><br/>
<table class="container">
	
	<tbody>
		<tr>
			<td><h3>Przedmioty</h3></td>
			<td style="width: 40%; text-align: center;"> --- </td>
			<td colspan="2" rowspan="1"><h3><?= $profile->subject ?></h3></td>
		</tr>
		<tr>
			<td><h3>Miejsce wykładania</h3></td>
			<td style="width: 40%; text-align: center;">---</td>
			<td colspan="2" rowspan="1"><h3><?= $profile->place ?></h3></td>
		</tr>
		<tr>
			<td><h3>Wykształcenie</h3></td>
			<td style="width: 40%; text-align: center;">---</td>
			<td></td>
			<td><h3><?= $profile->colege ?></h3></td>
		</tr>
    <tr>
			<td><h3>Doświadczenie</h3></td>
			<td style="width: 40%; text-align: center;">---</td>
			<td></td>
			<td><h3><?= $profile->experience ?></h3></td>
		</tr>
    <tr>
			<td><h3>Stopień naukowy</h3></td>
			<td style="width: 40%; text-align: center;">---</td>
			<td></td>
			<td><h3><?= $profile->degree ?></h3></td>
		</tr>
		    <tr>
			<td><h3>Stawka</h3></td>
			<td style="width: 40%; text-align: center;">---</td>
			<td></td>
			<td><h3><?= $profile->price ?> zł.</h3></td>
		</tr>
		    <tr>
			<td><h3>Poziom wykładania</h3></td>
			<td style="width: 40%; text-align: center;">---</td>
			<td></td>
			<td><h3><?= $profile->level ?></h3></td>
		</tr>
				    <tr>
			<td><h3>Informacje</h3></td>			
			<td colspan="3" rowspan="1"><h4><?= $profile->content ?></h4></td>
		</tr>
		<tr>
		
			    
    <td colspan="4" rowspan="1"></td>
    
		</tr>
	</tbody>
</table>
    <div class="container">
        <p><hr/></p><br/>
        <?php echo Comments::widget(); ?>
        <p><hr/></p><br/><br/>
    </div>
</section>