<?php
$this->breadcrumbs=array(
	'Downloads'=>array('default/index'),
        'File Uploads'=>array('fileuploads/index'),
	'Create',
);


?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
     <?php $this->renderPartial('/fileuploads/left_side');?>
    
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
     <h1><?php echo Yii::t('fileuploads','Create File Uploads');?></h1>
    

    </div>
    
    </td>
  </tr>
</table>