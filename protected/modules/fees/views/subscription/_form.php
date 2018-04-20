<div class="formCon">
    <div class="formConInner">
        <link
            href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"
            rel="stylesheet" type="text/css" />
        <script
            src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"
        type="text/javascript"></script>
        <script
            src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"
        type="text/javascript"></script>
        <script
            src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"
        type="text/javascript"></script>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'subscription-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
        ?>

        <table width="80%" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <h3>Setup a Subscription Method</h3>
            <td>
                <p>Start Date<span class="required">*</span></p>
                <?php // echo $form->labelEx($model,Yii::t('subscription','start_date'));  ?>
            </td>

            <td><div>
                    <?php
                    $date = 'dd-mm-yy';

                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        //'name'=>'Students[admission_date]',
                        'model' => $model,
                        'attribute' => 'start_date',
                        // additional javascript options for the date picker plugin
                        'options' => array(
                            'showAnim' => 'fold',
                            'dateFormat' => $date,
                            'changeMonth' => true,
                            'changeYear' => true,
                            'yearRange' => '1900:2030'
                        ),
                        'htmlOptions' => array(
                            'style' => 'height:20px;',
                            'id' => 'start'
                        ),
                    ));
                    ?>
                    <?php echo $form->error($model, 'start_date'); ?></div></td>

            <td>
                <p>End Date<span class="required">*</span></p>
                <?php //echo $form->labelEx($model,Yii::t('subscription','end_date'));  ?>
            </td>
            <td>&nbsp;</td>
            <td><div>
                    <?php
                    $date = 'dd-mm-yy';

                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        //'name'=>'Students[admission_date]',
                        'model' => $model,
                        'attribute' => 'end_date',
                        // additional javascript options for the date picker plugin
                        'options' => array(
                            'showAnim' => 'fold',
                            'dateFormat' => $date,
                            'changeMonth' => true,
                            'changeYear' => true,
                            'yearRange' => '1900:2030'
                        ),
                        'htmlOptions' => array(
                            'style' => 'height:20px;'
                        ),
                    ));
                    ?>
                    <?php echo $form->error($model, 'end_date'); ?></div></td>

            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><?php echo $form->checkBox($model, 'is_divide_fee_by_nos', array('value' => '1', 'uncheckValue' => '0')); ?>
                    <?php echo $form->error($model, 'is_divide_fee_by_nos'); ?></td>
                <td><?php echo $form->labelEx($model, Yii::t('subscription', 'is_divide_fee_by_nos')); ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
        </table>
        <table width="80%" border="0" cellspacing="0" cellpadding="0">
            <h3>Setup a Subscription Method</h3>
            <tr>

                <td><div class="cr_align" >

                        <?php echo $form->dropdownlist($model, 'subscription_type', array('1' => 'One Time', '2' => 'Repeat Every'), array('id' => 'selectMe')); ?>
                        <?php echo $form->error($model, 'subscription_type'); ?>
                    </div></td>



            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
        </table>
        <div id="1" class="group">
            <div id="payment_types">
                <div class="white_bx">
                    <div class="triangle-up"></div>
                    <table width="45%">
                        <tr>
                            <td>
                                <?php //echo $form->labelEx($model,Yii::t('subscription','due_date'));  ?>
                                <p>Due Date<span class="required">*</span></p>
                            </td>
                            <td><div>
                                    <?php // echo $form->textField($model,'due_date[]',array('id'=>'myDate3','class'=>'datepicker')); ?>
                                    <?php
                                    $date = 'dd-mm-yy';

                                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'name' => 'FinanceFeeSubscription[one_time_due_date]',
                                        'model' => $model,
                                        //'attribute'=>'due_date',
                                        // additional javascript options for the date picker plugin
                                        'options' => array(
                                            'showAnim' => 'fold',
                                            'dateFormat' => $date,
                                            'changeMonth' => true,
                                            'changeYear' => true,
                                            'yearRange' => '1900:2030'
                                        ),
                                        'htmlOptions' => array(
                                            'style' => 'height:20px;'
                                        ),
                                    ));
                                    ?>
                                    <?php echo $form->error($model, 'due_date'); ?></div></td>
                      <!--        <td><label>Due Date <span class="required">*</span></label></td>
                              <td>
                                  <input value="1" name="FeeCategories[subscription_type]" id="FeeCategories_subscription_type" type="hidden" /><input readonly="readonly" id="FeeSubscriptions_due_date_1510040568" name="FeeSubscriptions[due_date][1510040568]" type="text" />        </td>-->
                        </tr>
                    </table>
                </div>        </div>
        </div>
        <div id="2" class="group">
            <div id="payment_types">
                <div class="white_bx">
                    <div class="triangle-up"></div>
                    <table width="45%">
                        <tr>
                            <td><?php echo $form->labelEx($model, Yii::t('subscription', 'recurring_interval')); ?></td>
                            <td><?php echo $form->dropdownlist($model, 'recurring_interval', array('3' => 'Half Yearly', '4' => 'Quaterly', '5' => 'custom'), array('id' => 'selectUs')); ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div id="3" class ="sunil">
                                    <p>Due Date<span class="required">*</span></p>
                                    <?php //echo $form->labelEx($model,Yii::t('subscription','due_date'));  ?>
                                    <br/>
                                    <?php
                                    $date = 'dd-mm-yy';

                                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'name' => 'FinanceFeeSubscription[half_yearly_due_date][0]',
                                        'model' => $model,
                                        //'attribute'=>'due_date',
                                        // additional javascript options for the date picker plugin
                                        'options' => array(
                                            'showAnim' => 'fold',
                                            'dateFormat' => $date,
                                            'changeMonth' => true,
                                            'changeYear' => true,
                                            'yearRange' => '1900:2030'
                                        ),
                                        'htmlOptions' => array(
                                            'style' => 'height:20px;'
                                        ),
                                    ));
                                    ?>
                                    <br/><br/>
                                    <?php
                                    $date = 'dd-mm-yy';

                                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'name' => 'FinanceFeeSubscription[half_yearly_due_date][1]',
                                        'model' => $model,
                                        //'attribute'=>'due_date',
                                        // additional javascript options for the date picker plugin
                                        'options' => array(
                                            'showAnim' => 'fold',
                                            'dateFormat' => $date,
                                            'changeMonth' => true,
                                            'changeYear' => true,
                                            'yearRange' => '1900:2030'
                                        ),
                                        'htmlOptions' => array(
                                            'style' => 'height:20px;'
                                        ),
                                    ));
                                    ?>


                                    <?php //$due_date = array();?>
                                    <?php //echo $form->textField($model,'due_date[]',array('id'=>'myDate1','class'=>'datepicker'));?>
                                    <?php //echo $form->textField($model,'due_date[]',array('id'=>'myDate2','class'=>'datepicker'));?>
