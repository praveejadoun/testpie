
<?php
$find = EmployeeSubjectwiseAttendances::model()->findAll("attendance_date=:x AND employee_id=:y", array(':x'=>$year.'-'.$month.'-'.$day,':y'=>$emp_id));
if(count($find)==0)
{
	
	/*
		Column with no leave marked
	*/
    
    
        echo CHtml::link('<span>'.Yii::t('Subjects','Add Subjects To Batch').'</span>', array('#'),array('id'=>'add_subjectss','class' => 'at_abs'));

//echo CHtml::ajaxLink(Yii::t('job','mark leave'),$this->createUrl('teachersubjectattendance/Addnew'),array(
//        'onclick'=>'$("#jobDialog").dialog("open"); return false;',
//        'update'=>'#jobDialog','type' =>'GET','data'=>array('day' =>$day,'month'=>$month,'year'=>$year,'emp_id'=>$emp_id),
//        ),array('id'=>'showJobDialog','class' => 'at_abs', 'title' => 'Add leave'));
		//echo '<div id="jobDialog'.$day.$emp_id.'"></div>';
}

?>

<script type="text/javascript">
    $(function() {
        
        
        //CREATE 

    $('#add_subjectss ').bind('click', function() {
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=attendance/teacherSubjectAttendance/returnForm",
            data:{"employee_id":"<?php echo $emp_id;?>","class_timing_id":"<?php echo $c_t_id;?>","attendance_date":"<?php echo $year.'-'.$month.'-'.$day; ?>","YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
//                beforeSend : function() {
//                    $("#subjects-grid").addClass("ajax-sending");
//                },
//                complete : function() {
//                    $("#subjects-grid").removeClass("ajax-sending");
//                },
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

        }) //document Ready
</script>