<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;




?>

<h1><?php echo $toUsername ?> adlı kullanıcıya soruyorsun</h1>

<?php
if(isset($error)) { ?>
    <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
<?php } ?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'questionText'); ?>
<?= $form->field($model, 'isAnonymous')->radioList([
    1 => 'Evet',
    0 => 'Hayır'

]); ?>

<div class="form-group">
    <?= Html::submitButton('Soru Sor', ['class' => 'btn btn-success']); ?>
</div>


<?php ActiveForm::end(); ?>