<!--       <input type='text' id='myDate1' class="datepicker"/>
<input type="hidden"  id="myDate1_alt"/>        -->
                                    <br/><br/>
                                    <!--<input type='text' id='myDate2' class="datepicker"/>
                                    <input type="hidden"  id="myDate2_alt"/>    -->
                                </div>
                                <div id="4" class="sunil">
                                    <p>Due Date<span class="required">*</span></p>
                                    <?php //echo $form->labelEx($model,Yii::t('subscription','due_date')); ?>
                                    <br/>
                                    <?php
                                    $date = 'dd-mm-yy';

                                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'name' => 'FinanceFeeSubscription[quaterly_due_date][0]',
                                        'model' => $model,
                                        //'attribute'=>'due_date',
                                        // additional javascript options for the date picker plugin
                                        'options' => array(
                                            'showAnim' => 'fold',
                                            'dateFormat' => $date,
                                            'changeMonth' => true,
                                            'changeYear' => true,
                                            'yearRange' => '1900:2030'
                                        ),
                                        'htmlOptions' => array(
                                            'style' => 'height:20px;'
                                        ),
                                    ));
                                    ?>
                                    <br/><br/>
                                    <?php
                                    $date = 'dd-mm-yy';

                                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'name' => 'FinanceFeeSubscription[quaterly_due_date][1]',
                                        'model' => $model,
                                        //'attribute'=>'due_date',
                                        // additional javascript options for the date picker plugin
                                        'options' => array(
                                            'showAnim' => 'fold',
                                            'dateFormat' => $date,
                                            'changeMonth' => true,
                                            'changeYear' => true,
                                            'yearRange' => '1900:2030'
                                        ),
                                        'htmlOptions' => array(
                                            'style' => 'height:20px;'
                                        ),
                                    ));
                                    ?>
                                    <br/><br/>
                                    <?php
                                    $date = 'dd-mm-yy';

                                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'name' => 'FinanceFeeSubscription[quaterly_due_date][2]',
                                        'model' => $model,
                                        //'attribute'=>'due_date',
                                        // additional javascript options for the date picker plugin
                                        'options' => array(
                                            'showAnim' => 'fold',
                                            'dateFormat' => $date,
                                            'changeMonth' => true,
                                            'changeYear' => true,
                                            'yearRange' => '1900:2030'
                                        ),
                                        'htmlOptions' => array(
                                            'style' => 'height:20px;'
                                        ),
                                    ));
                                    ?>
                                    <br/><br/>
                                    <?php
                                    $date = 'dd-mm-yy';

                                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'name' => 'FinanceFeeSubscription[quaterly_due_date][3]',
                                        'model' => $model,
                                        //'attribute'=>'due_date',
                                        // additional javascript options for the date picker plugin
                                        'options' => array(
                                            'showAnim' => 'fold',
                                            'dateFormat' => $date,
                                            'changeMonth' => true,
                                            'changeYear' => true,
                                            'yearRange' => '1900:2030'
                                        ),
                                        'htmlOptions' => array(
                                            'style' => 'height:20px;'
                                        ),
                                    ));
                                    ?>


                                </div>

                                <div id="5" class="sunil">
                                    <p>Due Date<span class="required">*</span></p>



                                    <!--                                    <div id="name_data">
                                                                            <p>
                                                                                Date: <input id="datepicker" name="name[0][date]"></p>
                                                                        </div>
                                                                        <p><input id="add" type="button" name="add" value="Add more"></p>-->




                                    <div id="importantDates">
                                        <input class="myDate" type="text" name="inputDate[]" size="10" value=""/>
                                        <div class="myTemplate" style="display:none">
                                            <p>
                                                <input type="text" name="inputDate[]" size="10" value=""/>
                                                <a href ="javscript:void(0);" id="remove" title ="lick to remove"><strong>Remove</strong></a>
                                            </p>
                                        </div>
                                    </div>
