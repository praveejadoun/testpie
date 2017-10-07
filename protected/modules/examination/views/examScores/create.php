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
                                    <li> 
                                        <?php $es = Exams::model()->findAll('id=:x',array(':x'=>$_REQUEST['examid']));foreach($es as $es_1){}?>
                                        
                                          <?php echo CHtml::link(Yii::t('employees','Back'),array('examin/create','exam_group_id'=>$es_1->exam_group_id,'id'=>$_REQUEST['id']),array('class'=>'formbut-n')) ?>
                                     
                                        
                                        
                                        <!--<input type="button" name="back" value="Back" onclick="javascript:history.back();" class="formbut-n" /></li>-->
                                  
                                       
                                </ul>
                            </div>
                        </div>
        <?php echo CHtml::link('<span>close</span>',array('/examination'),array('class'=>'sb_but_close','style'=>'top:265px; right:20px;'));?>

      <div class="formCon">
        <div class="formConInner" style="width:96%;margin:0px 0px 39px 0px">
       
         <div class="tablebx"> 
	<table width="100%" cellspacing="0p" cellpadding="0" border="0">
    	<tr class="tablebx_topbg">
            <td>Batch</td>
            <td>Course</td>
            <td>Exam</td>
        </tr> 
        <?php $bat=Batches::model()->findAll('is_deleted=:x AND id=:y',array(':x'=>0,':y'=>$_REQUEST['id'])); ?>
        <tr>
            <td style="padding:8px 0px;"><?php foreach($bat as $batch){echo $batch->name;}?></td>
            <?php $cou= Courses::model()->findAll('is_deleted=:x AND id=:y',array(':x'=>0,':y'=>$batch->course_id));?>
            <td style="padding:8px 0px;"><?php foreach($cou as $course){echo $course->course_name;}?></td>
           <?php $exam= Exams::model()->findAll('id=:x',array(':x'=>$_REQUEST['examid']));?>
            <td><?php foreach($exam as $exam_1){ $eg= ExamGroups::model()->findAll('id=:x',array(':x'=>$exam_1->exam_group_id));}foreach($eg as $eg_1){ echo $eg_1->name;}?></td>
        </tr>
      
    </table>
    </div>
  <div class="box-one">
                            <div class="bttns_addstudent-n">
                                <ul style="margin: 0px 0px 13px 555px;">
                                    <li>
                                        <?php
			
			$rurl = explode('index.php?r=',Yii::app()->request->getUrl());
                       
			$rurl = explode('&id=',$rurl[1]); 
                        echo CHtml::ajaxLink('change Batch',array('default/explorer_3','widget'=>'2','rurl'=>$rurl[0]),array('update'=>'#explorer_handler'),array('id'=>'explorer_change','class'=>'formbut-n')); ?>
                         
                                        
                                        <?php // echo CHtml::link(Yii::t('employees','change Batch'),array('create'),array('class'=>'formbut-n')) ?>
                                    </li>
                                     
                                       
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
