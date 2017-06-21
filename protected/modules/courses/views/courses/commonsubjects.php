<style>
#jobDialog123
{
	height:auto;
}
</style>


<?php $this->renderPartial('_flash');?>
<?php
 $this->breadcrumbs=array(
	'Courses',
);
?>

<?php 

         /*        $serverurl = "http://licence-server.open-school.org/news.php";
				 
				 $info['severname'] = Yii::app()->request->hostInfo.Yii::app()->request->baseUrl ;
				  // start a curl session
				  $ch = curl_init ($serverurl);
				  
				  // return the output, don't print it
				  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
				  
				  // set curl to send post data
				  curl_setopt ($ch, CURLOPT_POST, true);
				  
				  // set the post data to be sent
				  curl_setopt ($ch, CURLOPT_POSTFIELDS, $info);
				  
				  // get the server response
				  $result = curl_exec ($ch);
				  
				  // convert the json to an array
				  $result = json_decode($result, true); */
				  
				  
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="247" valign="top" id="port-left">
        	<?php $this->renderPartial('/courses/left_side');?>
        </td>
        <td valign="top">
            <div class="cont_right formWrapper">
                  <h1><?php echo Yii::t('courses','Common Subjects');?></h1>  
              
                     <?php 

$data = CHtml::listData(Courses::model()->findAll("is_deleted 	=:x", array(':x'=>0),array('order'=>'course_name DESC')),'id','course_name');
if(isset($_REQUEST['cou']))
{
	$sel= $_REQUEST['cou'];
}
else
{
	$sel='';
}
echo '<div style="float:left; width:380px;"><span style="font-size:14px; font-weight:bold; color:#666;">Course</span>&nbsp;&nbsp;&nbsp;&nbsp;';
echo CHtml::dropDownList('id','',$data,array('prompt'=>'Select','onchange'=>'course()','id'=>'cou','options'=>array($sel=>array('selected'=>true)))); 
echo '</div>';
echo '&nbsp;&nbsp;'; ?>
 <div class="contrht_bttns" >
     <ul>
      <li><?php echo CHtml::ajaxLink(Yii::t('Courses','Add Subject'),$this->createUrl('subjects/Addnew'),array(
        'onclick'=>'$("#jobDialog1").dialog("open"); return false;',
        'update'=>'#jobDialog1','type' =>'GET','data' => array( 'val1' =>$_REQUEST['cou'] ),'dataType' => 'text',),array('id'=>'showJobDialog12'.$_REQUEST['cou'],'class'=>'add')); 
      
         ?></li>
     </ul> 
 </div>                    
<?php 
$data_1= array();
if(isset($_REQUEST['cou']))
{
	$batches = Batches::model()->findAll("course_id=:x and is_deleted=:y", array(':x'=>$_REQUEST['cou'],':y'=>0));
	
	/*$data_1=Subjects::model()->findAll(array('join' => 'JOIN batches ON batch_id = batches.id','condition'=>'batches.course_id=:id', 
                  'params'=>array(':id'=>(int) $_REQUEST['cou'])));*/
	$data_1 = CHtml::listData(Subjects::model()->findAll(array('join' => 'JOIN batches ON batch_id = batches.id','condition'=>'batches.course_id=:id', 
                  'params'=>array(':id'=>(int) $_REQUEST['cou']))),'id','batchname');			  
				  
	 
}
?>
                    
<?php 
if(isset($_REQUEST['cou']))
{
	
$emp_sub = Subjects::model()->findAll("course_id=:x AND is_deleted=:y AND is_active=:z", array(':x'=>$_REQUEST['cou'],':y'=>0,':z'=>1));	

	if(count($emp_sub)==0)
	{
		echo '<br> <br>'.Yii::t('employees','<i>No Common Subjects Added.</i>').'<br> <br>';
	}
	else
	{
	?>
    
    <div class="clear"></div>
  <h3><?php echo Yii::t('employees','Currently Assigned:');?></h3>
  <div id="success" style="color:#F00; display:none;">Details Removed Successfully</div>

  <div class="tableinnerlist">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        
         <th><?php echo Yii::t('employees');?>Subject Name</th>
         <th><?php echo Yii::t('employees');?>Maximum Weekly Classes</th>
         <th><?php echo Yii::t('employees');?>Action</th>
      </tr>
    
   <?php 
   foreach($emp_sub as $emp_sub_1)
   { 
   ?>
     <tr>
    <td><?php 
	 
	echo $emp_sub_1->name?></td>
    <?php $batc = EmployeeDepartments::model()->findByAttributes(array('id'=>$emp_name->employee_department_id)); 
	if($batc!=NULL)
	{
		 ?>
		<td><?php echo $batc->name; ?></td> 
	<?php }
	else{?> <td><?php echo $emp_sub_1-> max_weekly_classes ?></td> <?php }?>
        
        <td> 
           

           <?php echo CHtml::ajaxLink(Yii::t('Subjects','Edit'),$this->createUrl('subjects/addupdate'),array(
        'onclick'=>'$("#jobDialog").dialog("open"); return false;',
        'update'=>'#jobDialog','type' =>'GET','data' => array( 'val1' =>$emp_sub_1->id,'course_id'=>$_REQUEST['cou'] ),'dataType' => 'text'),array('id'=>'showJobDialog123'.$emp_sub_1->id,'class'=>'add')); ?>
  
  <?php  echo CHtml::link(Yii::t('subjects','Remove'), array('deleterow', 'id'=>$emp_sub_1->id,'cou'=>$_REQUEST['cou'],), array('confirm' => 'Are you sure?','onclick'=>"show()")); ?>
     </tr>
    <?php } ?>
    </table>
   </div>
                  </div>
    <?php
	
	}?>
            
         
            </td>   
                </tr>
            </table>
       

<?php } ?>



<script language="javascript">
function course()
{
var id = document.getElementById('cou').value;
window.location= 'index.php?r=courses/courses/commonsubjects&cou='+id;	
}
function batch()
{
var id_1 = document.getElementById('cou').value;
var id = document.getElementById('sub').value;
window.location= 'index.php?r=employees/employeesSubjects/create&cou='+id_1+'&sub='+id;	
}
function departme()
{
var id_1 = document.getElementById('cou').value;
var id = document.getElementById('sub').value;
var dep = document.getElementById('depart').value;
window.location= 'index.php?r=employees/employeesSubjects/create&cou='+id_1+'&sub='+id+'&dept='+dep;		
}



function show()
{
	$("#success").css("display","block").animate({opacity: 1.0}, 3000).fadeOut("slow")
}
</script>