<!--                                    <button class='add_field_button btn btn-sm btn-warning'><i class="glyphicon glyphicon-plus"></i></button>-->
                                    <a href="javascript:void(0);" id="moreDates" title="Click to add custom due date"><strong> + Add More date</strong></a>



                                    <!--                <div id="emails">-->
                                    <!--    <div>-->
                                    <!--<input type="text" id="datepicker" /><button onclick="del(this)">Delete</button>-->

                                    <?php
//
//			$date = 'dd-mm-yy';
//
//						$this->widget('zii.widgets.jui.CJuiDatePicker', array(
//								'name'=>'FinanceFeeSubscription[custom_due_date][]',
//								'model'=>$model,
//								//'attribute'=>'start_date',
//								// additional javascript options for the date picker plugin
//								'options'=>array(
//									'showAnim'=>'fold',
//									'dateFormat'=>$date,
//									'changeMonth'=> true,
//									'changeYear'=>true,
//									'yearRange'=>'1900:2030'
//								),
//								'htmlOptions'=>array(
//									'style'=>'height:20px;',
//                                                                        'id'=>'custom'
//
//								),
//							));
                                    ?>
                                    <!--    </div>
                                    </div>-->
                                    <!--                <a href="javascript:void(0);" title="Click to add custom due date" class="add-particular-access" style="font-size:12px;" data-row="0" onclick="add()">
                                                                                    <strong>+ Add access</strong>
                                                                                </a>-->
                                </div>
                            </td>
                        </tr>
                        <!--    <tr>

                                 <td><?php // echo $form->labelEx($model,Yii::t('subscription','due_date'));                                                                                                                                                                                                              ?></td>
                              <td><div>
                        <?php
