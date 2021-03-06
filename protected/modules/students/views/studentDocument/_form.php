
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'studentDocument-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>


<?php
//if ($form->errorSummary($model)) {
//    ;
?>


<!--    <div class="errorSummary">Input Error<br />
        <span>Please fix the following error(s).</span>
    </div>-->

<?php // } ?>
<p class="note">Fields with <span class="required">*</span> are required.</p>

<div class="formCon" style="background:url(images/yellow-pattern.png); width:100%; border:0px #fac94a solid; color:#000;">

</div>
<div class="formCon" >
    <div class="formConInner">


        <table width="85%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td valign="bottom" style="padding-bottom:3px;"><?php echo $form->labelEx($model, Yii::t('studentDocument', 'document_name')); ?></td>

            </tr>
            <tr>
                <td valign="top" width="45%"><?php echo $form->textField($model, 'document_name', array('size' => 32, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'document_name'); ?></td>
                <td>
                    <?php
                    if ($model->isNewRecord) {
                        echo $form->fileField($model, 'document_data');
                        echo $form->error($model, 'document_data');
                    } else {
                        if ($model->document_data == NULL) {
                            echo $form->fileField($model, 'document_data', array('onchange' => "return validateFileType()"));
                            echo $form->error($model, 'document_data');
                        } else {
                            if (Yii::app()->controller->action->id == 'update') {
                                echo '<ul  class="sub_act" ><li style="list-style:none;">';
                                echo CHtml::link(Yii::t('students', 'Download'), array('studentdocument/downloadImage', 'id' => $model->id, 'student_id' => $model->student_id), array('confirm' => 'Are you sure?'));
                                echo CHtml::link(Yii::t('students', 'Remove'), array('studentdocument/remove', 'id' => $model->id, 'student_id' => $_REQUEST['student_id']), array('confirm' => 'Are you sure?'));
                                echo '<img class="imgbrder" src="' . $this->createUrl('Studentdocument/DisplaySavedImage&id=' . $model->primaryKey) . '" alt="' . $model->document_file_name . '" width="50" height="50" />';
                                echo '</li></ul>';
                            } else if (Yii::app()->controller->action->id == 'create') {
                                echo CHtml::hiddenField('document_file_name', $model->document_file_name);
                                echo CHtml::hiddenField('document_content_type', $model->document_content_type);
                                echo CHtml::hiddenField('document_file_size', $model->document_file_size);
                                echo CHtml::hiddenField('document_data', bin2hex($model->document_data));
                                echo '<img class="imgbrder" src="' . $this->createUrl('Students/DisplaySavedImage&id=' . $model->primaryKey) . '" alt="' . $model->document_file_name . '" width="100" height="100" />';
                            }
                        }
                    }
                    ?>

                </td>
            <!--<td>
               <div class="row">
                <?php // echo $form->labelEx($model,'image'); ?>
                <?php // echo CHtml::activeFileField($model, 'image'); ?>
                <?php // echo $form->error($model,'image');   ?>
        </div>
                <?php //if($model->isNewRecord!='1'){   ?>
        <div class="row">
                <?php // echo CHtml::image(Yii::app()->request->baseUrl.'/banner/'.$model->image,"image",array("width"=>200));   ?>
        </div>
                <?php // }    ?>
            </td>-->
            </tr>
            <div class="row">
                <?php //echo $form->labelEx($model,'course_id');
                ?>
                <?php echo $form->hiddenField($model, 'student_id', array('value' => $_REQUEST['student_id'])); ?>
                <?php echo $form->error($model, 'student_id'); ?>
            </div>


        </table>
        <div class="row">
            <?php //echo $form->labelEx($model,'document_file_size');  ?>
            <?php echo $form->hiddenField($model, 'document_file_size'); ?>
            <?php echo $form->error($model, 'document_file_size'); ?>
        </div>

    </div>
    <div class="row">
        <?php //echo $form->labelEx($model,'is_active');  ?>
        <?php echo $form->hiddenField($model, 'is_active'); ?>
        <?php echo $form->error($model, 'is_active'); ?>
    </div>

    <div class="row">
        <?php //echo $form->labelEx($model,'is_deleted'); ?>
        <?php echo $form->hiddenField($model, 'is_deleted'); ?>
        <?php echo $form->error($model, 'is_deleted'); ?>
    </div>
    <div class="row">
        <?php
        if (Yii::app()->controller->action->id == 'document') {
            echo $form->hiddenField($model, 'created_at', array('value' => date('Y-m-d')));
        } else {
            echo $form->hiddenField($model, 'created_at');
        }
        echo $form->error($model, 'created_at');
        ?>
    </div>
    <div class="row">
        <?php
        echo $form->hiddenField($model, 'updated_at', array('value' => date('Y-m-d')));
        echo $form->error($model, 'updated_at');
        ?>
    </div>
</div>
<div class="clear"></div>
<div style="padding:0px 0 0 0px; text-align:left">

    <?php //echo CHtml::Button($model->isNewRecord ? 'Add Another' : 'Save',array('class'=>'formbut'));    ?>
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => 'formbut')); ?>

</div>


</div>
</div><!-- form -->
<?php $this->endWidget(); ?>
<script type="text/javascript">
    function star() {
        var year = '';
        var year_val = '';
        year = document.getElementById('experience_year');
        year_val = year.options[year.selectedIndex].value;
        if (year_val != '' && year_val != 0) {
            //alert(year_val);
            document.getElementById('required').style.visibility = 'visible';
        }
    }
    function star2() {
        var mnth = '';
        var mnth_val = '';
        mnth = document.getElementById('experience_month');
        mnth_val = mnth.options[mnth.selectedIndex].value;
        if (mnth_val != '' && mnth_val != 0) {
            //alert(year_val);
            document.getElementById('required').style.visibility = 'visible';
        }
    }
</script>
<script type="text/javascript">
    function validateFileType() {
        var fileInput = document.getElementById('StudentDocument_document_data');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Please upload file having extensions .jpeg/.jpg/.png only.');
            fileInput.value = '';
            return false;
        }
    }
</script>

