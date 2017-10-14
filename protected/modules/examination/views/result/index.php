<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
<?php
$this->breadcrumbs=array(
	'Examination'=>array('/examination'),
        'Result',
);
?>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
      <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1><?php echo Yii::t('result','Search Results');?></h1>
 <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>
    </td>
  </tr>
</table>
</body>