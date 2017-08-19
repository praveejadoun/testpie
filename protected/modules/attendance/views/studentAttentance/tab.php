<?php Yii::app()->clientScript->registerCoreScript('jquery');

         //IMPORTANT about Fancybox.You can use the newest 2.0 version or the old one
        //If you use the new one,as below,you can use it for free only for your personal non-commercial site.For more info see
		//If you decide to switch back to fancybox 1 you must do a search and replace in index view file for "beforeClose" and replace with 
		//"onClosed"
        // http://fancyapps.com/fancybox/#license
          // FancyBox2
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js_plugins/fancybox2/jquery.fancybox.js', CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/js_plugins/fancybox2/jquery.fancybox.css', 'screen');
         // FancyBox
         //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/fancybox/jquery.fancybox-1.3.4.js', CClientScript::POS_HEAD);
         // Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js_plugins/fancybox/jquery.fancybox-1.3.4.css','screen');
        //JQueryUI (for delete confirmation  dialog)
         Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/jqui1812/js/jquery-ui-1.8.12.custom.min.js', CClientScript::POS_HEAD);
         Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js_plugins/jqui1812/css/dark-hive/jquery-ui-1.8.12.custom.css','screen');
          ///JSON2JS
         Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/json2/json2.js');
       

           //jqueryform js
               Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/ajaxform/jquery.form.js', CClientScript::POS_HEAD);
              Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/ajaxform/form_ajax_binding.js', CClientScript::POS_HEAD);
              Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js_plugins/ajaxform/client_val_form.css','screen');  ?>
              
              <script language="javascript">
function getid()
{
var id= document.getElementById('drop').value;
window.location = "index.php?r=batches/manage&id="+id;
}
</script>
<script>
$(document).ready(function() {
$(".act_but").click(function(){	$('.act_drop').hide();	
            	if ($("#"+this.id+'x').is(':hidden')){
					
                	$("#"+this.id+'x').show();
					
				}
            	else{
                	$("#"+this.id+'x').hide();
            	}
            return false;
       			 });
				  $('#'+this.id+'x').click(function(e) {
            		e.stopPropagation();
        			});
        		
});
$(document).click(function() {
					
            		$('.act_drop').hide();
					
        			});
