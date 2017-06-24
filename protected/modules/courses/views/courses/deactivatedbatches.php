

<?php
 $this->breadcrumbs=array(
	'Deactivated Batch',
);
?>

<?php 

                 $serverurl = "http://licence-server.open-school.org/news.php";
				 
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
				  $result = json_decode($result, true);
				  
				  
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="247" valign="top" id="port-left">
        	<?php $this->renderPartial('/courses/left_side');?>
        </td>
        <td valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" width="75%">
                    <div class="cont_right formWrapper">
                      <h1><?php echo Yii::t('courses','Deactivated Batch');?></h1>  
                 <?php    $posts=Courses::model()->findAll("is_deleted =:x", array(':x'=>0)); ?>
                      
                   
                      
                   <?php $batch=Batches::model()->findAll("is_deleted=:y AND is_active=:z", array(':y'=>0,':z'=>0)); ?>
                       <div class="tableinnerlist">
                       <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tbody>
       
                 
		  <tr >
                        <th align="center"><?php echo Yii::t('Courses','#');?></th>
                        <th align="center"><?php echo Yii::t('Courses','Course Name');?></th>
			<th align="center"><?php echo Yii::t('Courses','Batch Name');?></th>
          
			<th align="center"><?php echo Yii::t('Courses','Start Date');?></th>
			<th align="center"><?php echo Yii::t('Courses','End Date');?></th>
			<th align="center"><?php echo Yii::t('Courses','Actions');?></th>
		  </tr>
                  
          <?php 
		  foreach($batch as $batch_1)
				{ ?>
                  <tr>
                      <td>		<?php echo $batch_1->id;?></td>
                       <td>		<?php echo $batch_1->name;?></td>
                        <td>		<?php echo $batch_1->name;?></td>
                       		
					<?php  $settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
					if($settings!=NULL)
					{	
						$date1=date($settings->displaydate,strtotime($batch_1->start_date));
						$date2=date($settings->displaydate,strtotime($batch_1->end_date));

					}
                                        ?>
									
										
				<td align="center">	<?php echo $date1; ?> </td>
				<td align="center">	<?php echo $date2; ?> </td>
					
					<td><?php 
                                         echo ''.CHtml::ajaxLink(
  "Delete", $this->createUrl('batches/remove'), array('success'=>'rowdelete('.$batch_1->id.')','type' =>'GET','data' => array( 'val1' =>$batch_1->id ),'dataType' => 'text'),array('confirm'=>"Are you sure?\n\n Note: All details (students, timetable, fees, exam) related to this batch will be deleted."));
                                        
                                       
	echo CHtml::link(Yii::t('Batch','Active'), array('/students/students/active', 'sid'=>$posts_1->id,'id'=>$_REQUEST['id']),array('confirm'=>'Are You Sure , Make active ?')); 	
                                } ?> 
                                        </td>
                  </tr>      
         </tbody>
        </table>

                           </div>
                 
                      </div>
                    </td>
                </tr>
            </table>
            
        </td>
    </tr>
</table>

