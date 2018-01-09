<?php $form = $this->beginWidget('CActiveForm', array(
				'id'=>'message-form',
				'enableAjaxValidation'=>false,
			)); ?>
<div class="row">
                    <?php echo $form->labelEx($model,'to'); ?>
                    <?php echo $form->textField($model, 'to', array('size' => 15, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'to'); ?>
 </div>
<div class="row">
                    <?php echo $form->labelEx($model,'subject'); ?>
                    <?php echo $form->textField($model, 'subject', array('size' => 15, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'subject'); ?>
 </div>

 <div class="row">
      <?php echo $form->labelEx($model,'message'); ?>
     <?php
//            $this->widget('application.components.widgets.xheditor',array(
//                'language'=>'en', //options are en, zh-cn, zh-tw
//                'config'=>array(
//                    'id'=>'xh1',
//                    'name'=>'message',
//                    'tools'=>'fill', // mini, simple, fill or from XHeditor::$_tools
//                    'width'=>'100%',
//                    //see XHeditor::$_configurableAttributes for more
//                ),
//                'contentValue'=>'Enter your text here', // default value displayed in textarea/wysiwyg editor field
//                'htmlOptions'=>array('rows'=>5, 'cols'=>10),// to be applied to textarea
//            ));
            ?>
                   
                    <?php echo $form->textField($model, 'message', array('size' => 15, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'message'); ?>
 </div>
<div class="row">
            <?php //echo $form->labelEx($model,'updated_at'); ?>
            <?php echo $form->hiddenField($model, 'created_at', array('value' => date('Y-m-d'))); ?>
            <?php echo $form->error($model, 'created_at'); ?>
        </div>
<div class="row">
            <?php //echo $form->labelEx($model,'updated_at'); ?>
            <?php echo $form->hiddenField($model, 'updated_at', array('value' => date('Y-m-d'))); ?>
            <?php echo $form->error($model, 'updated_at'); ?>
        </div>
 <div class="row">
            <?php //echo $form->labelEx($model,'is_deleted'); ?>
<?php echo $form->hiddenField($model, 'is_deleted'); ?>
<?php echo $form->error($model, 'is_deleted'); ?>
        </div>
<div class="clear"></div>
<div style="padding:0px 0 0 0px; text-align:left">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'formbut','id' => 'btn', 'name' => 'bbtn', 'title' => 'Save')); ?>
   
</div>
<?php $this->endWidget(); ?>

<script>
    $(document).ready(function(){
        $("#message-form").submit(function(){
            $("#btn").attr('disabled','true');
        });
    });''
    </script>