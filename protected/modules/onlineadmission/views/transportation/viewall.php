<?php
$this->breadcrumbs=array(
	'Transport'=>array('default/index'),
	'Transportation Fee Management'=>array('transportation/viewall'),
	'Viewall',
);


?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
      <?php $this->renderPartial('/transportation/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1><?php echo Yii::t('transportation','Transportation Fee');?></h1>


</div>
    </td>
  </tr>
</table>