<script language="javascript">
function course()
{
var id = document.getElementById('search').value;
window.location= 'index.php?r=examination/result&search='+id;	
}
function batch()
{
var id_1 = document.getElementById('search').value;
var id = document.getElementById('stud').value;
window.location= 'index.php?r=examination/result&search='+id_1+'&stud='+id;	
}
function sunil()
{
var id = document.getElementById('cou').value;
window.location= 'index.php?r=examination/result&search=1&cou='+id;	
}
function kumar()
{
var id_1 = document.getElementById('cou').value;
var id = document.getElementById('sub').value;
window.location= 'index.php?r=examination/result&search=1&cou='+id_1+'&sub='+id;	
}
function vanam()
{
var id_1 = document.getElementById('cou').value;
var id = document.getElementById('sub').value;
var dep = document.getElementById('exm').value;
window.location= 'index.php?r=examination/result&search=1&cou='+id_1+'&sub='+id+'&exm='+dep;		
}
function dinesh()
{
var id_1 = document.getElementById('cou').value;
var id = document.getElementById('sub').value;
var dep = document.getElementById('exm').value;
var subject = document.getElementById('subj').value;
window.location= 'index.php?r=examination/result&search=1&cou='+id_1+'&sub='+id+'&exm='+dep+'&subj='+subject;		
}
</script>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'result-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="formCon" style="margin: 0px 0px 50px 0px">

<div class="formConInner" style="padding: 20px 15px;">
 
 <?php 

$data = array('1'=>'course','2'=>'student');
if(isset($_REQUEST['search']))
{
	$sel= $_REQUEST['search'];
}
else
{
	$sel='';
}
echo '<div style=""><span style="font-size:14px; font-weight:bold; color:#666;">Choose Search Option</span>&nbsp;&nbsp;&nbsp;&nbsp;';
echo CHtml::dropDownList('id','',$data,array('prompt'=>'Select','onchange'=>'course()','id'=>'search','options'=>array($sel=>array('selected'=>true)))); 
echo '</div>';
//echo '<div style="float:left; width:300px;"><span style="font-size:14px; font-weight:bold; color:#666;">Subject</span>&nbsp;&nbsp;'; ?>


