

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
                      <?php if($batch!=null)
                      {
                          ?>
                     
                       <div class="tableinnerlist">
                       <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tbody>
       
                 
		  <tr >
                      
                        <th align="center"><?php echo Yii::t('Courses','S.No');?></th>
                        <th align="center"><?php echo Yii::t('Courses','Course Name');?></th>
			<th align="center"><?php echo Yii::t('Courses','Batch Name');?></th>
          
			<th align="center"><?php echo Yii::t('Courses','Start Date');?></th>
			<th align="center"><?php echo Yii::t('Courses','End Date');?></th>
			<th align="center"><?php echo Yii::t('Courses','Actions');?></th>
		  </tr>
               <?php 
  if(isset($_REQUEST['page']))
  {
      $i=($pages->pageSize*$_REQUEST['page'])-9;
  }
  else
  {
	  $i=1;
  }
  
  ?>    
          <?php 
         
		  foreach($batch as $batch_1)
				{ ?>
                  <tr>
                      <td>		<?php echo $i;?></td>
                       <td>		<?php echo $batch_1->course_id;?></td>
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
                                         echo CHtml::link(Yii::t(
  'Batch','Delete'), array('batches/delete', 'id' =>$batch_1->id),array('confirm'=>"Are you sure?\n\n Note: All details (students, timetable, fees, exam) related to this batch will be deleted.")); ?>
                                            <span>|</span>                    
                 <?php if($batch->is_active=='1')
					{?>
                  <?php echo CHtml::link(Yii::t('Batch','Deactivate Batch'), array('batches/deactivate','id'=>$_REQUEST['id']),array('confirm'=>'Are You Sure You Want To Deactivate This Batch ?')) ?><?php }
	else
	{ ?>
   <?php echo CHtml::link(Yii::t('Batch','Activate'), array('batches/activate','id' =>$batch_1->id),array('confirm'=>'Are You Sure You Want To Activate This Batch ?')) ?><?php }?>                         
	
                            <?php   $i++; } ?> 
            
                                        </td>
                  </tr>      
         </tbody>
        </table>

                           </div>
                      <?php } 
                            else {
                                  echo '<br><div class="notifications nt_red" style="padding-top:10px;margin-top:-15px;">'.'<i>'.Yii::t('Batch','No Deactivated Batch Found').'</i></div>'; 
                                                        }?>
                      </div>
                    </td>
                </tr>
            </table>
            
        </td>
    </tr>
</table>

