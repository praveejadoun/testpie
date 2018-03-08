
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transaction-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>


    <div class="formCon" style="background:url(images/yellow-pattern.png); width:100%; border:0px #fac94a solid; color:#000;">
     
    </div>
    <div class="formCon">
        <div class="formConInner">
            <p class="note">Fields with <span class="required">*</span> are required.</p>
             <table width="92%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td valign="bottom" ><?php echo $form->labelEx($model,Yii::t('FinanceFeeTransactions','date <span class="required">*</span>')); ?></td>
                <td valign="bottom"><?php echo $form->labelEx($model,Yii::t('FinanceFeeTransactions','Payment_type_id <span class="required">*</span>')); ?></td>
                <!--<td valign="bottom"><?php // echo $form->labelEx($model,Yii::t('FinanceFeeTransactions','transaction_id')); ?></td>-->
                       <td>&nbsp;</td>
                      
                </tr>
                
                  <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                
                 <tr>
                    <td valign="bottom">
                          <?php
                    //echo $form->textField($model,'date_of_birth');
                           $date = 'dd-mm-yy';
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        //'name'=>'Students[date_of_birth]',
                        'attribute' => 'date',
                        'model' => $model,
                        // additional javascript options for the date picker plugin
                        'options' => array(
                            'showAnim' => 'fold',
                            'dateFormat' => $date,
                            'changeMonth' => true,
                            'changeYear' => true,
                            'yearRange' => '1900:'
                        ),
                        'htmlOptions' => array(
                            'style' => 'width:197px;',
                            'readonly' => 'readonly'
                        ),
                    ));
                    ?>
                    <?php echo $form->error($model, 'date'); ?>
                </td>
                 <td valign="bottom"><?php echo $form->dropdownlist($model,'payment_type_id',CHtml::listData(PaymentTypes::model()->findAll(), 'id', 'type'), array('style' => 'width:180px;', 'empty' => 'Select Payment Type')); ?>
                            <?php echo $form->error($model,'payment_type_id'); ?></td>  
<!--                    <td valign="bottom"><?php // echo $form->textField($model,'transaction_id',array('size'=>25,'maxlength'=>255)); ?>
                            <?php // echo $form->error($model,'transaction_id'); ?></td>-->
                </tr>
                 <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                
                <tr>
                <td valign="bottom" ><?php echo $form->labelEx($model,Yii::t('FinanceFeeTransactions','description')); ?></td>
                <td valign="bottom"><?php echo $form->labelEx($model,Yii::t('FinanceFeeTransactions','amount <span class="required">*</span>')); ?></td>
                <!--<td valign="bottom"><?php //  echo $form->labelEx($model,Yii::t('FinanceFeeTransactions','transaction_id')); ?></td>-->
                       <!--<td>&nbsp;</td>-->
                      
                </tr>
                
                  <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                
                 <tr>
                    <td valign="bottom"><?php echo $form->textField($model,'description',array('size'=>30,'maxlength'=>255)); ?>
                            <?php echo $form->error($model,'description'); ?></td>
                    <td valign="bottom"><?php echo $form->textField($model,'amount',array('size'=>25,'maxlength'=>255)); ?>
                            <?php echo $form->error($model,'amount'); ?></td>  
<!--                    <td valign="bottom"><?php // echo $form->textField($model,'transaction_id',array('size'=>25,'maxlength'=>255)); ?>
                            <?php // echo $form->error($model,'transaction_id'); ?></td>-->
                   
<!--                     <td>-->
                    <?php
//                    if ($model->isNewRecord) {
//                        echo $form->fileField($model, 'file_data');
//                        echo $form->error($model, 'file_data');
//                    } else {
//                        if ($model->file_data == NULL) {
//                            echo $form->fileField($model, 'file_data');
//                            echo $form->error($model, 'file_data');
//                        } else {
//                            if (Yii::app()->controller->action->id == 'update') {
//                                echo CHtml::link(Yii::t('students', 'Remove'), array('Students/remove', 'id' => $model->id), array('confirm' => 'Are you sure?'));
//                                echo '<img class="imgbrder" src="' . $this->createUrl('Students/DisplaySavedImage&id=' . $model->primaryKey) . '" alt="' . $model->file_name . '" width="100" height="100" />';
//                            } else if (Yii::app()->controller->action->id == 'view') {
//                                echo CHtml::hiddenField('file_name', $model->file_name);
//                                echo CHtml::hiddenField('file_content_type', $model->file_content_type);
//                                echo CHtml::hiddenField('file_size', $model->file_size);
//                                echo CHtml::hiddenField('file_data', bin2hex($model->file_data));
//                                echo '<img class="imgbrder" src="' . $this->createUrl('Students/DisplaySavedImage&id=' . $model->primaryKey) . '" alt="' . $model->file_name . '" width="100" height="100" />';
//                            }
//                        }
//                    }
                    ?>
<!--                </td>       -->
                            
                            
                            
                            
                            
<!--                    <td>-->
                    <?php
		
		
//		if($model->isNewRecord)
//		{
//			echo $form->fileField($model,'file_data'); 
//		    echo $form->error($model,'file_data'); 
//		}
//		else
//		{
//			if($model->file_data==NULL)
//			{
//				echo $form->fileField($model,'file_data'); 
//		        echo $form->error($model,'file_data'); 
//			}
//			
//			else
//			{
//				if(Yii::app()->controller->action->id=='update') {
//					echo CHtml::link(Yii::t('students','Remove'), array('Employees/remove', 'id'=>$model->id),array('confirm'=>'Are you sure?')); 
//					echo '<img class="imgbrder" src="'.$this->createUrl('Employees/DisplaySavedImage&id='.$model->primaryKey).'" alt="'.$model->file_name.'" width="100" height="100" />';	
//				}
//				else if(Yii::app()->controller->action->id=='view') {
//					echo CHtml::hiddenField('file_name',$model->file_name);
//					echo CHtml::hiddenField('file_content_type',$model->file_content_type);
//					echo CHtml::hiddenField('file_size',$model->file_size);
//					echo CHtml::hiddenField('file_data',bin2hex($model->file_data));
//					echo '<img class="imgbrder" src="'.$this->createUrl('Employees/DisplaySavedImage&id='.$model->primaryKey).'" alt="'.$model->file_name.'" width="100" height="100" />';
//				}
//			}
//		}
		
		 ?>
        
        <!--</td>-->
                </tr>
             </table>  
            <br>
            <div class="row">
                <?php echo "Please Upload A File" ?>
                <br/><br/>
                <?php echo $form->fileField($model,'file_data'); ?>
                <?php echo $form->error($model,'file_data'); ?>
            </div>
            <div class="row">
				<?php //echo $form->labelEx($model,'updated_at'); ?>
                <?php echo $form->hiddenField($model,'created_at',array('value'=>date('Y-m-d'))); ?>
                <?php echo $form->error($model,'created_at'); ?>
            </div>
           <div class="row">
				<?php //echo $form->labelEx($model,'updated_at'); ?>
                <?php echo $form->hiddenField($model,'updated_at',array('value'=>date('Y-m-d'))); ?>
                <?php echo $form->error($model,'updated_at'); ?>
            </div>
            
            <div style="padding:10px 0 0 0px; text-align:left">
    	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'formbut')); ?>
    </div>
        </div>
    </div>


<?php $this->endWidget(); ?>
