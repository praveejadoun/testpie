

<?php
 $this->breadcrumbs=array(
	'Employees'=>array('employees/index'),
	'LogCategory'=>array('logcategory/index'),
);
?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="247" valign="top" id="port-left">
        	<?php $this->renderPartial('/employees/left_side');?>
        </td>
        <td valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" width="75%">
                    <div class="cont_right formWrapper">
                      <h1><?php echo Yii::t('logcategory','Log Category');?></h1>  
                      <div class="contrht_bttns" >
                         
     <ul>
      <li style="padding: 27px 102px 0px 0px;margin: 67px 482px -21px 19px;"><?php echo CHtml::link('<span>'.Yii::t('Employees','Create Log Category').'</span>', array('create')); ?></li>
     </ul> 
                            
 </div>
                       <div class="tableinnerlist" style="padding:35px 0px 0px 0px">
                       <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tbody>
       
                 
		  <tr >
                        <th align="center"><?php echo Yii::t('Courses','Name');?></th>
                        <th align="center"><?php echo Yii::t('Courses','Action');?></th>
			
		  </tr>
                  
          <?php
          
          $logcategory=EmployeeLogCategory::model()->findAll("is_deleted=:y", array(':y'=>0)); ?>

       <?php   if($logcategory!=null)
              {
         
        
		  foreach($logcategory as $logcategory_1)
				{ ?>
                  <tr>
                      
                        <td>		<?php echo $logcategory_1->name;?></td>
                       		
					
                                       
									
			
					
					<td>     
                 <?php echo CHtml::link(Yii::t('Logcategory','Edit')/*,$this->createUrl('courses/update')*/,array('update','id'=>$logcategory_1->id),/*
        'onclick'=>'$("#jobDialog11").dialog("open"); return false;',
        'update'=>'#jobDialog1','type' =>'GET','data' => array( 'val1' =>$posts_1->id ),'dataType' => 'text'),array('id'=>'showJobDialog123'.$posts_1->id,*/ array('class'=>'edit')); ?>
                            <span>|</span> 
                                  <?php 
                                         echo CHtml::link(Yii::t(
  'Logcategory','Delete'), array('delete', 'id' =>$logcategory_1->id),array('confirm'=>"Are you sure?\n\n Note: All details (students, timetable, fees, exam) related to this batch will be deleted.")); ?>
                                                                 
                                      
 
                                      
                                        </td>
                  </tr>
                  
                  <?php    } ?>
                  
                   <?php }else { 
                   echo '<br><div style="padding-top:10px;margin-top:-15px;">'.'<i>'.Yii::t('Batch','No Results Found').'</i></div>'; ?>  
                            
                            
     <?php } ?>
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