//			$date = 'dd-mm-yy';
//
//						$this->widget('zii.widgets.jui.CJuiDatePicker', array(
//								//'name'=>'Students[admission_date]',
//								'model'=>$model,
//								'attribute'=>'due_date',
//								// additional javascript options for the date picker plugin
//								'options'=>array(
//									'showAnim'=>'fold',
//									'dateFormat'=>$date,
//									'changeMonth'=> true,
//									'changeYear'=>true,
//									'yearRange'=>'1900:2030'
//								),
//								'htmlOptions'=>array(
//									'style'=>'height:20px;'
//								),
//							));
                        ?>
                        <?php // echo $form->error($model,'due_date');  ?></div></td>
                                <td><label>Due Date <span class="required">*</span></label></td>
                                <td>
                                    <input value="1" name="FeeCategories[subscription_type]" id="FeeCategories_subscription_type" type="hidden" /><input readonly="readonly" id="FeeSubscriptions_due_date_1510040568" name="FeeSubscriptions[due_date][1510040568]" type="text" />        </td>
                            </tr>-->
                    </table>
                </div>        </div>

        </div>



        <div class="row">
            <?php //echo $form->labelEx($model,'is_deleted'); ?>
            <?php echo $form->hiddenField($model, 'is_deleted'); ?>
            <?php echo $form->error($model, 'is_deleted'); ?>
        </div>

        <div class="row">

            <?php //echo $form->labelEx($model,'created_at'); ?>
            <?php
            if (Yii::app()->controller->action->id == 'index') {
                echo $form->hiddenField($model, 'created_at', array('value' => date('Y-m-d H:i:s')));
            } else {
                echo $form->hiddenField($model, 'created_at');
            }
            ?>
            <?php echo $form->error($model, 'created_at'); ?>
        </div>

        <div class="row">
            <?php //echo $form->labelEx($model,'updated_at');  ?>
            <?php echo $form->hiddenField($model, 'updated_at', array('value' => date('Y-m-d H:i:s'))); ?>
            <?php echo $form->error($model, 'updated_at'); ?>
        </div>



    </div>
</div>
<div style="padding:0px 0 0 0px;">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save', array('class' => 'formbut', 'id' => 'btn')); ?>
</div>
<?php $this->endWidget(); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('.group').hide();
        $('#1').show();
        $('#selectMe').change(function () {
            $('.group').hide();
            $('#' + $(this).val()).show();
        });
        $('.sunil').hide();
        $('#3').show();
        $('#selectUs').change(function () {
            $('.sunil').hide();
            $('#' + $(this).val()).show();
        });
    });</script>
<script type="text/javascript">
//        var numAdd = 1;
//var add = function() {
//    if (numAdd >= 10) return;
//    $('#emails').append('<div><input type="text" id="datepicker"/><button onclick="del(this)">Delete</button></div>');
//    numAdd++;
//    $("#emails").append(datePicker);
//};
//
//var del = function(btn) {
//    $(btn).parent().remove();
//};
</script>
<script type="text/javascript">
    $(document).ready(function () {

        var myCounter = 0;
        $(".myDate").datepicker({dateFormat: 'dd-mm-yy'}).val();
        $("#moreDates").click(function () {

            $('.myTemplate')
                    .clone()
                    .removeClass("myTemplate")
                    .addClass("additionalDate")
                    .show()
                    .appendTo('#importantDates');
            myCounter++;
            $('.additionalDate input[name="inputDate[]"]').each(function (index) {
                $(this).addClass("myDate");
                $(this).attr("name", $(this).attr("name"));
                // $(this).attr("id", +myCounter);
                // $("input[name='inputDate[1]']").val();
            });
            $(".myDate").on('focus', function () {
                var $this = $(this);
                if (!$this.data('datepicker')) {
                    $this.removeClass("hasDatepicker");
                    $this.datepicker({dateFormat: 'dd-mm-yy'}).val();
                    $this.datepicker("show");
                }
            });
            $('#remove').live('click', function () {
                $(this).parent().fadeOut(300, function () {
                    $(this).empty();
                    return false;
                });
            })

        });
    });</script>

