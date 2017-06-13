<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subjects-form',
	'enableAjaxValidation'=>true,
));?>

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
              <div class="formCon">
                  <div class="formConInner">     
            <table width="60%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <?php $courses=Courses::model()->findByAttributes(array('id'=>$_REQUEST['id'])); ?>
                    
                    <td><?php echo $form->labelEx($model,Yii::t('Batch','Teacher')); ?></td>
                      
    <td>&nbsp;</td>
     
     <?php
		$criteria=new CDbCriteria;
		$criteria->condition='is_deleted=:is_del';
		$criteria->params=array(':is_del'=>0);
	?>
   
    <td><div><?php echo $form->dropDownList($model,'id',CHtml::listData(Courses::model()->findAll($criteria),'id','concatened'),array('empty' => 'Select Course')); ?>
		<?php echo $form->error($model,'id'); ?></div></td>
    
    
                </tr>
            </table>
            </div>
             </div>
             <?php //foreach($posts as $posts_1) { ?>
                 <?php //$subject=Subjects::model()->findAll("batch_id=:x AND is_deleted=:y AND is_active=:z", array(':x'=>$posts->id,':y'=>0,':z'=>1));?>
                   <?php 
                   if($courses!=null){
                   if(isset($_REQUEST['id']))
                {
                $posts=Subjects::model()->findAll("batch_id=:x and is_deleted=:y and is_active=:z", array(':x'=>$_REQUEST['id'],':y'=>'1',':z'=>'0'));
				if($posts!=NULL)
				{ ?>
                  <div class="pdtab_Con" >
            <div class="semester-block">
                                    
         <!-- Subject Details -->
         
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tbody>
          <!--class="cbtablebx_topbg"  class="sub_act"-->
		  <tr class="pdtab-h">
			<td align="center"><?php echo Yii::t('Courses','#');?></td>
                        <td align="center"><?php echo Yii::t('Courses','Subject Name');?></td>
			<td align="center"><?php echo Yii::t('Courses','Maximum Weekly Classes');?></td>
		        <td align="center"><?php echo Yii::t('Courses','Actions');?></td>
		  </tr>
          <?php 
		  foreach($posts as $posts_1)
				{
					echo '<tr id="batchrow'.$posts_1->id.'">';
                                        echo '<td style="text-align:left; padding-left:10px; font-weight:bold;">'.$posts_1->id.'</td>';
					echo '<td style="text-align:left; padding-left:10px; font-weight:bold;">'.$posts_1->name.'</td>';
                                        echo '<td style="text-align:left; padding-left:10px; font-weight:bold;">'.$posts_1->max_weekly_classes.'</td>';
					echo '<td align="center"  class="sub_act">';
					?> 
					<?php echo CHtml::ajaxLink(Yii::t('Subjects','Edit'),$this->createUrl('subjects/addupdate'),array(
        'onclick'=>'$("#jobDialog").dialog("open"); return false;',
        'update'=>'#jobDialog','type' =>'GET','data' => array( 'val1' =>$posts_1->id,'batch_id'=>$posts->id ),'dataType' => 'text'),array('id'=>'showJobDialog123'.$subject_1->id,'class'=>'add')); 
		 echo ''.CHtml::ajaxLink(
  "Delete",  $this->createUrl('subjects/remove'),  array('success'=>'rowdelete('.$posts_1->id.')','type' =>'GET','data' => array( 'val1' =>$subject_1->id ),'dataType' => 'text'),array('confirm'=>"Are you sure?\n\n Note: All details (students, timetable, fees, exam) related to this batch will be deleted."));
 ?> <?php //echo '  '.CHtml::link(Yii::t('Courses','Add Student'), array('/students/students/create','bid'=>$batch_1->id)).*/'</td>';
					echo '</td>';
                                        echo '</tr>';
					echo '<div id="jobDialog123"></div>';
				}
			   ?>
         </tbody>
        </table>
         </div>
		</div>
                                <?php }}} ?>
                  
            </div>
            
        </td>
    </tr>
</table>



<?php $this->endWidget(); ?>