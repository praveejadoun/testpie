<?php
$this->breadcrumbs=array(
	'Academic Year'=>array('admin'),
	'Create',
);

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1><?php echo Yii::t('academicYears','New Academic Year Setup');?></h1>
<div class="edit_bttns" style="top:20px; right:20px;">
                    <ul>
                        <li> <?php echo CHtml::link(Yii::t('employees', '<span>Manage Academic Years</span>'), array('admin'), array('class' => 'addbttn last ')); ?></li>
                    </ul>
                </div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
    </td>
  </tr>
</table>