<script>
    $(document).ready(function () {

//        $("#subscription-form").submit(function (e) {
//            //$("#btn").attr('disabled', 'true');
//
//            start_date = $('#start').val();
//            end_date = $('#FinanceFeeSubscription_end_date').val();
//            due_date = $('#FinanceFeeSubscription_one_time_due_date').val();
//            half_yearly_due_date_0 = $('#FinanceFeeSubscription_half_yearly_due_date_0').val();
//            half_yearly_due_date_1 = $('#FinanceFeeSubscription_half_yearly_due_date_1').val();
//            quaterly_due_date_0 = $('#FinanceFeeSubscription_quaterly_due_date_0').val();
//            quaterly_due_date_1 = $('#FinanceFeeSubscription_quaterly_due_date_1').val();
//            quaterly_due_date_2 = $('#FinanceFeeSubscription_quaterly_due_date_2').val();
//            quaterly_due_date_3 = $('#FinanceFeeSubscription_quaterly_due_date_3').val();
//
//
//            //alert(due_date);
//            var startdate = start_date.split('-');
//            start_date = new Date();
//            start_date.setFullYear(startdate[2], startdate[1] - 1, startdate[0]);
//
//            var enddate = end_date.split('-');
//            end_date = new Date();
//            end_date.setFullYear(enddate[2], enddate[1] - 1, enddate[0]);
//
//            var duedate = due_date.split('-');
//            due_date = new Date();
//            due_date.setFullYear(duedate[2], duedate[1] - 1, duedate[0]);
//
//            var h_f_due_date_0 = half_yearly_due_date_0.split('-');
//            half_yearly_due_date_0 = new Date();
//            half_yearly_due_date_0.setFullYear(h_f_due_date_0[2], h_f_due_date_0[1] - 1, h_f_due_date_0[0]);
//
//            var h_f_due_date_1 = half_yearly_due_date_1.split('-');
//            half_yearly_due_date_1 = new Date();
//            half_yearly_due_date_1.setFullYear(h_f_due_date_1[2], h_f_due_date_1[1] - 1, h_f_due_date_1[0]);
//
//            var q_f_due_date_0 = quaterly_due_date_0.split('-');
//            quaterly_due_date_0 = new Date();
//            quaterly_due_date_0.setFullYear(q_f_due_date_0[2], q_f_due_date_0[1] - 1, q_f_due_date_0[0]);
//
//            var q_f_due_date_1 = quaterly_due_date_1.split('-');
//            quaterly_due_date_1 = new Date();
//            quaterly_due_date_1.setFullYear(q_f_due_date_1[2], q_f_due_date_1[1] - 1, q_f_due_date_1[0]);
//
//            var q_f_due_date_2 = quaterly_due_date_2.split('-');
//            quaterly_due_date_2 = new Date();
//            quaterly_due_date_2.setFullYear(q_f_due_date_2[2], q_f_due_date_2[1] - 1, q_f_due_date_2[0]);
//
//            var q_f_due_date_3 = quaterly_due_date_3.split('-');
//            quaterly_due_date_3 = new Date();
//            quaterly_due_date_3.setFullYear(q_f_due_date_3[2], q_f_due_date_3[1] - 1, q_f_due_date_3[0]);
//
//            if (start_date > end_date)
//            {
//                alert("Invalid Date Range!\nStart Date cannot be after End Date!")
//
//                return false;
//            } else if (due_date < start_date || due_date > end_date) {
//                alert("Due Date is in between star date and end date");
//                return false;
//            } else if (half_yearly_due_date_0 < start_date || half_yearly_due_date_0 > end_date) {
//                alert("Due Date is in between st & dt");
//                return false;
//            } else if (half_yearly_due_date_1 < start_date || half_yearly_due_date_1 > end_date) {
//                alert("Due Date is in between s & d");
//                return false;
//            } else if (quaterly_due_date_0 < start_date || quaterly_due_date_0 > end_date) {
//                alert("Due Date is in between q_d_0");
//                return false;
//            } else if (quaterly_due_date_1 < start_date || quaterly_due_date_1 > end_date) {
//                alert("Due Date is in between q_d_1");
//                return false;
//            } else if (quaterly_due_date_2 < start_date || quaterly_due_date_2 > end_date) {
//                alert("Due Date is in between q_d_2");
//                return false;
//            } else if (quaterly_due_date_3 < start_date || quaterly_due_date_3 > end_date) {
//                alert("Due Date is in between q_d_3");
//                return false;
//            }
//            var optionSelected = false;
//            // alert($('#selectMe').val());
//            subscription_type = $('#selectMe').val();
//            recurring_interval = $('#selectUs').val();
//            if ($('#start').val().length == 0) {
//                //return true;
//                $("#start").css("border-color", "red");
//            } else if ($('#FinanceFeeSubscription_end_date').val().length == 0) {
//
//                $("#FinanceFeeSubscription_end_date").css("border-color", "red");
//            }
////            if ($('#FinanceFeeSubscription_end_date').val().length != 0) {
////                return true;
////            } else {
////
////            }
//
//
//            if (subscription_type == 1)
//            {
//                if ($('#FinanceFeeSubscription_one_time_due_date').val().length != 0) {
//                    return true;
//                } else {
//                    $("#FinanceFeeSubscription_one_time_due_date").css("border-color", "red");
//                }
//            } else if (subscription_type == 2) {
//                if (recurring_interval == 3) {
//                    if ($('#FinanceFeeSubscription_half_yearly_due_date_0').val().length == 0) {
//
//                        $("#FinanceFeeSubscription_half_yearly_due_date_0").css("border-color", "red");
//                    } else if ($('#FinanceFeeSubscription_half_yearly_due_date_1').val().length == 0) {
//
//                        $("#FinanceFeeSubscription_half_yearly_due_date_1").css("border-color", "red");
//                    } else
//                    {
//                        return true;
//                    }
//                } else if (recurring_interval == 4) {
//                    if ($('#FinanceFeeSubscription_quaterly_due_date_0').val().length == 0) {
//
//                        $("#FinanceFeeSubscription_quaterly_due_date_0").css("border-color", "red");
//
//                    } else if ($('#FinanceFeeSubscription_quaterly_due_date_1').val().length == 0) {
//
//                        $("#FinanceFeeSubscription_quaterly_due_date_1").css("border-color", "red");
//
//                    } else if ($('#FinanceFeeSubscription_quaterly_due_date_2').val().length == 0) {
//
//                        $("#FinanceFeeSubscription_quaterly_due_date_2").css("border-color", "red");
//
//                    } else {
//
//                        return true;
//                    }
//
//                } else if (recurring_interval == 5) {
//                    alert("qwerty");
//
//                } else {
//                    return true;
//                }
//                //alert($('#selectUs').val());
//            }
//
//
//
//
////            if (due_date < end_date)
////            {
////                alert("Invalid Date Range!\n due Date less than End Date!")
////                return false;
////            }
//
//
//
//
//
//
//
//
////            if ($('#FinanceFeeSubscription_one_time_due_date').val().length != 0) {
////                return true;
////            } else {
////                $("#FinanceFeeSubscription_one_time_due_date").css("border-color", "red");
////            }
////            if ($('#FinanceFeeSubscription_half_yearly_due_date_0').val().length != 0) {
////                return true;
////            } else {
////                $("#FinanceFeeSubscription_half_yearly_due_date_0").css("border-color", "red");
////            }
////            if ($('#FinanceFeeSubscription_half_yearly_due_date_1').val().length != 0) {
////                return true;
////            } else {
////                $("#FinanceFeeSubscription_half_yearly_due_date_1").css("border-color", "red");
////            }
////            if ($('#FinanceFeeSubscription_quaterly_due_date_0').val().length != 0) {
////                return true;
////            } else {
////                $("#FinanceFeeSubscription_quaterly_due_date_0").css("border-color", "red");
////            }
////            if ($('#FinanceFeeSubscription_quaterly_due_date_1').val().length != 0) {
////                return true;
////            } else {
////                $("#FinanceFeeSubscription_quaterly_due_date_1").css("border-color", "red");
////            }
////            if ($('#FinanceFeeSubscription_quaterly_due_date_2').val().length != 0) {
////                return true;
////            } else {
////                $("#FinanceFeeSubscription_quaterly_due_date_2").css("border-color", "red");
////            }
////            if ($('#FinanceFeeSubscription_quaterly_due_date_3').val().length != 0) {
////                return true;
////            } else {
////                $("#FinanceFeeSubscription_quaterly_due_date_3").css("border-color", "red");
////            }
//
//            //inputs = document.getElementsByClassName("inputDate[]");
////            for (var i = 0; i < inputs.length; i++) {
////                if ($('#1').val().length != 0) {
////                    return true;
////                } else {
////                    $("#1").css("border-color", "red");
////                }
//
////        validateInput.call(inputs[i]);
////        if(inputs[i].value==="") hasEmpty = true;
//            //}
//            e.preventDefault();
//        });
    });
