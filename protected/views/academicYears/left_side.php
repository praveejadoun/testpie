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
    <h1><?php echo Yii::t('academicYears', 'General Settings'); ?></h1>          
    <?php

    function t($message, $category = 'cms', $params = array(), $source = null, $language = null) {
        return $message;
    }

    $this->widget('zii.widgets.CMenu', array(
        'encodeLabel' => false,
        'activateItems' => true,
        'activeCssClass' => 'list_active',
        'items' => array(
            array('label' => '' . Yii::t('academicYears', 'Manage Academic Years') . '<span>' . Yii::t('students', 'Manage All Academic Years') . '</span>', 'url' => array('admin'), 'linkOptions' => array('class' => 'lbook_ico'),
                'active' => ((Yii::app()->controller->id == 'academicYears') && (in_array(Yii::app()->controller->action->id, array('admin','update','view')))) ? true : false
            ),
            array('label' => '' . Yii::t('students', 'Create New Academic Year') . '<span>' . Yii::t('students', 'Add & Update Details') . '</span>', 'url' => array('create'), 'linkOptions' => array('class' => 'sl_ico'), 'active' => ( (Yii::app()->controller->id=='academicYears' and Yii::app()->controller->action->id == 'create')), 'itemOptions' => array('id' => 'menu_1')
            ),
          
        ),
    ));
    