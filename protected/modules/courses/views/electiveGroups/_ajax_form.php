<style>

.fancybox-inner{ width:auto;}
.notification{ width:88%;}
</style>

<!--
 * Ajax Crud Administration Form
 * SubjectName *
 * InfoWebSphere {@link http://libkal.gr/infowebsphere}
 * @author  Spiros Kabasakalis <kabasakalis@gmail.com>
 * @link http://reverbnation.com/spiroskabasakalis/
 * @copyright Copyright &copy; 2011-2012 Spiros Kabasakalis
 * @since 1.0
 * @ver 1.3
 -->
<div id="subject-name_form_con" class="client-val-form">
    <?php if ($model->isNewRecord) : ?>    <h3 id="create_header"><?php echo Yii::t('Electivegroups','Create New Elective Group');?></h3>
    <?php  elseif (!$model->isNewRecord):  ?>    <h3 id="update_header"><?php echo Yii::t('Electivegroups','Update Elective Group');?></h3>
    <?php   endif;  ?>
    <?php      $val_error_msg = 'Error.SubjectName was not saved.';
    $val_success_message = ($model->isNewRecord) ?
            'Subject was created successfuly.' :
            'Subject was updated successfuly.';
  ?>

    <div id="success-note" class="notification success png_bg"
         style="display:none; margin:-41px 25px 0 0px;">
        <a href="#" class="close"><img
                src="<?php echo Yii::app()->request->baseUrl.'/js_plugins/ajaxform/images/icons/cross_grey_small.png';  ?>"
                title="Close this notification" alt="close"/></a>
        <div>
            <?php   echo $val_success_message;  ?>        </div>
    </div>
    <div class="clear"></div>

    <div id="error-note" class="notification errorshow png_bg"
         style="display:none;">
        <a href="#" class="close"><img
                src="<?php echo Yii::app()->request->baseUrl.'/js_plugins/ajaxform/images/icons/cross_grey_small.png';  ?>"
                title="Close this notification" alt="close"/></a>
        <div>
            <?php   echo $val_error_msg;  ?>        </div>
    </div>

    <div id="ajax-form"  class='form'>
<?php   $formId='elective-group-form';
   $actionUrl =
   ($model->isNewRecord)?CController::createUrl('electiveGroups/ajax_create')
                                                                 :CController::createUrl('electiveGroups/ajax_update');


    $form=$this->beginWidget('CActiveForm', array(
     'id'=>'elective-group-form',
    //  'htmlOptions' => array('enctype' => 'multipart/form-data'),
         'action' => $actionUrl,
    // 'enableAjaxValidation'=>true,
      'enableClientValidation'=>true,
     'focus'=>array($model,'name'),
     'errorMessageCssClass' => 'input-notification-error  error-simple png_bg',
     'clientOptions'=>array('validateOnSubmit'=>true,
                                        'validateOnType'=>false,
                                        'afterValidate'=>'js_afterValidate',
                                        'errorCssClass' => 'err',
                                        'successCssClass' => 'suc',
                                        'afterValidate' => 'js:function(form,data,hasError){ $.js_afterValidate(form,data,hasError);  }',
                                         'errorCssClass' => 'err',
                                        'successCssClass' => 'suc',
                                        'afterValidateAttribute' => 'js:function(form, attribute, data, hasError){
                                                                                                 $.js_afterValidateAttribute(form, attribute, data, hasError);
                                                                                                                            }'
                                                                             ),
));

     ?>
    <?php echo $form->errorSummary($model, '
    <div style="font-weight:bold">Please correct these errors:</div>
    ', NULL, array('class' => 'errorsum notification errorshow png_bg')); ?>  


    <div class="row">
            <?php echo $form->labelEx($model,Yii::t('Electivegroups','name'),array('style'=>'color:#222222;')); ?>
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>80)); ?>
        <span id="success-SubjectName_name"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'name'); ?>
    </div>

        <div class="row">
            <?php echo $form->labelEx($model,Yii::t('Electivegroups','code'),array('style'=>'color:#222222;')); ?>
            <?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>120)); ?>
        <span id="success-SubjectName_code"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'code'); ?>
    </div>

        <div class="row" >
            <?php echo $form->labelEx($model,Yii::t('Electivegroups','max_weekly_classes'),array('style'=>'color:#000000')); ?>
            <?php echo $form->textField($model,'max_weekly_classes'); ?>
        <span id="success-Subjects_max_weekly_classes"
              class="hid input-notification-success  success png_bg right" ></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'max_weekly_classes'); ?>
    </div>
    
        <div class="row">
            <?php //echo $form->labelEx($model,'is_deleted'); ?>
            <?php echo $form->hiddenField($model,'is_deleted'); ?>
        <span id="success-Subjects_is_deleted"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'is_deleted'); ?>
    </div>
        
        <div class="row">
            
            <?php  if($model->created_at == NULL)
			  {
				   //echo $form->labelEx($model,'created_at'); 
				   echo $form->hiddenField($model,'created_at',array('value'=>date('Y-m-d')));
				   if(!isset($batch_id))
				   {
				   	echo $form->hiddenField($model,'batch_id',array('value'=>$_POST['batch_id']));
				   }
			  }
			  else
			  {
				  //echo $form->labelEx($model,'updated_at');
				  echo $form->hiddenField($model,'updated_at',array('value'=>date('Y-m-d'))); 
			  }
			  
		  ?>
            
        <span id="success-Subjects_created_at"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'created_at'); ?>
    </div>
        
    <input type="hidden" name="YII_CSRF_TOKEN"
           value="<?php echo Yii::app()->request->csrfToken; ?>"/>

    <?php  if (!$model->isNewRecord): ?>    <input type="hidden" name="update_id"
           value=" <?php echo $model->id; ?>"/>
    <?php endif; ?>
    <div class="row buttons" style="width:30%">
        <?php   echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save',array('class'=>'formbut','id' => 'btn', 'name' => 'bbtn', 'title' => 'Save')); ?>
    </div>

  <?php  $this->endWidget(); ?></div>
    <!-- form -->

</div>
<script type="text/javascript">

    //Close button:

    $(".close").click(
            function () {
                $(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
                    $(this).slideUp(600);
                });
                return false;
            }
    );


</script>
<script>
    $(document).ready(function(){
        $("#applicants-form").submit(function(){
            $("#btn").attr('disabled','true');
        });
    });''
    </script>


