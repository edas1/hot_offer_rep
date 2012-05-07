<?php /* Smarty version 2.6.26, created on 2012-05-07 12:35:39
         compiled from widget/locator/attributes.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/locator/attributes.tpl', 10, false),array('function', 'oxmultilang', 'widget/locator/attributes.tpl', 20, false),)), $this); ?>
<?php if ($this->_tpl_vars['attributes']): ?>
    <form method="post" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfActionLink(); ?>
" name="_filterlist" id="filterList">
    <div class="listFilter js-fnSubmit clear">
        <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

        <?php echo $this->_tpl_vars['oViewConf']->getNavFormParams(); ?>

        <input type="hidden" name="cl" value="<?php echo $this->_tpl_vars['oViewConf']->getActiveClassName(); ?>
">
        <input type="hidden" name="tpl" value="<?php echo $this->_tpl_vars['oViewConf']->getActTplName(); ?>
">
        <input type="hidden" name="fnc" value="executefilter">
        <input type="hidden" name="fname" value="">
        <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxdropdown.js",'priority' => 10), $this);?>

        <?php echo smarty_function_oxscript(array('add' => "$('div.dropDown p').oxDropDown();"), $this);?>

        <?php $_from = $this->_tpl_vars['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['attr'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['attr']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sAttrID'] => $this->_tpl_vars['oFilterAttr']):
        $this->_foreach['attr']['iteration']++;
?>
            <div class="dropDown js-fnSubmit" id="attributeFilter[<?php echo $this->_tpl_vars['sAttrID']; ?>
]">
                <p>
                    <label><?php echo $this->_tpl_vars['oFilterAttr']->getTitle(); ?>
: </label>
                    <span>
                        <?php if ($this->_tpl_vars['oFilterAttr']->getActiveValue()): ?>
                            <?php echo $this->_tpl_vars['oFilterAttr']->getActiveValue(); ?>

                        <?php else: ?>
                            <?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_ATTRIBUTES_PLEASECHOOSE'), $this);?>

                        <?php endif; ?>
                    </span>
                </p>
                <input type="hidden" name="attrfilter[<?php echo $this->_tpl_vars['sAttrID']; ?>
]" value="<?php echo $this->_tpl_vars['oFilterAttr']->getActiveValue(); ?>
">
                <ul class="drop FXgradGreyLight shadow">
                    <?php if ($this->_tpl_vars['oFilterAttr']->getActiveValue()): ?>
                        <li><a data-seletion-id="" href="#"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_ATTRIBUTES_PLEASECHOOSE'), $this);?>
</a></li>
                    <?php endif; ?>
                    <?php $_from = $this->_tpl_vars['oFilterAttr']->getValues(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sValue']):
?>
                        <li><a data-seletion-id="<?php echo $this->_tpl_vars['sValue']; ?>
" href="#" <?php if ($this->_tpl_vars['oFilterAttr']->getActiveValue() == $this->_tpl_vars['sValue']): ?>class="selected"<?php endif; ?> ><?php echo $this->_tpl_vars['sValue']; ?>
</a></li>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
            </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    </form>
<?php endif; ?>