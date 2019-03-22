<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model artsoft\translation\models\MessageSource */

$this->title = Yii::t('art/translation', 'Create Message Source');
$this->params['breadcrumbs'][] = ['label' => Yii::t('art/translation', 'Message Translation'), 'url' => ['/translation/default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="message-source-create">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>