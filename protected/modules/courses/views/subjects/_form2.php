<div class="formCon">

<div class="formConInner">
<?php 
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subjects-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
 ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <table width="60%" border="0" cellspacing="0" cellpadding="0">
      
        <tr>
    <td><?php echo $form->labelEx($model,Yii::t('Subjects','course_id')); ?></td>
     <?php
		$criteria=new CDbCriteria;
		$criteria->condition='is_deleted=:is_del';
		$criteria->params=array(':is_del'=>0);
	?>
    <td><div><?php // echo $form->dropDownList($model,'course_id',CHtml::listData(Courses::model()->findAll($criteria),'id','concatened'),array('prompt' =>'select','options'=>array($_REQUEST['val1']=>array('selected'=>'selected')))); ?>
		
      <?php  
      echo $form->dropDownList($model, 'course_id', CHtml::listData(Courses::model()->findAll($criteria),'id','concatened'),
        array(
            'class' => 'form-control',
            'prompt' => 'Select the Course',
            'style'=>'width:177px !important',
            'options'=> array($_REQUEST['val1']=>array('selected'=>'selected')),
            'ajax' => array(
                'type' => 'POST',
                'url' => CController::createUrl('Subjects/getCitiesByCountryId'),
                'update' => '#batch_id',
                'data' => array('course_id' => 'js:this.value'),
            )
        )
    );
     
      ?>
        
        
        
        
        <?php echo $form->error($model, 'course_id'); ?></div></td>
  </tr> 
  <tr><td>&nbsp;</td></tr>
       <tr>
    <td><?php echo $form->labelEx($model,Yii::t('subjects','batch_id')); ?></td>
    <td><?php // echo $form->dropDownList($model,'batch_id',CHtml::listData(Batches::model()->findAll('course_id=:x',array(":x"=>$_REQUEST['val1'])),'id','name'),array('prompt' =>'select Batch','multiple'=>'multiple')); ?>
		
         <?php 
   
    if(empty($model->course_id)){
        $cid = $_REQUEST['val1'];
    }else{
        $cid = $model->course_id;
    }
    
    
    echo $form->dropDownList(
        $model, 
        'batch_id', 
        CHtml::listData(
            Batches::model()->findAll(
                array(
                    'condition' => 'course_id="' . $cid . '" AND is_deleted=0' 
                    
                )
            ), 
            'id', 
            'name'
        ), 
        array(
            'class' => 'form-control', 
            'style'=>'width:177px !important',
            'id' => 'batch_id',
            'options'=> array(41=>array('selected'=>'selected')),
            'multiple'=>'multiple'
        )
    );
//    echo $form->error($model, 'city_id', array('class' => 'help-block small')); 
    ?>
        
        
        
        <?php echo $form->error($model,'batch_id'); ?></td>
  </tr>
   <tr><td>&nbsp;</td></tr>
   <tr>
    <td><?php echo $form->labelEx($model,Yii::t('subjects','name')); ?></td>
   <td><?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model, 'name'); ?></td>
   
 </tr>
 <tr><td>&nbsp;</td></tr>
 <tr>
    <td><?php echo $form->labelEx($model,Yii::t('subjects','max_weekly_classes')); ?></td>
    <td><?php echo $form->textField($model,'max_weekly_classes'); ?>
		<?php echo $form->error($model,'max_weekly_classes'); ?></td>
        
 </tr>

 
  <tr><td>&nbsp;</td></tr>
  
   <tr>
       <td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'formbut','id' => 'btn', 'name' => 'bbtn', 'title' => 'Save')); ?>
           </td> 
  </tr>
    </table>
<?php $this->endWidget(); ?>
    </div>
</div><!-- form -->
<script>
    $(document).ready(function(){
        $("#subjects-form").submit(function(){
            $("#btn").attr('disabled','true');
        });
    });''
    </script>


