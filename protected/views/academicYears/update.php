<?php
$this->breadcrumbs=array(
	'Settings'=>array('/configurations'),
	'Academic Years'=>array('create'),
	'Update',
);


?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1><?php echo Yii::t('employees','Update Academic Year');?></h1>
 <div class="edit_bttns" style="top:20px; right:20px;">
                    <ul>
                        <li> <?php echo CHtml::link(Yii::t('academicYears', '<span>Add Academic Year</span>'), array('create'), array('class' => 'addbttn last ')); ?></li>
                        <li> <?php echo CHtml::link(Yii::t('academicYears', '<span>Manage Academic Years</span>'), array('admin'), array('class' => 'addbttn last ')); ?></li>

                    </ul>
                </div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
    </td>
  </tr>
</table>