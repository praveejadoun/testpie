

<?php
 $this->breadcrumbs=array(
	 'Hostel','Dashboard'
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
        	<?php $this->renderPartial('left_side');?>
        </td>
        <td valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" width="75%">
                <div class="cont_right formWrapper">
			<h1>Timetable Management</h1>
            <div class="status_box">
           		 <div class="sb_icon"></div>
           		 No Course / Batch Selected                 
                         <a <?php
			
			$rurl = explode('index.php?r=',Yii::app()->request->getUrl());
                       
			$rurl = explode('&id=',$rurl[1]); 
                        echo CHtml::ajaxLink('Select Batch',array('/site/explorer_1','widget'=>'2','rurl'=>$rurl[0]),array('update'=>'#explorer_handler'),array('id'=>'explorer_change','class'=>'sb_but')); ?>></a>
           
            </div>
            <div class="edit_bttns" style="width:175px; top:15px;">
    			<ul>
    				    				
    			</ul>
    		<div class="clear"></div>
    		</div>
				<div class="yellow_bx yb_timetable">
                	<div class="y_bx_head">
                    	Before creating the time table make sure you follow the following instructions                    </div>
                	<div class="y_bx_list timetable_list">
                    	<h1>Set Weekdays</h1>
                        <p>Set the weekdays, where the specific Batch has classes, You can use the school default or custom weekdays.</p>
                    </div>
                    <div class="y_bx_list timetable_list">
                    	<h1>Set Class Timings</h1>
                        <p>Create class timings for each Batch Enter each period start time and end time,Add break timings etc.</p>
                    </div>
                    <div class="y_bx_list timetable_list">
                    	<h1>Subjects &amp; Subject Allocation</h1>
                        <p>Add existing subjects to the Batch or create a new subject. Associate each subject with the teacher.</p>
                    </div>
                    <div class="y_bx_list timetable_list">
                    	<h1>Create Timetable</h1>
                        <p>Assigning each timing/period from the dropdown.</p>
                    </div>
    			</div>
		<div class="clear"></div>
		</div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

