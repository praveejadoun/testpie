
<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Create',
);


?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">

<h1><?php echo Yii::t('students','New Admission');?></h1>

<?php echo $this->renderPartial('_form_1', array('model'=>$model)); ?>
 	</div>
    </td>
  </tr>
</table>