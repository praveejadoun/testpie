<?php
$this->breadcrumbs=array(
	'Gateways'=>array('admin'),
	'settings',
);?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/employees/left_side');?>
    
    </td>
    

<?php echo $this->renderPartial('_form1', array('model'=>$model)); ?>
</div>
    </td>
  </tr>
</table>