//    $(document).ready(function () {
//        var max_fields = 100; //maximum input boxes allowed
//        var wrapper = $(".input_fields_wrap"); //Fields wrapper
//        var add_button = $(".add_field_button"); //Add button ID
//
//
//        var x = 1; //initlal text box count
//        $(add_button).click(function (e) { //on add input button click
//            e.preventDefault();
//            if (x < max_fields) { //max input box allowed
//                x++; //text box increment
//
//                $(".myDate").datepicker({dateFormat: 'dd-mm-yy'}).val();
//                $(wrapper).append('<div class="input_fields_wrap"><label> <span id="follower_name_error" class="text-danger "> </span><br><input type="text" name="inputDate[' + x + ']" id="follower_name" placeholder="Name " class="myDate" autocomplete="off" max="60"  ></label><a href="#" class="remove_field btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a><div class="clearfix"></div></div> '); //add input box
//
//                $(".myDate").on('focus', function () {
//                    var $this = $(this);
//                    if (!$this.data('datepicker')) {
//                        $this.removeClass("hasDatepicker");
//                        $this.datepicker({dateFormat: 'dd-mm-yy'}).val();
//                        $this.datepicker("show");
//                    }
//                });
//            }
//
//        });
//
//        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
//            e.preventDefault();
//            $(this).parent('div').remove();
//            x--;
//        })
    // });</script>
