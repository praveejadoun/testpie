<?php
$this->breadcrumbs=array(
        'Timetable'=>array('/timetable'),
	'System Default Weekdays',
);
?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
  
   
   <?php 
		 $this->renderPartial('/weekdays/left_side');
	
	?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
    <!--<div class="searchbx_area">
    <div class="searchbx_cntnt">
    	<ul>
        <li><a href="#"><img src="images/search_icon.png" width="46" height="43" /></a></li>
        <li><input class="textfieldcntnt"  name="" type="text" /></li>
        </ul>
    </div>
    
    </div>-->
    
    
        
    <!--<div class="edit_bttns">
    <ul>
    <li>
    <a class=" edit last" href="#">Edit</a>    </li>
    </ul>
    </div>-->
    
    
    <div class="clear"></div>
    <div class="emp_right_contner">
    <div class="emp_tabwrapper">
    
        
    <div class="clear"></div>
    <div class="emp_cntntbx" style="padding-top:10px;">
    
<div class="formCon">

<div class="formConInner" style="padding-top:10px; font-size:14px; font-weight:bold;">
<h3>System Default Week Days</h3>
<?php
    Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
       CClientScript::POS_READY
    );
?>
 
<?php if(Yii::app()->user->hasFlash('notification')):?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('notification'); ?>
    </div>
<?php endif; ?>

<?php   

$models = Batches::model()->findAll("is_deleted=:x", array(':x'=>'0'));
				$data = array();
				$data['NULL'] = 'common';
				foreach ($models as $model_1)
				{
					$posts=Batches::model()->findByPk($model_1->id);
					$data[$model_1->id] = $model_1->name;
				}
	?>
     <div class="bbtb">
    <!--<h3>Set Weekdays For :&nbsp;-->
<?php
//echo CHtml::dropDownList('mydropdownlist','mydropdownlist',$data,array('onchange'=>'getid();','id'=>'drop','options'=>array($_REQUEST['id']=>array('selected'=>true))));
                 ?> <!--</h3>-->
 <?php $form=$this->beginWidget('CActiveForm', array('id'=>'courses-form','enableAjaxValidation'=>false,)); ?>
      
      <!-- Default one -->
       <?php
	  
		  
		  $batch = $model->findAll("batch_id IS NULL");
		  ?>
          <div class="bbtb" style="color:#000; font-size:14px;">
        
         <table width="100%" cellspacing="0" cellpadding="0">
         <tr>
           <td width="4%"><?php
			  if($batch[0]['weekday']==1)
			  echo $form->checkBox($model,'sunday',array('value'=>'1','checked'=>'checked','class'=>'styled'));
			  else
			   echo $form->checkBox($model,'sunday',array('value'=>'1','class'=>'styled')); ?></td>
             <td width="85%"><?php echo Yii::t('weekdays','Sunday');?></td>
             <td width="11%">&nbsp;</td>
         </tr>
         <tr>
         	<td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
         </tr>
         <tr>
           <td><?php
			 if($batch[1]['weekday']==2)
			   echo $form->checkBox($model,'monday',array('value'=>'2','checked'=>'checked','class'=>'styled'));
			 else
			  echo $form->checkBox($model,'monday',array('value'=>'2','class'=>'styled')); ?></td>
             <td><?php echo Yii::t('weekdays','Monday');?></td>
             <td>&nbsp;</td>
         </tr>
          <tr>
         	<td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
         </tr>
         <tr>
           <td><?php
			  if($batch[2]['weekday']==3)
			  echo $form->checkBox($model,'tuesday',array('value'=>'3','checked'=>'checked','class'=>'styled')); 
			  else
			   echo $form->checkBox($model,'tuesday',array('value'=>'3','class'=>'styled')); 
			  ?></td>
             <td><?php echo Yii::t('weekdays','Tuesday');?></td>
             <td>&nbsp;</td>
         </tr>
          <tr>
         	<td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
         </tr>
         <tr>
           <td><?php
			 if($batch[3]['weekday']==4)
			  echo $form->checkBox($model,'wednesday',array('value'=>'4','checked'=>'checked','class'=>'styled'));
			  else
			  echo $form->checkBox($model,'wednesday',array('value'=>'4','class'=>'styled'));
			   ?></td>
             <td><?php echo Yii::t('weekdays','Wednesday');?></td>
             <td>&nbsp;</td>
         </tr>
          <tr>
         	<td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
         </tr>
         <tr>
           <td><?php
			  if($batch[4]['weekday']==5)
			  echo $form->checkBox($model,'thursday',array('value'=>'5','checked'=>'checked','class'=>'styled'));
			  else
			  echo $form->checkBox($model,'thursday',array('value'=>'5','class'=>'styled'));
			   ?></td>
             <td><?php echo Yii::t('weekdays','Thursday');?></td>
             <td>&nbsp;</td>
         </tr>
          <tr>
         	<td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
         </tr>
         <tr>
           <td><?php
			  if($batch[5]['weekday']==6)
			  echo $form->checkBox($model,'friday',array('value'=>'6','checked'=>'checked','class'=>'styled'));
			  else
			   echo $form->checkBox($model,'friday',array('value'=>'6','class'=>'styled'));
			   ?></td>
             <td><?php echo Yii::t('weekdays','Friday');?></td>
             <td>&nbsp;</td>
         </tr>
          <tr>
         	<td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
         </tr>
         <tr>
           <td><?php
			  if($batch[6]['weekday']==7)
			  echo $form->checkBox($model,'saturday',array('value'=>'7','checked'=>'checked','class'=>'styled'));
			  else
			  echo $form->checkBox($model,'saturday',array('value'=>'7','class'=>'styled'));
				 ?></td>
             <td><?php echo Yii::t('weekdays','Saturday');?></td>
             <td>&nbsp;</td>
         </tr>
         </table>
         
         </div><br />
      
      <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('class'=>'formbut')); ?>          
   <?php $this->endWidget(); ?>              
</div>
</div>
</div>
</div>
</div>
</div></div>
    </td>
  </tr>
</table>
