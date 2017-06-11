<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
<?php
$this->breadcrumbs=array(
	'Examination'=>array('default/index'),
        'Result',
);
?>



<script type="text/javascript">
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
				<?php echo $data; ?>
				]
		}]
	});
});
</script>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
      <?php $this->renderPartial('/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1><?php echo Yii::t('result','Search Results');?></h1>

</div>
    </td>
  </tr>
</table>
</body>