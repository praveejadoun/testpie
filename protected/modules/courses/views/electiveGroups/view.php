<?php
$this->breadcrumbs=array(
	'Elective Groups'=>array('/courses'),
	$model->name,
);


?>


<h1><?php echo Yii::t('Electivegroups','View Elective Group');?></h1>

<?php ?><?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'code',
		'batch_id',
		'no_exams',
		'max_weekly_classes',
		'elective_group_id',
		'is_deleted',
		'created_at',
		'updated_at',
	),
)); */

?>
<div class="tableinnerlist" style="padding-right:25px;">
<table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td><?php echo Yii::t('Electivegroups','Subject Name');?></td>
    <td><?php echo $model->name; ?></td>
  </tr>
    <tr>
    <td><?php echo Yii::t('Electivegroups','Subject Code');?></td>
    <td><?php echo $model->code; ?></td>
  </tr>
    <tr>
    <td><?php echo Yii::t('Electivegroups','Batch Name');?></td>
    <td><?php
    $posts=Batches::model()->findByAttributes(array('id'=>$model->batch_id));
	echo $posts->name;
	?></td>
  </tr>
    <!--<tr>
    <td><?php //echo Yii::t('Electivegroups','Max Weekly Classes');?></td>
    <td><?php //echo $model->max_weekly_classes; ?></td>
  </tr>-->
</table>
</div>