<?php
$this->breadcrumbs=array(
	'Exam Scores'=>array('/courses'),
	'Create',
);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/dashboard/left_side');?>
    
    </td>
    <td valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top" width="75%"><div style="padding-left:0px;">

      <div style="padding:20px;">
    <!--<div class="searchbx_area">
    <div class="searchbx_cntnt">
    	<ul>
        <li><a href="#"><img src="images/search_icon.png" width="46" height="43" /></a></li>
        <li><input class="textfieldcntnt"  name="" type="text" /></li>
        </ul>
    </div>
    
    </div>-->
    
    
        
    <div class="edit_bttns">
    <ul>
    <?php /*?><li>
    <a class=" edit last" href="#">Edit</a>    </li><?php */?>
    </ul>
    </div>
    
    
    <div class="clear"></div>
    <div class="emp_right_contner">
    <div class="emp_tabwrapper">
    	<h1 style="border-bottom:1px solid #e2e8ed;margin: 0px 0px 0px 0px;padding:0px 0px 10px 0px;"><?php echo Yii::t('Examscore','Exams');?></h1>
     <?php //$this->renderPartial('/batches/tab');?>
        <br/><br/>  <br/>
    <div class="clear"></div>
   
      <div class="box-one">
                            <div class="bttns_addstudent-n">
                                <ul style="margin: 0px 0px -37px 600px;">
                                    <li>   <input type="button" name="back" value="Back" onclick="javascript:history.back();" class="formbut-n" /></li>
                                  
                                       
                                </ul>
                            </div>
                        </div>
        <?php echo CHtml::link('<span>close</span>',array('/examination'),array('class'=>'sb_but_close','style'=>'top:265px; right:20px;'));?>

      <div class="formCon">
        <div class="formConInner" style="width:96%;margin:0px 0px 39px 0px">
       
         <div class="tablebx"> 
	<table width="100%" cellspacing="0p" cellpadding="0" border="0">
    	<tr class="tablebx_topbg">
            <td>Course</td>
            <td>Batch</td>
            <td>Exam</td>
        </tr> 
        <?php $bat=Batches::model()->findAll('is_deleted=:x AND id=:y',array(':x'=>0,':y'=>$_REQUEST['id'])); ?>
        <tr>
            <td style="padding:8px 0px;"><?php foreach($bat as $batch){echo $batch->name;}?></td>
            <?php $cou= Courses::model()->findAll('is_deleted=:x AND id=:y',array(':x'=>0,':y'=>$batch->course_id));?>
            <td style="padding:8px 0px;"><?php foreach($cou as $course){echo $course->course_name;}?></td>
           <?php $es= ExamGroups::model()->findAll('id=:x',array(':x'=>$_REQUEST['examid']));?>
            <td><?php foreach($es as $es_1){echo $es_1->name;}?></td>
        </tr>
      
    </table>
    </div>
  <div class="box-one">
                            <div class="bttns_addstudent-n">
                                <ul style="margin: 0px 0px 13px 555px;">
                                    <li><?php echo CHtml::link(Yii::t('employees','change Batch'),array('create'),array('class'=>'formbut-n')) ?></li>
                                     
                                       
                                </ul>
                            </div>
                        </div>
        </div>
        
          </div>
    <div class="emp_cntntbx">


        
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div></div></div></div>
    </td>
  </tr>
</table>
         </td>
  </tr>
</table>