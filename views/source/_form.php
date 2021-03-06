<?php

use artsoft\helpers\Html;
use artsoft\translation\models\MessageSource;
use yii\helpers\ArrayHelper;
use yii\web\View;
use artsoft\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model artsoft\translation\models\MessageSource */
/* @var $form artsoft\widgets\ActiveForm */
?>

    <div class="message-source-form">

        <?php
        $form = ActiveForm::begin([
            'id' => 'message-source-form',
            'validateOnBlur' => false,
            'enableClientValidation' => false,
        ])
        ?>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $categories = ArrayHelper::merge(MessageSource::getCategories(), [' ' => Yii::t('art/translation', 'Create New Category')]) ?>
                                <?= $form->field($model, 'category')->dropDownList($categories, ['prompt' => '']) ?>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group new-category-group">
                                    <label class="control-label"
                                           for="new-category"><?= Yii::t('art/translation', 'New Category Name') ?></label>
                                    <input type="text" id="new-category" class="form-control" name="category"
                                           value="<?= Yii::$app->getRequest()->post('category') ?>">
                                </div>
                            </div>
                        </div>

                        <?= $form->field($model, 'message')->textInput(['rows' => 6]) ?>

                        <?= $form->field($model, 'immutable')->checkbox() ?>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="form-group">
                    <?= Html::a(Yii::t('art', 'Go to list'), ['/translation/default/index'], ['class' => 'btn btn-default']) ?>
                    <?= Html::submitButton(Yii::t('art', 'Save'), ['class' => 'btn btn-primary']) ?>
                    <?php if (!$model->isNewRecord): ?>
                        <?= Html::a(Yii::t('art', 'Delete'), ['/translation/source/delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                            ],
                        ])
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php

$this->registerJs("

    //alert('|'+$('#messagesource-category').val().length+'|');
    if($('#messagesource-category').val() !== ' '){
        $('.new-category-group').hide();
    } else {
        $('.new-category-group').show();
    }

    if($('#new-category').val().length > 0){
        $('.new-category-group').show();
        $('#messagesource-category option').last().attr('selected','selected');
        $('#messagesource-category').trigger('refresh');
    }

    $('#messagesource-category').change(function(){
        if($(this).val() !== ' '){
            $('.new-category-group').hide();
        } else {
            $('.new-category-group').show();
        }
    });
", View::POS_READY);
?>