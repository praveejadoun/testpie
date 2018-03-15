
<?php
$find = EmployeeSubjectwiseAttendances::model()->findAll("attendance_date=:x AND employee_id=:y", array(':x'=>$year.'-'.$month.'-'.$day,':y'=>$emp_id));
if(count($find)==0)
{
	
	/*
		Column with no leave marked
	*/
    
    
        echo CHtml::link('<span>'.Yii::t('employeeSubjectWiseAttendance','Mark Leave').'</span>', array('#'),array('id'=>'add_subjectss','class' => 'at_abs','style'=>'color:#FF6600;'));

//echo CHtml::ajaxLink(Yii::t('job','mark leave'),$this->createUrl('teachersubjectattendance/Addnew'),array(
//        'onclick'=>'$("#jobDialog").dialog("open"); return false;',
//        'update'=>'#jobDialog','type' =>'GET','data'=>array('day' =>$day,'month'=>$month,'year'=>$year,'emp_id'=>$emp_id),
//        ),array('id'=>'showJobDialog','class' => 'at_abs', 'title' => 'Add leave'));
		//echo '<div id="jobDialog'.$day.$emp_id.'"></div>';
        // 'eid'=>$find[0]['id']
}
 else {
    
    echo CHtml::link('<span>'.Yii::t('employeeSubjectWiseAttendance','Update').'</span>', array('#'),array('id'=>'update','style'=>'color:#008000;'));
    echo '&nbsp;|&nbsp;';
    echo CHtml::link('<span>'.Yii::t('employeeSubjectWiseAttendance','Delete').'</span>', array('delete','id'=>$find[0]['id']),array('confirm'=>Yii::t('students','Are you Sure?'),'style'=>'color:red;'));
   
    echo '<p style="font-size:15px;color:#0000ff;">'.Absent.'</p>';

}

?>

<script type="text/javascript">
    $(function() {
        
        
        //CREATE 

    $('#add_subjectss ').bind('click', function() {
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=attendance/teacherSubjectAttendance/returnForm",
            data:{"employee_id":"<?php echo $emp_id;?>","class_timing_id":"<?php echo $c_t_id;?>","attendance_date":"<?php echo $year.'-'.$month.'-'.$day; ?>","batch_id":"<?php echo $batch_id;?>","YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
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
<script type="text/javascript">
    $(function(){
          //UPDATE 

    $('#update ').bind('click', function() {
    
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=attendance/teacherSubjectAttendance/returnForm",
            data:{"update_id":<?php echo $find[0]['id'];?>,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
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

    });
    </script>
    <script type="text/javascript">
        $(function(){
            
// DELETE

    var deletes = new Array();
    var dialogs = new Array();
    $('#delete').bind('click',function() {
        var id = <?php echo $find[0]['id'];?>
        deletes[id] = function() {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=attendance/teacherSubjectAttendance/ajax_delete",
                data:{"id":id,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                    beforeSend : function() {
                    $("#subjects-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#subjects-grid").removeClass("ajax-sending");
                },
                success: function(data) {
                    var res = jQuery.parseJSON(data);
					 var del=res['msg'];
                     var page=$("li.selected  > a").text();
                    $.fn.yiiGridView.update('subjects-grid', {url:'<?php echo Yii::app()->request->getUrl()?>',data:{"Subjects_page":page}});
                }//success
            });//ajax
        };//end of deletes

        dialogs[id] =
                        $('<div style="text-align:center;"></div>')
                        .html('<?php echo  $del_con; ?>')
                       .dialog(
                        {
                            autoOpen: false,
                            title: '<?php echo  $del_title; ?>',
                            modal:true,
                            resizable:false,
                            buttons: [
                                {
                                    text: "<?php echo  $del; ?>",
                                    click: function() {
                                                                      deletes[id]();
                                                                      $(this).dialog("close");
																	  $("#success_flash").css("display","block").animate({opacity: 1.0}, 3000).fadeOut("slow");
                                                                      }
                                },
                                {
                                   text: "<?php echo $cancel; ?>",
                                   click: function() {
                                                                     $(this).dialog("close");
                                                                     }
                                }
                            ]
                        }
                );

        $(this).bind('click', function() {
                                                                      dialogs[id].dialog('open');
                                                                       // prevent the default action, e.g., following a link
                                                                      return false;
                                                                     });
    });//each end

        });//bind_crud end

        </script>