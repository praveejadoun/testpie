<?php
$this->breadcrumbs=array(
	'Employees'=>array('index'),
	'View',
);

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
 <?php $this->renderPartial('profileleft');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1 ><?php echo Yii::t('employees','Employee Profile :');?><?php echo $model->first_name.'&nbsp;'.$model->last_name; ?><br /></h1>
<div class="edit_bttns">
    <ul>
    <li><?php echo CHtml::link(Yii::t('employees','<span>Edit</span>'), array('update', 'id'=>$_REQUEST['id']),array('class'=>'edit last')); ?><!--<a class=" edit last" href="">Edit</a>--></li>
     <li><?php echo CHtml::link(Yii::t('employees','<span>Employees</span>'), array('employees/manage'),array('class'=>'edit last')); ?><!--<a class=" edit last" href="">Edit</a>--></li>
    </ul>
    </div>
    
    <div class="emp_right_contner">
    <div class="emp_tabwrapper">
    <div class="emp_tab_nav">
    <ul style="width:998px;">
    <li><?php echo CHtml::link(Yii::t('employees','Profile'), array('view', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Address'), array('address', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Contact'), array('contact', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Additional Info'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Achievments'), array('achievments', 'id'=>$_REQUEST['id']),array('class'=>'active')); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Log'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Documents'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Attendance'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','SubjectAssociation'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
    </ul>
    </div>
    <div class="clear"></div>
<?php  $list = Employees::model()->findAll("id=:x", array(':x'=>$_REQUEST['id']));?>
                          <div class="emp_cntntbx">
                            <div class="document_table">
                            	                                <table width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr >
                                       <td align="center" style="border:1px solid #D1E0EA;"><h2>Achievement Details</h2></td>
                                    </tr>
                                </tbody>
                                </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none;">
                                    <tr  >
                                    <td align="center" width="125" ><strong>Achievement Title</strong></td>
                                    <td align="center" width="150"><strong>Description</strong></td>
                                    <td align="center" width="100"><strong>Document Name</strong></td>                                    
                                    <td align="center" width="150"><strong>Actions</strong></td>
                                    </tr>
                                    <?php	if($list!=null){      ?>                                          
                                        
                            <?php 
                                        if(isset($_REQUEST['page']))
                            {
                            	$i=($pages->pageSize*$_REQUEST['page'])-9;
                           }
                            else
                            {
                            	$i=1;
                            }
                            $cls="even";
                            ?>
                            
                            <?php 
							foreach($list as $list_1)
                            {
							?>
                                <tr class=<?php echo $cls;?>>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $list_1->achievement_title ?></td>
                                <td><?php echo $list_1->achievement_description ?></td>
                                <td><?php echo $list_1->achievement_document_name ?></td>
                                </tr>    
                                                    
                           <?php      }                  
				}?>								
                                                                            </table>
                              
                            </div>
                           </div> <!-- END div class="emp_cntntbx" -->

 <?php echo $this->renderPartial('_form_3', array('model'=>$model)); ?>
</div>
</div>
</div>
    
    </td>
  </tr>
</table>



<style type="text/css">
.document_table {
    padding: 0px 0px;
    margin: 0px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    border-top: 1px #d1e0ea solid;
    border-right: 1px #d1e0ea solid;
    border-left: 1px #d1e0ea solid;
}
</style>