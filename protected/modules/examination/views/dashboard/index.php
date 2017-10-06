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

/*$data = '';

	$empy = EmployeeDepartments::model()->findAll();
	foreach($empy as $empy_1)
	{
		$emp_number=Employees::model()->findAll("employee_department_id=:x", array(':x'=>$empy_1->id));
	$data .='{name:"'.$empy_1->name.'",
			y:'.count($emp_number).',
			sliced: true,
			selected: true,},';
	}*/



//echo $data;
?>
<!-- <script type="text/javascript">
var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
		chart: {
			renderTo: 'container',
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false
		},
		title: {
			text: 'Employee Strength'
		},
		tooltip: {
			formatter: function() {
				return '<b>'+ this.point.name +'</b>: '+ Math.round(this.percentage*100)/100 +' %';
			}
		},
		credits: {
			enabled: false
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				borderWidth:0,
				shadow:0,
				dataLabels: {
					enabled: true,
					color: '#969698',
					connectorColor: '#d8d8d8',
					formatter: function() {
						return '<b>'+ this.point.name +'</b>: '+ Math.round(this.percentage*100)/100 +' %';
					}
				}
			}
		},
		
		series: [{
			type: 'pie',
			name: 'Employee Strenght',
			data: [
				<?php // echo $data; ?>
				]
		}]
	});
});
</script> -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top" width="75%"><div style="padding-left:20px;">
<h1><?php echo Yii::t('examination','Examination');?></h1>
<div class="overview" >
	<div class="overviewbox ovbox1" style="width:216px;">
    	<h1><?php echo Yii::t('examination','<strong>Total Exams</strong>');?></h1>
        <div class="ovrBtm"><?php echo $total ?></div>
    </div>
    <div class="overviewbox ovbox2"style="left:245px;width:216px;">
    	<h1><?php echo Yii::t('examination','<strong>Result Published Exams</strong>');?></h1>
        <div class="ovrBtm"><?php $qwe= Examination::model()->findAll('is_deleted=:x AND status=:y',array(':x'=>0,':y'=>4));echo count($qwe);?></div>
    </div>
  <!--  <div class="overviewbox ovbox3">
    	<h1><?php //echo Yii::t('employees','<strong>Inactive Users</strong>');?></h1>
        <div class="ovrBtm">0</div>
    </div>-->
  <div class="clear"></div>
    
</div>
<div class="clear"></div>
  <div style="margin-top:20px; width:90%" id="container"></div>
  <div class="pdtab_Con" style="width:97%">
                <div style="font-size:13px; padding:5px 0px"><?php echo Yii::t('examination','<strong>Recent Exams</strong>');?></div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr class="pdtab-h">
                      <td align="center" height="18"><?php echo Yii::t('examination','Sl.No');?></td>
                      <td align="center"><?php echo Yii::t('examination','Name');?></td>
                      <td align="center"><?php echo Yii::t('examination','Course');?></td>
                      <td align="center"><?php echo Yii::t('examination','Batch');?></td>
                      <td align="center"><?php echo Yii::t('examination','Status');?></td>
                      
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
                    <td align="center"><?php echo $i; ?></td>
                    <td align="center"><?php echo CHtml::link($list_1->name) ?>&nbsp;</td>
                    
					<?php  $cou = Courses::model()->findByAttributes(array('id'=>$list_1->course_id)); ?>
                    <td align="center"><?php  if($cou!=NULL){echo $cou->course_name; }else{ echo '-';}?> </td>
                    <?php  $bat = Batches::model()->findByAttributes(array('id'=>$list_1->batch_id)); ?>
                    <td align="center"><?php if($bat!=NULL){echo $bat->name; }else{ echo '-';}?> </td>
                    <td align="center">
                         <?php if($list_1->status=='1')
                        {
                        echo 'Default';
                        }elseif($list_1->status=='2')
                        {
                        echo 'Open';   
                        }elseif($list_1->status=='3')
                        {
                        echo 'Closed';
                        }elseif($list_1->status=='4')
                        {
                        echo 'Result Published';
                        }
                        ?>
                    </td>
                    
                  </tr>
                     
               </tbody>
               <?php
               } ?>
                               
               </table>
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
                    	<h1><?php echo CHtml::link(Yii::t('employees','Create New Employee'),array('create')) ?></h1>
                        <p>Before Creating Employees, make sure you created <?php echo CHtml::link(Yii::t('employees','Employee Categories'),array('employeeCategories/create')) ?>, <?php echo CHtml::link('Employee Departments',array('employeeDepartments/create')) ?><br/> and <?php echo CHtml::link('Employee Positions',array('employeePositions/create')) ?>.</p>
                    </div>
                    
                </div>

                </div>
    
    
    </td>
  </tr>
</table>

<?php } ?>
