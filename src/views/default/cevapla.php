<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;




?>

<?php

if(isset($error)) { ?>
    <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
<?php } ?>

<div>
    <h1><?php echo $questionText; ?></h1>
</div>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'answerText'); ?>


<div class="form-group">
    <?= Html::submitButton('Cevap Ver', ['class' => 'btn btn-success']); ?>
</div>


<?php ActiveForm::end(); ?>
