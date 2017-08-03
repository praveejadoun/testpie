<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Subject Association',
);


?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <div class="emp_cont_left">
   <?php $this->renderPartial('profileleft');?>
    
    </div>
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
    
    <h1 style="margin-top:.67em;"><?php echo Yii::t('employees','Employee Profile : ');?><?php echo $model->first_name.'&nbsp;'.$model->last_name; ?><br /></h1>
        
    <div class="edit_bttns last">
    <ul>
    <li>
    <?php echo CHtml::link(Yii::t('employees','<span>Edit</span>'), array('update', 'id'=>$_REQUEST['id']),array('class'=>' edit ')); ?>
    </li>
     <li>
    <?php echo CHtml::link(Yii::t('employees','<span>Employees</span>'), array('employees/manage'),array('class'=>'edit last'));?>
    </li>
    </ul>
    </div>
    
    
    <div class="clear"></div>
    
   <div class="emp_right_contner" style="min-height: 130px;" >
    <div class="emp_tabwrapper">
    <div class="emp_tab_nav">
    <ul style="width:998px;">
    <li><?php echo CHtml::link(Yii::t('employees','Profile'), array('view', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Address'), array('address', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Contact'), array('contact', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Additional Info'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Achievments'), array('achievements', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Log'), array('log', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Documents'), array('documents', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Attendance'), array('attendance', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','SubjectAssociation'), array('subjectassociation', 'id'=>$_REQUEST['id']),array('class'=>'active')); ?></li>
    </ul>
    </div>
    </div>
  
    <h2>Subject Association</h2>
     <div class="ea_pdf" style="top:160px; right:6px;">
 <?php echo CHtml::link('<img src="images/pdf-but.png">', array('employees/printpdf1'),array('target'=>'_blank')); ?>
	</div>
     </div>
    <h3 style="color:#09c;">SUBJECT</h3>
     <div class="table_listbx">
     <?php
     
             
                $posts= EmployeesSubjects::model()->findAll("employee_id=:x AND elective_id=:y ", array(':x'=>$_REQUEST['id'],':y'=>'0'));
			
                ?>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tr class="listbxtop_hdng">
                    <td align="center"><?php echo Yii::t('Employees','Name');?></td>
                    <td align="center" ><?php echo Yii::t('Employees','Batch');?></td>
                    <td align="center"><?php echo Yii::t('Employees','Course');?></td>
                    </tr>
                    <?php
				 $i=0;
								$i++;		
                        foreach($posts as $posts_1)
                            {
                            ?>               
                    <tr>  
                        <?php $sub = Subjects::model()->findByAttributes(array('id'=>$posts_1->subject_id));?>
                        <td align="center"><?php echo $sub->name ;?></td>
                        <?php $batc = Batches::model()->findByAttributes(array('id'=>$sub->batch_id))?>
                        <td align="center"><?php echo $batc->name?></td>
                         <?php $cou = Courses::model()->findByAttributes(array('id'=>$batc->course_id)) ?> 
                        <td align="center"><?php echo $cou->course_name;?></td>
                        
                    </tr>					
                                                              
                   
								
                            <?php } ?>
                            
                    </table>
              
    
    
   

 
    </div>
    <h3 style="color:#09c;">ELECTIVES</h3>
     <div class="table_listbx">
     <?php
     
             
                $posts= EmployeesSubjects::model()->findAll("employee_id=:x AND subject_id=:y ", array(':x'=>$_REQUEST['id'],':y'=>'0'));
				
                ?>
         
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tr class="listbxtop_hdng">
                    <td align="center"><?php echo Yii::t('Employees','Elective Name');?></td>
                     <td align="center"><?php echo Yii::t('Employees','Elective Group');?></td>
                    <td align="center" ><?php echo Yii::t('Employees','Batch');?></td>
                    <td align="center"><?php echo Yii::t('Employees','Course');?></td>
                    </tr>
                    <?php
				 $i=0;
								$i++;		
                        foreach($posts as $posts_1)
                            {
                            ?>               
                    <tr>  
                        <?php $elect = Electives::model()->findByAttributes(array('id'=>$posts_1->elective_id));?>
                        <td align="center"><?php echo $elect->name ;?></td>
                         <?php $group = ElectiveGroups::model()->findByAttributes(array('id'=>$elect->elective_group_id));?>
                        <td align="center"><?php echo $group->name;?></td>
                         <?php $batc = Batches::model()->findByAttributes(array('id'=>$group->batch_id));?>
                        <td align="center"><?php echo $batc->name;?></td>
                        <?php $cou = Courses::model()->findByAttributes(array('id'=>$batc->course_id));?>
                        <td align="center"><?php echo $cou->course_name; ?></td>
                    </tr>					
                                                              
                   
								
                            <?php } ?>
                    </table>
              
    
    
   

 
    </div>
    
    
      </div>
   
    </td>
  </tr>
</table>