<!--upgrade_div_starts-->
<div class="upgrade_bx">
    <!--	<div class="up_banr_imgbx"></div>
            <div class="up_banr_firstbx">
              <h1></h1>
              
        </div>-->

</div>
<!--upgrade_div_ends-->
<div id="othleft-sidebar">
    <!--<div class="lsearch_bar">
                    <input type="text" name="" class="lsearch_bar_left" value="Search">
                    <input type="button" name="" class="sbut">
                    <div class="clear"></div>
      </div>-->
    <h1><?php echo Yii::t('students', 'Manage Students'); ?></h1>          
    <?php

    function t($message, $category = 'cms', $params = array(), $source = null, $language = null) {
        return $message;
    }

    $this->widget('zii.widgets.CMenu', array(
        'encodeLabel' => false,
        'activateItems' => true,
        'activeCssClass' => 'list_active',
        'items' => array(
            array('label' => '' . Yii::t('students', 'Students List') . '<span>' . Yii::t('students', 'All Students Details') . '</span>', 'url' => array('students/manage'), 'linkOptions' => array('class' => 'lbook_ico'),
                'active' => ((Yii::app()->controller->id == 'students') && (in_array(Yii::app()->controller->action->id, array('manage')))) ? true : false
            ),
            array('label' => '' . Yii::t('students', 'Create New Student') . '<span>' . Yii::t('students', 'New Admission') . '</span>', 'url' => array('students/create'), 'linkOptions' => array('class' => 'sl_ico'), 'active' => (Yii::app()->controller->action->id == 'create' or Yii::app()->controller->id == 'studentPreviousDatas' or Yii::app()->controller->id == 'studentAdditionalFields'), 'itemOptions' => array('id' => 'menu_1')
            ),
            array('label' => '' . Yii::t('students', 'Student Field Settings') . '<span>' . Yii::t('students', 'Add Additional Field') . '</span>', 'url' => array('formFields/list'), 'active' => ((Yii::app()->controller->id == 'settings') && (in_array(Yii::app()->controller->action->id, array('update', 'list',  'index'))) ? true : false), 'linkOptions' => array('id' => 'menu_2', 'class' => 'mg_ico')),
            array('label' => Yii::t('students', 'Manage Student Category') . '<span>' . Yii::t('students', 'Manage Students Category' . '</span>'), 'url' => array('/students/studentCategory'), 'linkOptions' => array('class' => 'sm_ico'), 'active' => (Yii::app()->controller->id == 'studentCategory'),),
            array('label' => '' . t('<h1>Manage Guardians</h1>')),
            array('label' => '' . Yii::t('students', 'List Guardians') . '<span>' . Yii::t('students', 'All Guardians Details') . '</span>', 'url' => array('guardians/admin'), 'active' => ((Yii::app()->controller->id == 'guardians') && (in_array(Yii::app()->controller->action->id, array('update', 'view', 'admin', 'index'))) ? true : false), 'linkOptions' => array('id' => 'menu_2', 'class' => 'lbook_ico')),
            
        ),
    ));
    