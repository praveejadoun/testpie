<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invoice_id'); ?>
		<?php echo $form->textField($model,'invoice_id',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php  echo $form->label($model,'student_id'); ?>
		<?php  echo $form->textField($model,'student_id',array('size'=>60,'maxlength'=>255)); ?>
	</div><!--

	<div class="row">
		<?php // echo $form->label($model,'status'); ?>
		<?php // echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($model,'max_leave_count'); ?>
		<?php // echo $form->textField($model,'max_leave_count',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($model,'carry_forward'); ?>
		<?php // echo $form->textField($model,'carry_forward'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->