</script>
<?php if(isset($_REQUEST['id']))
{?>
 <h1>Manage Batch</h1>
 
 
 <?php    $batch=Batches::model()->findByAttributes(array('id'=>$_REQUEST['id'])); 

          if($batch!=NULL)
		   {
			   $course=Courses::model()->findByAttributes(array('id'=>$batch->course_id));
		       
                       if($course!=NULL)
			   {
				   $coursename = $course->course_name; 
				   $batchname = $batch->name;
			   }
			   else
			   {
				   $coursename = ''; 
				   $batchname = '';
			   }
           }?>
          
          
	<div class="c_batch_tbar" style="padding:0px; margin:0px;">
    <?php if((Yii::app()->controller->id=='batches' and (Yii::app()->controller->action->id=='batchstudents' or Yii::app()->controller->action->id=='settings')) or (Yii::app()->controller->id=='subject' and Yii::app()->controller->action->id=='index') or (Yii::app()->controller->id=='weekdays' and (Yii::app()->controller->action->id=='timetable' or Yii::app()->controller->action->id=='index')) or (Yii::app()->controller->id=='classTiming' and Yii::app()->controller->action->id=='index') or (Yii::app()->controller->id=='studentAttentance' and Yii::app()->controller->action->id=='index') or (Yii::app()->controller->id=='gradingLevels' and Yii::app()->controller->action->id=='index') or (Yii::app()->controller->id=='exam' and Yii::app()->controller->action->id=='index'))
			{
				?>
            
            <?php
			
			$rurl = explode('index.php?r=',Yii::app()->request->getUrl());
                       
			$rurl = explode('&id=',$rurl[1]); 
			echo CHtml::ajaxLink('Change Batch',array('/site/explorer','widget'=>'2','rurl'=>$rurl[0]),array('update'=>'#explorer_handler'),array('id'=>'explorer_change','class'=>'sb_but','style'=>'top:-40px; right:40px;')); 
                        echo CHtml::link('Teacher Attendance',array('/attendance/employeeAttendance'),array('class'=>'sb_but','style'=>'top:-40px; right:170px;'));?>
<?php 
			}else
			{
				echo CHtml::link('Teacher Attendance',array('/attendance/teachersubjectattendance'),array('class'=>'sb_but','style'=>'top:-40px; right:40px;'));
			}?>
            
            <?php echo CHtml::link('<span>close</span>',array('/attendance'),array('class'=>'sb_but_close','style'=>'top:-40px; right:0px;'));?>
   
    	<div class="cb_left">
        	<ul>
            	<li><strong>Course / Batch:</strong> <?php echo $coursename; ?> / <?php echo $batchname; ?></li>
                <li><strong><?php echo Yii::t('Batch','Class Teacher : '); ?></strong> <?php $employee=Employees::model()->findByAttributes(array('id'=>$batch->employee_id));
		    if($employee!=NULL)
		    {
			   echo ucfirst($employee->first_name).' '.ucfirst($employee->middle_name).' '.ucfirst($employee->last_name);
		    }?></li>
            </ul>
        </div>
        <div class="cb_right">
        	<div class="status_bx" style="margin-left:150px;">
    			<ul>
        			<li><span><?php echo count(Students::model()->findAll("batch_id=:x and is_active=:y and is_deleted=:z", array(':x'=>$_REQUEST['id'],':y'=>1,':z'=>0))); ?></span><?php echo Yii::t('Batch','Students');?></li>
            		<li><span><?php echo count(Subjects::model()->findAll("batch_id=:x", array(':x'=>$_REQUEST['id']))); ?></span><?php echo Yii::t('Batch','Subjects');?></li>
            		<li><span><?php echo count(TimetableEntries::model()->findAll(array('condition'=>'batch_id=:x','params'=>array(':x'=>$_REQUEST['id']))));?></span><?php echo Yii::t('Batch','Employees');?></li>
        		</ul>
     		<div class="clear"></div>
   			</div>
            
        </div>
      
    	<div class="clear"></div>
    </div>
  
    <?php 
		   }?>
		   <div id="subjects-grid-side"></div>
    <div id="class-timings-grid-side"></div>
    <div id="events-grid-side"></div>
    <div id="subject-name-grid-side"></div>
    <script>
	//CREATE 

    $('#add_subjects-side').bind('click', function() {
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=courses/subject/returnForm",
            data:{"batch_id":<?php echo $_GET['id'];?>,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                beforeSend : function() {
                    $("#subjects-grid-side").addClass("ajax-sending");
                },
                complete : function() {
                    $("#subjects-grid-side").removeClass("ajax-sending");
                },
            success: function(data) {
                $.fancybox(data,
                        {    "transitionIn"      : "elastic",
                            "transitionOut"   : "elastic",
                            "speedIn"                : 600,
                            "speedOut"            : 200,
                            "overlayShow"     : false,
                            "hideOnContentClick": false,
                            "afterClose":    function() {
								window.location.reload();
								}  //onclosed function
                        });//fancybox
            } //success
        });//ajax
        return false;
    });//bind
	
	
	//CREATE 

    $('#add_class-timings-side').bind('click', function() {
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=courses/classTiming/returnForm",
            data:{"batch_id":<?php echo $_GET['id'];?>,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                beforeSend : function() {
                    $("#class-timings-grid-side").addClass("ajax-sending");
                },
                complete : function() {
                    $("#class-timings-grid-side").removeClass("ajax-sending");
                },
            success: function(data) {
                $.fancybox(data,
                        {    "transitionIn"      : "elastic",
                            "transitionOut"   : "elastic",
                            "speedIn"                : 600,
                            "speedOut"            : 200,
                            "overlayShow"     : false,
                            "hideOnContentClick": false,
                            "afterClose":    function() {
								window.location.reload();
								} //onclosed function
                        });//fancybox
            } //success
        });//ajax
        return false;
    });//bind
	
	//CREATE 

    $('#add_events-side').bind('click', function() {
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=courses/events/returnForm",
            data:{"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                beforeSend : function() {
                    $("#events-grid-side").addClass("ajax-sending");
                },
                complete : function() {
                    $("#events-grid-side").removeClass("ajax-sending");
                },
            success: function(data) {
                $.fancybox(data,
                        {    "transitionIn"      : "elastic",
                            "transitionOut"   : "elastic",
                            "speedIn"                : 600,
                            "speedOut"            : 200,
                            "overlayShow"     : false,
                            "hideOnContentClick": false,
                            "afterClose":    function() {
								window.location.reload();
								} //onclosed function
                        });//fancybox
            } //success
        });//ajax
        return false;
    });//bind
	
	//CREATE 

    $('#add_subject-name-side').bind('click', function() {
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=courses/subject/returnForm",
            data:{"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                beforeSend : function() {
                    $("#subject-name-grid-side").addClass("ajax-sending");
                },
                complete : function() {
                    $("#subject-name-grid-side").removeClass("ajax-sending");
                },
            success: function(data) {
                $.fancybox(data,
                        {    "transitionIn"      : "elastic",
                            "transitionOut"   : "elastic",
                            "speedIn"                : 600,
                            "speedOut"            : 200,
                            "overlayShow"     : false,
                            "hideOnContentClick": false,
                            "afterClose":    function() {window.location.reload();} //onclosed function
                        });//fancybox
            } //success
        });//ajax
        return false;
    });//bind
    
    $('#update_subjects-side').bind('click', function() {
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=courses/batches/addupdate",
            data:{"batch_id":<?php echo $_GET['id'];?>,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                beforeSend : function() {
                    $("#subjects-grid-side").addClass("ajax-sending");
                },
                complete : function() {
                    $("#subjects-grid-side").removeClass("ajax-sending");
                },
            success: function(data) {
                $.fancybox(data,
                        {    "transitionIn"      : "elastic",
                            "transitionOut"   : "elastic",
                            "speedIn"                : 600,
                            "speedOut"            : 200,
                            "overlayShow"     : false,
                            "hideOnContentClick": false,
                            "afterClose":    function() {
								window.location.reload();
								}  //onclosed function
                        });//fancybox
            } //success
        });//ajax
        return false;
    });//bind
	
     
//CREATE 

    $('#add_subjects ').bind('click', function() {
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=courses/subject/returnForm",
            data:{"batch_id":<?php echo $_GET['id'];?>,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                beforeSend : function() {
                    $("#subjects-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#subjects-grid").removeClass("ajax-sending");
                },
            success: function(data) {
                $.fancybox(data,
                        {    "transitionIn"      : "elastic",
                            "transitionOut"   : "elastic",
                            "speedIn"                : 600,
                            "speedOut"            : 200,
                            "overlayShow"     : false,
                            "hideOnContentClick": false,
                            "afterClose":    function() {
								window.location.reload();
								} //onclosed function
                        });//fancybox
            } //success
        });//ajax
        return false;
    });//bind

   
    
    
	</script>