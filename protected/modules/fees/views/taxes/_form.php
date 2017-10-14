<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'taxes-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
)); ?>

    
    <div class="formCon">
    <div class="formConInner">
    <div class="form">	

        <p class="note">Fields with <span class="required">*</span> are required.</p>
        
	<?php /*?><?php echo $form->errorSummary($model); ?><?php */?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><?php echo $form->labelEx($model,Yii::t('taxes','label'),array('style'=>'float:left')); ?></td>
            <td><?php echo $form->textField($model,'label',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'label'); ?>
            </td>
  
            <td><?php echo $form->labelEx($model,Yii::t('taxes','value'),array('style'=>'float:left')); ?></td>
            <td><?php echo $form->textField($model,'value',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'value'); ?>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,Yii::t('taxes','status'),array('style'=>'float:left')); ?></td>
    
            <td colspan="3" class="cr_align"><?php echo $form->radioButtonList($model,'status',array('Active'=>'Active','InActive'=>'Inactive'),array('separator'=>' ')); ?>
            <?php echo $form->error($model,'status'); ?></td>
        </tr>
        <tr>
            <td>
               <?php echo $form->hiddenField($model,'created_at',array('value'=>date('Y-m-d')));
		echo $form->error($model,'created_at'); ?>
            </td> 
             <td>
               <?php echo $form->hiddenField($model,'updated_at',array('value'=>date('Y-m-d')));
		echo $form->error($model,'updated_at'); ?>
            </td> 
        </tr>
    </table>

    <div class="clear"></div>
        <br />
    <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'formbut')); ?>
    </div>
    </div>
    </div>
    </div>
    
<?php $this->endWidget(); ?>