<?php if($_REQUEST['search']== 2)
    {
    echo '<br><span style="font-size:14px; font-weight:bold; color:#666;">Students</span>&nbsp;&nbsp;';

    $data_1= array();
    if(isset($_REQUEST['search']))
    {
	//$batches = Batches::model()->findAll("course_id=:x and is_deleted=:y", array(':x'=>$_REQUEST['search'],':y'=>0));
	
	/*$data_1=Subjects::model()->findAll(array('join' => 'JOIN batches ON batch_id = batches.id','condition'=>'batches.course_id=:id', 
                  'params'=>array(':id'=>(int) $_REQUEST['cou'])));*/
	$data_1 = CHtml::listData(Students::model()->findAll("is_deleted 	=:x", array(':x'=>0),array('order'=>'first_name DESC')),'id','first_name');
			  
				  
	 
    }
    if(isset($_REQUEST['stud']))
    {
        $sel_1 = $_REQUEST['stud'];	
    }
    else
    {
	$sel_1 ='';
    }   
    echo CHtml::dropDownList('stud','',$data_1,array('prompt'=>'Select','onchange'=>'course()','id'=>'stud','onchange'=>'batch()','options'=>array($sel_1=>array('selected'=>true)))); 
 
    echo '<br/></div><div class="clear"></div>';

    ?>
    </div>
</div>
    <?php
    if(isset($_REQUEST['stud']))
    {
        echo '<h1 style="margin-left: 16px;">Exam Results</h1>';
        echo '<h3 style="margin-left: 16px;">Student Information</h3>';
    ?>    
         <div class="tablebx" style="margin:18px;"> 
	<table width="100%" cellspacing="0p" cellpadding="0" border="0">
    	<tr class="tablebx_topbg">
            <td>Admission No</td>
            <td>Student Name</td>
            <td>Batch</td>
            <td>Course</td>
        </tr> 
       
        <tr>
            <?php $student= Students::model()->findAll('is_deleted=:x AND id=:y',array(':x'=>0,':y'=>$_REQUEST['stud']));?>
            <td style="padding:8px 0px;"><?php foreach($student as $student_1){echo $student_1->admission_no;?></td>
    <td style="padding:8px 0px;"><?php echo $student_1->first_name;}?></td>
            <?php ?>
            <?php $bat=Batches::model()->findAll('is_deleted=:x AND id=:y',array(':x'=>0,':y'=>$student_1->batch_id)); ?>
            <td style="padding:8px 0px;"><?php foreach($bat as $batch){echo $batch->name;}?></td>
            <?php $cou= Courses::model()->findAll('is_deleted=:x AND id=:y',array(':x'=>0,':y'=>$batch->course_id));?>
            <td style="padding:8px 0px;"><?php foreach($cou as $course){echo $course->course_name;}?></td>
        </tr>
      
    </table>
    </div>
<?php echo '<h3 style="margin-left: 16px;">Result Report</h3>';?>
<?php  $std= Students::model()->findAll('is_deleted=:x AND id=:y',array(':x'=>0,':y'=>$_REQUEST['stud']));?>
<?php foreach($std as $std_1){$eg= ExamGroups::model()->findAll('batch_id=:x',array(':x'=>$std_1->batch_id));}?>
<?php foreach($eg as $eg_1){echo $eg_1->id;}$ex= Exams::model()->findAll('exam_group_id=:x',array(':x'=>$eg_1->id));foreach($ex as $ex_1){echo $ex_1->id;} ?>
<h4 style="margin-left: 16px;">Exam Name :<?php echo $eg_1->name; ?></h4>
 <div class="tablebx" style="margin:18px;"> 
	<table width="100%" cellspacing="0p" cellpadding="0" border="0">
    	<tr class="tablebx_topbg">
            <td>Subject</td>
            <td>Score</td>
            <td>Status</td>
            <td>Remarks</td>
        </tr> 
       
        <tr>
            <?php $Examscore= ExamScores::model()->findAll('student_id=:x ',array(':x'=>$_REQUEST['stud']))?>
            <?php foreach($Examscore as $Examscore_1){ $exam= Exams::model()->findAll('id=:x',array(':x'=>$Examscore_1->exam_id));?>
           <?php foreach($exam as $exam_1){$subject= Subjects::model()->findAll('id=:x',array(':x'=>$exam_1->subject_id));?>
           
            <td style="padding:8px 0px;"><?php foreach($subject as $subject_1){ echo $subject_1->name;?></td>
    <td style="padding:8px 0px;"><?php echo $Examscore_1->marks;?></td>
            
            <td style="padding:8px 0px;"></td>
            
            <td style="padding:8px 0px;"><?php echo $Examscore_1->remarks;?></td>
           
        </tr>
    <?php }}}?>
        
    </table>
    </div>
    <?php  ?>
   <?php }
    ?>
   <!-- <div class="edit_bttns" style="width:350px; top:19px; right:0px;">
            	<ul>
                    <li >
                        <?php // if(Yii::app()->controller->action->id == 'index') {?>
                      <?php  /*$rurl = explode('index.php?r=',Yii::app()->request->getUrl());
                       
			$rurl = explode('&id=',$rurl[1]); 
			echo CHtml::ajaxLink('Select Student',array('explorer','widget'=>'2','rurl'=>$rurl[0]),array('update'=>'#explorer_handler'),array('id'=>'explorer_change','class'=>'addbttn','style'=>'padding: 8px 8px 7px 9px;;margin:0px 0px 0px 50px;')); ?>
                        
                        <?php 
			}else
			{
				echo CHtml::ajaxLink('Change Batch',array('/site/explorer','widget'=>'2','rurl'=>'courses/batches/batchstudents'),array('update'=>'#explorer_handler'),array('id'=>'explorer_change'));
			}*/?>
                        
                      </li> 
                        
                 </ul>
           </div> -->
 <?php   }
 if($_REQUEST['search']== 1)
  {     
 
?>
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
echo CHtml::dropDownList('id','',$data,array('prompt'=>'Select','onchange'=>'sunil()','id'=>'cou','options'=>array($sel=>array('selected'=>true)))); 
echo '</div>';
echo '<div style="float:left; width:300px;"><span style="font-size:14px; font-weight:bold; color:#666;">Batch</span>&nbsp;&nbsp;'; ?>

   
   
<?php 
$batches= array();
if(isset($_REQUEST['cou']))
{
	$batches = CHtml::listData(Batches::model()->findAll("course_id=:x and is_deleted=:y", array(':x'=>$_REQUEST['cou'],':y'=>0)),id,name);
	
	/*$data_1=Subjects::model()->findAll(array('join' => 'JOIN batches ON batch_id = batches.id','condition'=>'batches.course_id=:id', 
                  'params'=>array(':id'=>(int) $_REQUEST['cou'])));*/
	//$data_1 = CHtml::listData(Subjects::model()->findAll(array('join' => 'JOIN batches ON batch_id = batches.id','condition'=>'batches.course_id=:id', 
                  //'params'=>array(':id'=>(int) $_REQUEST['cou']))),'id','batchname');			  
				  
	 
}
if(isset($_REQUEST['sub']))
{
 $sel_1 = $_REQUEST['sub'];	
}
else
{
	$sel_1 ='';
}
echo CHtml::dropDownList('sub','',$batches,array('prompt'=>'Select','onchange'=>'sunil()','id'=>'sub','onchange'=>'kumar()','options'=>array($sel_1=>array('selected'=>true)))); 
 
echo '<br/></div><div class="clear"></div>';
echo '<div style="float:left; width:380px;"><span style="font-size:14px; font-weight:bold; color:#666;">Exam Name</span>&nbsp;&nbsp;&nbsp;&nbsp;';

  
 ?>

<?php 
$data_2= array();
if(isset($_REQUEST['sub']))
{
	$data_2 = CHtml::listData(ExamGroups::model()->findAll("batch_id=:x", array(':x'=>$_REQUEST['sub'])),id,name);
	
	/*$data_1=Subjects::model()->findAll(array('join' => 'JOIN batches ON batch_id = batches.id','condition'=>'batches.course_id=:id', 
                  'params'=>array(':id'=>(int) $_REQUEST['cou'])));*/
	//$data_1 = CHtml::listData(Subjects::model()->findAll(array('join' => 'JOIN batches ON batch_id = batches.id','condition'=>'batches.course_id=:id', 
                  //'params'=>array(':id'=>(int) $_REQUEST['cou']))),'id','batchname');			  
				  
	 
}
if(isset($_REQUEST['exm']))
{
 $sel_1 = $_REQUEST['exm'];	
}
else
{
	$sel_1 ='';
}
echo CHtml::dropDownList('exm','',$data_2,array('prompt'=>'Select','onchange'=>'sunil()','id'=>'exm','onchange'=>'kumar()','onchange'=>'vanam()','options'=>array($sel_1=>array('selected'=>true)))); 
 
echo '</div>';
echo '<div style="float:left; width:300px;"><span style="font-size:14px; font-weight:bold; color:#666;">Subject</span>&nbsp;&nbsp;';
  
 ?>
<?php 
$data_3= array();
if(isset($_REQUEST['exm']))
{
	$data_3 = CHtml::listData(Exams::model()->findAll("exam_group_id=:x", array(':x'=>$_REQUEST['exm'])),id,subject_id);
	
	//$data_3=Subjects::model()->findAll(array('join' => 'JOIN exams ON id = exams.subject_id','condition'=>'exams.exam_group_id=:id', 
                  //'params'=>array(':id'=>(int) $_REQUEST['exm'])));
	
	//$data_3 = CHtml::listData(Subjects::model()->findAll("id=:x",array(':x'=>$exam->subject_id)),id,name);		  
	
}
if(isset($_REQUEST['subj']))
{
 $sel_1 = $_REQUEST['subj'];	
}
else
{
	$sel_1 ='';
}
echo CHtml::dropDownList('subj','',$data_3,array('prompt'=>'Select','onchange'=>'sunil()','id'=>'subj','onchange'=>'kumar()','onchange'=>'vanam()','onchange'=>'dinesh()','options'=>array($sel_1=>array('selected'=>true)))); 
 
echo '<br/></div><div class="clear"></div>';

?>
   
   
<?php

if(isset($_REQUEST['subj']))
{
 $exams = Exams::model()->findAll("id=:x",array(':x'=>$_REQUEST['subj'])); 

	if(count($exams)==0)
	{
		echo '<br> <br>'.Yii::t('employees','<i>No Employee assigned yet.</i>').'<br> <br>';
	}
	else
	{
	?>
  

    <div class="pdtab_Con" style="width:97%;padding:0px 0px 0px 0px;">
                <div style="font-size:13px; padding:5px 0px"><?php echo Yii::t('examination','<strong>Recent Employee Admissions</strong>');?></div>
                
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody> 
                    <tr class="pdtab-h">
                    
                      <!--<td align="center" height="18" style="padding:0px 0px"><?php echo Yii::t('examination','Sl.No');?></td>-->
                      <td align="center"style="padding:0px 0px;"><?php echo Yii::t('examination','Student Name');?></td>
                      <td align="center"style="padding:0px 0px;"><?php echo Yii::t('examination','Exam Name');?></td>
                      <td align="center"style="padding:0px 0px;"><?php echo Yii::t('examination','Subject');?></td> 
                      <td align="center" style="padding:0px 0px;"><?php echo Yii::t('examination','Course');?></td>
                      <td align="center"style="padding:0px 0px;"><?php echo Yii::t('examination','Batch Name');?></td> 
                      <td align="center" style="padding:0px 0px;"><?php echo Yii::t('examination','Mark');?></td>
                      <td align="center" style="padding:0px 0px;"><?php echo Yii::t('examination','Status');?></td>
                     
                    </tr>
                  </tbody>
                   
                   <?php /*
                                    if (isset($_REQUEST['page'])) {
                                      
                                        $i = ($pages->pageSize*$_REQUEST['page'])-9;
                                    } else {
                                        $i = 1;
                                    }
                                    $cls = "even";*/
                                    ?>
                  <?php foreach($exams as $exams_1){?>
                    <tbody>
                    <tr>
                        
                        <!--<td align="center" style="padding:0px 0px;"><?php ?></td>-->
                    <?php $examscores = ExamScores::model()->findAll("exam_id=:x",array(':x'=>$exams_1->id));?>
                    <td align="center" style="padding:0px 0px;"><?php   foreach($examscores as $examscores_1){ $student = Students::model()->findAll("id=:x",array(':x'=>$examscores_1->student_id)); foreach($student as $student_1){ echo $student_1->first_name; }  ?></td>
                   <?php $examgroup = ExamGroups::model()->findAll("id=:x",array(':x'=>$_REQUEST['exm']));?>
                    <td align="center" style="padding:0px 0px;"><?php foreach($examgroup as $examgroup_1){ echo $examgroup_1->name; ?></td>
                  <?php $subject = Subjects::model()->findAll("id=:x",array(':x'=>$exams_1->subject_id));?>
                    <td align="center" style="padding:0px 0px;"><?php foreach($subject as $subject_1) { echo $subject_1->name;  ?></td>
                   <?php $course = Courses::model()->findAll("id=:x",array(':x'=>$_REQUEST['cou']));?>  
                    <td align="center" style="padding:0px 0px;"><?php foreach($course as $course_1) { echo $course_1->course_name;  ?></td>
                    <?php $batch = Batches::model()->findAll("id=:x",array(':x'=>$_REQUEST['sub']));?>   
                    <td align="center" style="padding:0px 0px;"><?php foreach($batch as $batch_1) { echo $batch_1->name;?></td>
                    <td align="center" style="padding:0px 0px;"><?php  echo $examscores_1->marks; ?></td>
					<?php  //$dept = EmployeeDepartments::model()->findByAttributes(array('id'=>$list_1->employee_department_id)); ?>
                    <!--<td align="center"><?php // if($dept!=NULL){echo $dept->name; }else{ echo '-';}?> </td>-->
                    <td align="center" style="padding:0px 0px;"> <?php // echo $list_1->batch_id?></td>
                    <?php //  $pos = EmployeePositions::model()->findByAttributes(array('id'=>$list_1->employee_position_id)); ?>
                    <!--<td align="center"><?php // if($pos!=NULL){echo $pos->name; }else{ echo '-';}?> </td>-->
                   <!--<td style="padding:5px 44px;">-->
                                                
                            <!--<select name="Applicants[status]" class="Applicants_status" rel="<?php // echo $list_1->id ?>"<?php // echo ($list_1->status==2)?' disabled="true"':''?>>-->
                                <!--<option value="1"<?php // echo ($list_1->status==1)?' selected="selected"':''?>>Default</option>-->
                                <!--<option value="2"<?php // echo ($list_1->status==2)?' selected="selected"':''?>>Open</option>-->
                                <!--<option value="3"<?php // echo ($list_1->status==3)?' selected="selected"':''?>>Closed</option>-->
                                <!--<option value="4"<?php // echo ($list_1->status==4)?' selected="selected"':''?>>Result Published</option>-->
                            <!--</select>-->
                    <!--</td>-->
                   
                  </tr>
                    <?php }}}}} ?>   
               </tbody>
                  <?php }
//               $i++;} ?>
                           
               </table>    
                 <!--<div class="pagecon">
                     
                                    <?php
                                   /* $this->widget('CLinkPager', array(
                                        'currentPage' => $pages->getCurrentPage(),
                                        'itemCount' => $item_count,
                                        'pageSize' => $page_size,
                                        'maxButtonCount' => 5,
                                        //'nextPageLabel'=>'My text >',
                                        'header' => '',
                                        'htmlOptions' => array('class' => 'pages'),
                                    ));*/
                                    ?>
                                </div> <!-- END div class="pagecon" 2 -->
                                <div class="clear"></div>
</div> <?php } } ?>
<?php /*echo CHtml::dropDownList('course_id','',CHtml::listData(Courses::model()->findAll(),'id','course_name'),
array('empty'=>'Select Course',
'ajax' => array(
'type'=>'POST', //request type
'url'=>CController::createUrl('result/dynamiccities'), //url to call.
//Style: CController::createUrl('currentController/methodToCall')
'update'=>'#batch_id', //selector to update
'data'=>'js:$(this).serialize()',
//'data'=>'js:javascript statement' 
//leave out the data key to pass all form values through
))); 
 
echo CHtml::dropDownList('batch_id','',CHtml::listData(Batches::model()->findAll(),'id','name'),
array('empty'=>'Select Batch',
'ajax' => array(
'type'=>'POST', //request type
'url'=>CController::createUrl('result/dynamicstates'), //url to call.
//Style: CController::createUrl('currentController/methodToCall')
'update'=>'#exam_group_id', //selector to update
'data'=>'js:$(this).serialize()',
//'data'=>'js:javascript statement' 
//leave out the data key to pass all form values through
))); 

echo CHtml::dropDownList('exam_group_id','',CHtml::listData(ExamGroups::model()->findAll(),'id','name'),
array('empty'=>'Select Exam','style'=>'height:25px;',

'ajax' => array(
'type'=>'POST', //request type
'url'=>CController::createUrl('result/dynamiccountry'), //url to call.
//Style: CController::createUrl('currentController/methodToCall')
'update'=>'#id', //selector to update
'data'=>'js:$(this).serialize()',
//'data'=>'js:javascript statement' 
//leave out the data key to pass all form values through
))); 

//empty since it will be filled by the other dropdown
echo CHtml::dropDownList('id','', array(),array('empty' => 'Select Subject','style'=>'height:25px;')); ?>
<?php  echo CHtml::ajaxButton("Apply",CController::createUrl('result/search'), array(
        //'data' => 'js:$("#search-form").serialize()',
        //'update' => '#student_panel_handler',
        'type'=>'GET',
        ),array('id'=>'student-batch-but'));*/?>
   
  <?php } ?>
<?php $this->endWidget(); ?>

<script>
    $('#course_id').change(function(){
        alert('success');
    //$('#exam_group_id').prop('selectedIndex',0);
    $("#exam_group_id option").hide();
     $("#id option").hide();
});

    </script>
    