<?php /* Smarty version 2.6.26, created on 2012-05-07 12:56:08
         compiled from widget/manufacturersslider.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'widget/manufacturersslider.tpl', 4, false),array('function', 'oxmultilang', 'widget/manufacturersslider.tpl', 7, false),array('function', 'oxscript', 'widget/manufacturersslider.tpl', 16, false),)), $this); ?>
<?php ob_start(); ?>
    <?php $_from = $this->_tpl_vars['oView']->getManufacturerForSlider(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['oManufacturer']):
?>
        <?php if ($this->_tpl_vars['oManufacturer']->oxmanufacturers__oxicon->value): ?>
        <?php echo smarty_function_counter(array('assign' => 'slideCount'), $this);?>

            <li>
                <a href="<?php echo $this->_tpl_vars['oManufacturer']->getLink(); ?>
" class="viewAllHover">
                    <span><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_MANUFACTURERS_SLIDER_VIEWALL'), $this);?>
</span>
                </a>
                <a class="sliderHover" href="<?php echo $this->_tpl_vars['oManufacturer']->getLink(); ?>
"></a>
                <img src="<?php echo $this->_tpl_vars['oManufacturer']->getIconUrl(); ?>
" alt="<?php echo $this->_tpl_vars['oManufacturer']->oxmanufacturers__oxtitle->value; ?>
">
            </li>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
<?php $this->_smarty_vars['capture']['slides'] = ob_get_contents(); ob_end_clean(); ?>
<?php if ($this->_tpl_vars['slideCount'] > 6): ?>
    <?php echo smarty_function_oxscript(array('include' => "js/libs/jcarousellite.js"), $this);?>

    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxmanufacturerslider.js",'priority' => 10), $this);?>

    <?php echo smarty_function_oxscript(array('add' => "$( '#manufacturerSlider' ).oxManufacturerSlider();"), $this);?>

    <div class="itemSlider">
        <div class="leftHolder">            
            <div class="titleBlock slideNav"><strong><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_MANUFACTURERS_SLIDER_OURBRANDS'), $this);?>
</strong></div>
            <a class="prevItem slideNav" href="#" rel="nofollow"><span class="slidePointer">&laquo;</span><span class="slideBg"></span></a>
        </div>
        <a class="nextItem slideNav" href="#" rel="nofollow"><span class="slidePointer">&raquo;</span><span class="slideBg"></span></a>
        <div id="manufacturerSlider">
            <ul>
                <?php echo $this->_smarty_vars['capture']['slides']; ?>

            </ul>
        </div>
    </div>  
<?php endif; ?>