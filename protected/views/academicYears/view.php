<?php
$this->breadcrumbs=array(
	'Academic Years'=>array('admin'),
	$model->name,
);

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1><?php echo Yii::t('employees','View Academic Year');?></h1>
 <div class="edit_bttns" style="top:20px; right:20px;">
                    <ul>
                        <li> <?php echo CHtml::link(Yii::t('academicYears', '<span>Edit</span>'), array('update','id'=>$_REQUEST['id']), array('class' => 'addbttn last ')); ?></li>
                        <li> <?php echo CHtml::link(Yii::t('academicYears', '<span>Manage Academic Years</span>'), array('admin'), array('class' => 'addbttn last ')); ?></li>

                    </ul>
                </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'name',
		'description',
                'start_date',
                'end_date',
                'status'
		
	),
)); ?>
</div>
    </td>
  </tr>
</table>