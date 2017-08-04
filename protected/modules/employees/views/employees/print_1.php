<style>
.listbxtop_hdng
{
	font-size:15px;	
	/*color:#1a7701;*/
	/*text-shadow: 0.1em 0.1em #FFFFFF;*/
	/*font-weight:bold;*/
	text-align:left;
	
}
.table_listbx tr td, tr th {
border-left:1px solid #ccc;
border-top:1px solid #ccc;
border-right:1px solid #ccc;

}
td.listbx_subhdng
{
	color:#333333;
	font-size:13px;	
	font-weight:bold;
	width:0px;
		
}

.odd
{
	background:#DFDFDF;
}
td.subhdng_nrmal
{
	color:#333333;
	font-size:14px;
	width:450px;	
}
.table_listbx
{
	margin:0px;
	padding:0px;
	/*width:1061px;*/
	
}
.table_listbx td
{
	padding:10px 0px 10px 10px;
	margin:0px;
	
	
}
.table_listbxlast td
{
	border-bottom:none;
	
}


td.subhdng_nrmal
{
	color:#333333;
	font-size:12px;	
}
.last
{
	border-bottom:1px solid #ccc;
}
.first
{
	border:none;
}
</style>
<div class="atnd_Con" style="padding-left:20px; padding-top:30px;">
<!-- Header -->
	<div style="border-bottom:#666 1px; width:700px; padding-bottom:20px;">
        <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td class="first">
                           <?php $logo=Logo::model()->findAll();?>
                            <?php
                            if($logo!=NULL)
                            {
                                //Yii::app()->runController('Configurations/displayLogoImage/id/'.$logo[0]->primaryKey);
                                echo '<img src="uploadedfiles/school_logo/'.$logo[0]->photo_file_name.'" alt="'.$logo[0]->photo_file_name.'" class="imgbrder" width="100%" />';
                            }
                            ?>
                </td>
                <td align="center" valign="middle" class="first" style="width:300px;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="listbxtop_hdng first" style="text-align:left; font-size:22px; width:300px;  padding-left:10px;">
                                <?php $college=Configurations::model()->findAll(); ?>
                                <?php echo $college[0]->config_value; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="listbxtop_hdng first" style="text-align:left; font-size:14px; padding-left:10px;">
                                <?php echo $college[1]->config_value; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="listbxtop_hdng first" style="text-align:left; font-size:14px; padding-left:10px;">
                                <?php echo 'Phone: '.$college[2]->config_value; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <!-- End Header -->
<?php
  if(isset($_REQUEST['id']))
  {
?>
	<?php $emp= EmployeesSubjects::model()->findAll("employee_id=:x ", array(':x'=>$_REQUEST['id']));?>
    <span align="center"><h4>Teacher Subject Association</h4></span><br/>
   <span  style="font-size:15px;"> <?php echo Yii::t('employees','Employee Name : ');?><?php foreach($emp as $emp_1){$res = Employees::model()->findByAttributes(array('id'=>$emp_1->employee_id));}echo $res->first_name.'&nbsp;'.$res->last_name; ?></span><br /><br />
     <span style="font-size:15px;">Subjects</span><br /><br />
    <table style="border-collapse:collapse;width:1000px;">
      
         <tr >
            <td style="border: 1px solid #dddddd;padding: 8px;width:24%;text-align: center"><?php echo Yii::t('employees','<strong>Name</strong>');?></td>
             <td style="border: 1px solid #dddddd;padding: 8px;text-align: center;width:24%;"><?php echo Yii::t('employees','<strong>Course</strong>');?></td>
             <td style="border: 1px solid #dddddd;padding: 8px;text-align: center;width:24%;"><?php echo Yii::t('employees','<strong>Batch</strong>');?></td>
           
        </tr>
        <?php $posts= EmployeesSubjects::model()->findAll("employee_id=:x AND elective_id=:y ", array(':x'=>$_REQUEST['id'],':y'=>'0'));?>
        <?php  foreach($posts as $posts_1)
                            {?>
        <tr>
         
             <td style="border: 1px solid #dddddd;padding: 8px;width:24%;text-align: center"> 
                 <?php 
                $sub = Subjects::model()->findByAttributes(array('id'=>$posts_1->subject_id));
                 echo $sub->name ;
                 ?>
             </td>
             <td style="border: 1px solid #dddddd;padding: 8px;width:24%;text-align: center"> <?php $batc = Batches::model()->findByAttributes(array('id'=>$sub->batch_id));echo $batc->name;?></td>	
	     <td style="border: 1px solid #dddddd;padding: 8px;width:24%;text-align: center"> <?php $cou = Courses::model()->findByAttributes(array('id'=>$batc->course_id));echo $cou->course_name;?></td>		
                        
        </tr>
                            <?php } ?>
    </table>
    
    
    
    
    <br /><br />
     <span style="font-size:15px;">Electives</span>
    <br /><br />
     <table style="border-collapse:collapse;width:1000px;">
      
         <tr >
            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center;"><?php echo Yii::t('employees','<strong>Elective Name</strong>');?></td>
             <td style="border: 1px solid #dddddd;padding: 8px;text-align: center;width:18%;"><?php echo Yii::t('employees','<strong>Elective Group</strong>');?></td>
             <td style="border: 1px solid #dddddd;padding: 8px;text-align: center;width:18%;"><?php echo Yii::t('employees','<strong>Course</strong>');?></td>
             <td style="border: 1px solid #dddddd;padding: 8px;text-align: center;width:18%;"><?php echo Yii::t('employees','<strong>Batch</strong>');?></td>

        </tr>
               <?php $posts= EmployeesSubjects::model()->findAll("employee_id=:x AND subject_id=:y ", array(':x'=>$_REQUEST['id'],':y'=>'0'));?>
        <?php  foreach($posts as $posts_1)
                            {?>
        <tr>
         
             <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center;"> 
                 <?php 
                $elect = Electives::model()->findByAttributes(array('id'=>$posts_1->elective_id));
                 echo $elect->name ;
                 ?>
             </td>
             <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center;"> <?php $group = ElectiveGroups::model()->findByAttributes(array('id'=>$elect->elective_group_id));echo $group->name;?></td>	
	     <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center;"> <?php $batc = Batches::model()->findByAttributes(array('id'=>$group->batch_id));echo $batc->name;?></td>		
             <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center;"> <?php $cou = Courses::model()->findByAttributes(array('id'=>$batc->course_id));echo $cou->course_name;?></td>		
          
        </tr>
                            <?php } ?>
    </table>
    
<?php 
  }
?>
</div>