<script>
    $(document).ready(function () {

//        var x = 0;
//        $("#datepicker").datepicker({dateFormat: 'yy-mm-dd'}).val();
//        $("#add").click(function () {
//
//            x++;
//            $("#datepicker[" + 1 + "]").datepicker({dateFormat: 'yy-mm-dd'}).val();
//            $("#name_data").append('<p> Date: <input id="datepicker[' + x + ']" name="name[' + x + '][date]" type="text"> <input id="remove' + x + '" type="button" name="remove" value="remove"></p>');
//            $("#remove" + x).click(function () {
//
//                $(this).parent('p').remove();
//            });
//        });
    });</script>

<script>
//    $(document).ready(function () {
//        $('.formbut').click(function () {
//            var optionSelected = false;
//            if ($('#start').val().length == 0) {
//                $("#start").css("border", "1px solid red");//more efficient
//                return false;
//            }
//            if ($('#FinanceFeeSubscription_end_date').val().length == 0) {
//                $("#FinanceFeeSubscription_end_date").css("border", "1px solid red");//more efficient
//                return false;
//            }
//        });
//    });
</script>
<script type="text/javascript">
    // $(document).ready(function () {
//    function sunil() {
//        if ($('#FinanceFeeSubscription_one_time_due_date').val().length == 0) {
//
//            alert("sunil");
//
//
//        }
////        alert("sunil");
//        //        return false;
//    }
    // });
</script>