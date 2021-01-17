<?php

use yii\helpers\Html;

?>

<?php if(isset($type)){ ?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?php echo $questionText; ?></h5>
        <?php if($anonim == 0) { ?>
            <h6 class="card-subtitle"><?php echo $fromUsername ?> tarafından <?php echo $toUsername ?> adlı kullanıcıya soruldu</h6>
        <?php }else { ?>
            <h6 class="card-subtitle">Anonim tarafından <?php echo $toUsername ?> adlı kullanıcıya soruldu!</h6>
        <?php } ?>

        <p>
            <?php if($type == 'askQuestion') { ?>
                Cevap bekleniyor...
            <?php } else if($type == "answerQuestion") {
                echo $answerText;
            } ?>
        </p>

        <a href="index.php?r=profil/default/profil&id=<?php echo $toID; ?>">Profile Dön</a>

    </div>
</div>
<?php } ?>