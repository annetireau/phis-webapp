<?php
//******************************************************************************
//                                       warning.php
// SILEX-PHIS
// Copyright © INRA 2018
// Creation date: 11 Sept, 2018
// Contact: arnaud.charleroy@inra.fr, anne.tireau@inra.fr, pascal.neveu@inra.fr
//******************************************************************************

// help to show warnings

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use Yii;
use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-warning">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-warning">
        <?= nl2br(Html::encode(Yii::t('app',$message))) ?>
    </div>

    <p>
       <?= Yii::t('app','The above warning occurred while the Web server was processing your request.') ?>
    </p>
    <p>
        <?= Yii::t('app','Please contact us if you think this is a server error. Thank you.') ?>
    </p>

</div>
