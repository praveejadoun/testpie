<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<?php if($list!=NULL)
{?>
<?php
//$sub = Employees::model()->findAll("is_deleted=:x", array(':x'=>0));

$data = '';

	$empy = EmployeeDepartments::model()->findAll();
	foreach($empy as $empy_1)
	{
		$emp_number=Employees::model()->findAll("employee_department_id=:x", array(':x'=>$empy_1->id));
	$data .='{name:"'.$empy_1->name.'",
			y:'.count($emp_number).',
			sliced: true,
			selected: true,},';
	}



//echo $data;
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top" width="75%"><div style="padding-left:20px;">
<h1><?php echo Yii::t('examination','Exams List');?></h1>
 <div class="edit_bttns" style="top:213px; right:20px;">
                    <ul>
                        <li> <?php echo CHtml::link(Yii::t('employees', '<span>Add New Exam</span>'), array('create'), array('class' => 'addbttn last ')); ?></li>
                    </ul>
                </div>
<div class="clear"></div>
  <div style="margin-top:20px; width:90%" id="container"></div>
  <div class="pdtab_Con" style="width:97%;padding:0px 0px 0px 0px;">
                <div style="font-size:13px; padding:5px 0px"><?php echo Yii::t('examination','<strong>Recent Employee Admissions</strong>');?></div>
                
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody> 
                    <tr class="pdtab-h">
                    
                      <td align="center" height="18" style="padding:5px 44px;"><?php echo Yii::t('examination','Sl.No');?></td>
                      <td align="center"style="padding:5px 44px;"><?php echo Yii::t('examination','Name');?></td>
                      <td align="center" style="padding:5px 44px;"><?php echo Yii::t('examination','Course');?></td>
                      <td align="center" style="padding:5px 44px;"><?php echo Yii::t('examination','Batch');?></td>
                      <td align="center" style="padding:5px 44px;"><?php echo Yii::t('examination','Status');?></td>
                     
                    </tr>
                  </tbody>
                   <?php
                                    if (isset($_REQUEST['page'])) {
                                      
                                        $i = ($pages->pageSize*$_REQUEST['page'])-9;
                                    } else {
                                        $i = 1;
                                    }
                                    $cls = "even";
                                    ?>
                  <?php foreach($list as $list_1)
	              { ?>
                    <tbody>
                    <tr>
                    <td align="center" style="padding:5px 44px;"><?php echo $i; ?></td>
                    <td align="center" style="padding:5px 44px;"><?php echo CHtml::link($list_1->name,array('view','id'=>$list_1->id)) ?>&nbsp;</td>
                    <td align="center" style="padding:5px 44px;"><?php echo $list_1->course_id; ?></td>
					<?php  //$dept = EmployeeDepartments::model()->findByAttributes(array('id'=>$list_1->employee_department_id)); ?>
                    <!--<td align="center"><?php // if($dept!=NULL){echo $dept->name; }else{ echo '-';}?> </td>-->
                    <td align="center" style="padding:5px 44px;"> <?php echo $list_1->batch_id?></td>
                    <?php //  $pos = EmployeePositions::model()->findByAttributes(array('id'=>$list_1->employee_position_id)); ?>
                    <!--<td align="center"><?php // if($pos!=NULL){echo $pos->name; }else{ echo '-';}?> </td>-->
                   <td style="padding:5px 44px;">
                                                
                            <select name="Applicants[status]" class="Applicants_status" rel="<?php echo $list_1->id ?>"<?php // echo ($list_1->status==2)?' disabled="true"':''?>>
                                <option value="1"<?php echo ($list_1->status==1)?' selected="selected"':''?>>Default</option>
                                <option value="2"<?php echo ($list_1->status==2)?' selected="selected"':''?>>Open</option>
                                <option value="3"<?php echo ($list_1->status==3)?' selected="selected"':''?>>Closed</option>
                                <option value="4"<?php echo ($list_1->status==4)?' selected="selected"':''?>>Result Published</option>
                            </select>
                    </td>
                    
                  </tr>
                     
               </tbody>
               <?php
               $i++;} ?>
                           
               </table>    
                 <div class="pagecon">
                                    <?php
                                    $this->widget('CLinkPager', array(
                                        'currentPage' => $pages->getCurrentPage(),
                                        'itemCount' => $item_count,
                                        'pageSize' => $page_size,
                                        'maxButtonCount' => 5,
                                        //'nextPageLabel'=>'My text >',
                                        'header' => '',
                                        'htmlOptions' => array('class' => 'pages'),
                                    ));
                                    ?>
                                </div> <!-- END div class="pagecon" 2 -->
                                <div class="clear"></div>
              </div>
 	</div></td>
        
      </tr>
    </table>
    </td>
  </tr>
</table>
<br />
<br />
<br />
<?php }
else
{ ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div style="padding:20px 20px">
<div class="yellow_bx" style="background-image:none;width:680px;padding-bottom:45px;">
                
                	<div class="y_bx_head" style="width:650px;">
                    	It appears that this is the first time that you are using this Open-School Setup. For any new installation we recommend that you configure the following:
                    </div>
                    <div class="y_bx_list" style="width:650px;">
                    	<h1><?php echo CHtml::link(Yii::t('employees','Create New Exam'),array('create')) ?></h1>
                        <!--<p>Before Creating Employees, make sure you created <?php // echo CHtml::link(Yii::t('employees','Employee Categories'),array('employeeCategories/create')) ?>, <?php // echo CHtml::link('Employee Departments',array('employeeDepartments/create')) ?><br/> and <?php // echo CHtml::link('Employee Positions',array('employeePositions/create')) ?>.</p>-->
                    </div>
                    
                </div>

                </div>
    
    
    </td>
  </tr>
</table>

<?php } ?>
<script>
     $('.Applicants_status').change(function () {
        
            sid = $(this).val();
            aid = $(this).attr('rel');
            const msg = (sid==2)?'Approved Application Cannot Be Revarted Back . Are You Sure ?':'Are you sure you want to change the status?';
        if (confirm(msg))
        {
            self.location = "index.php?r=examination/exam/changestatus&aid=" +aid+"&sid="+sid;
        }
    })
    </script>