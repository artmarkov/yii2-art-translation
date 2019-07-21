<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model artsoft\translation\models\MessageSource */

$this->title = Yii::t('art/translation', 'Update Message Source');
$this->params['breadcrumbs'][] = ['label' => Yii::t('art/translation', 'Message Translation'), 'url' => ['/translation/default/index']];
$this->params['breadcrumbs'][] = 'Update Message Source';
?>
<div class="message-source-update">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title"><?=  Html::encode($this->title) ?></h3>            
        </div>
    </div>
    <?= $this->render('_form', compact('model')) ?>
</div>