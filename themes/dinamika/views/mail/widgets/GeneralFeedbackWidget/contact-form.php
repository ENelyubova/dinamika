<?php $hasFlash = Yii::app()->user->hasFlash($this->successKey) ?>
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', $this->formOptions) ?>
        <?php if ($hasFlash) : ?>
            <script>
                $("#<?= $this->id; ?>").modal('hide');
                $("#messageModal").modal('show');
                yaCounter57143242.reachGoal('form');
                setTimeout(function(){
                    $("#messageModal").modal('hide');
                }, 4000);
            </script>
            
        <?php endif ?>
            
        <?= $form->hiddenField($model, 'key', ['value' => $this->id]) ?>
        
        <div class="form-flex">
            <?php if ($this->showAttributeName) : ?>
                <?= $form->textFieldGroup($model, 'name', [
                    'widgetOptions'=>[
                        'htmlOptions'=>[
                            'class' => '',
                            'placeholder' => 'Ваше имя',
                            'autocomplete' => 'off'
                        ]
                    ]
                ]); ?>
            <?php endif ?>

            <?php if ($this->showAttributePhone) : ?>
                <?= $form->maskedTextFieldGroup($model, 'phone', [
                    'widgetOptions' => [
                        'mask' => '+7(999)999-99-99',
                        'id' => 'phone-'.$this->id,
                        'htmlOptions'=>[
                            'class' => 'data-mask',
                            'data-mask' => 'phone',
                            'placeholder' => Yii::t('MailModule.mail', 'Ваш телефон'),
                            'autocomplete' => 'off'
                        ]
                    ]
                ]); ?>
            <?php endif ?>
            
            <?php if ($this->showAttributeEmail) : ?>
                <?= $form->textFieldGroup($model, 'email', [
                    'widgetOptions'=>[
                        'htmlOptions'=>[
                            'class' => '',
                            'placeholder' => 'E-mail',
                            'autocomplete' => 'off'
                        ]
                    ]
                ]); ?>
            <?php endif ?>
        </div>

        <?php if ($this->showAttributeBody) : ?>
            <?= $form->textAreaGroup($model, 'body') ?>
        <?php endif ?>

        <?php if ($this->showAttributeJson) : ?>
            <?= $form->hiddenField($model, 'json') ?>
        <?php endif ?>

        <div class="form-bot">
            <div class="form-policy">
                Нажимая кнопку “Отправить сообщение” вы соглашаетесь с <a href="" target="_blank">условиями обработки и передачи персональных данных</a>
            </div>

            <div class="form-button">
                <?php if ($this->showCloseButton) : ?>
                    <button type="button" class="btn btn-callback" data-dismiss="modal">Закрыть</button>
                <?php endif ?>
                    <button id="<?= $this->sendButtonId ?>" type="submit" class="btn btn-yellow">
                        Отправить сообщение
                    </button>
            </div>
        </div>
    <?php $this->endWidget() ?>

<?php Yii::app()->clientScript->registerScript($this->id.'-script', "

$(document).delegate('#{$this->formOptions['id']}', 'submit', function() {
    var form = $(this);
    var data = form.serialize();
    var url = form.attr('action');
    var type = form.attr('method');
    var selectorForm = '#{$this->formOptions['id']}';
    $.ajax({
        url: url,
        type: type,
        data: data,
        dataType: 'html',
        success: function(data) {
            $(selectorForm).html($(data).find(selectorForm).html());
            // var mask = $('.js-code-phone option:selected').data('mask');
            // if (mask !== undefined) {
            // }
            $('[data-mask=phone]').mask('+7(999)999-99-99', {
                'placeholder':'_',
                'completed':function() {
                    //console.log('ok');
                }
            });
            $.getScript('https://www.google.com/recaptcha/api.js', function () {});
        }
    })
    return false;
})
") ?>