<?php
$this->breadcrumbs=array(
	'Examination'=>array('default/index'),
	'New',
);


?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
     <?php $this->renderPartial('/dashboard/left_side');?>
    
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
    <h1><?php echo Yii::t('examination','Create New Exam');?></h1>
    <div class="edit_bttns" style="top:15px; right:20px;">
                    <ul>
                        <li> <?php echo CHtml::link(Yii::t('examination', '<span>Back</span>'), array('exam/'), array('class' => 'addbttn last ')); ?></li>
                    </ul>
                </div>
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

    </div>
    
    </td>
  </tr>
</table>
 
