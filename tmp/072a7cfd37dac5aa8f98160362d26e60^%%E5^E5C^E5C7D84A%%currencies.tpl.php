<?php /* Smarty version 2.6.26, created on 2012-05-04 08:29:41
         compiled from widget/header/currencies.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/header/currencies.tpl', 1, false),array('modifier', 'oxaddparams', 'widget/header/currencies.tpl', 10, false),)), $this); ?>
<?php echo smarty_function_oxscript(array('include' => "js/widgets/oxflyoutbox.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$( '#currencyTrigger' ).oxFlyOutBox();"), $this);?>

<?php if ($this->_tpl_vars['oView']->loadCurrency()): ?>
    <div class="topPopList">
    <?php ob_start(); ?>
        <?php $_from = $this->_tpl_vars['oxcmp_cur']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_cur']):
?>
            <?php if ($this->_tpl_vars['_cur']->selected): ?>
                <?php $this->assign('selectedCurrency', $this->_tpl_vars['_cur']->name); ?>
                <?php ob_start(); ?>
                    <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['_cur']->link)) ? $this->_run_mod_handler('oxaddparams', true, $_tmp, $this->_tpl_vars['oView']->getDynUrlParams()) : smarty_modifier_oxaddparams($_tmp, $this->_tpl_vars['oView']->getDynUrlParams())); ?>
" title="<?php echo $this->_tpl_vars['_cur']->name; ?>
" rel="nofollow"><span><?php echo $this->_tpl_vars['_cur']->name; ?>
</span></a>
                <?php $this->_smarty_vars['capture']['currencySelected'] = ob_get_contents(); ob_end_clean(); ?>
            <?php endif; ?>
            <li><a<?php if ($this->_tpl_vars['_cur']->selected): ?> class="selected"<?php endif; ?> href="<?php echo ((is_array($_tmp=$this->_tpl_vars['_cur']->link)) ? $this->_run_mod_handler('oxaddparams', true, $_tmp, $this->_tpl_vars['oView']->getDynUrlParams()) : smarty_modifier_oxaddparams($_tmp, $this->_tpl_vars['oView']->getDynUrlParams())); ?>
" title="<?php echo $this->_tpl_vars['_cur']->name; ?>
" rel="nofollow"><span><?php echo $this->_tpl_vars['_cur']->name; ?>
</span></a>
        <?php endforeach; endif; unset($_from); ?>
    <?php $this->_smarty_vars['capture']['currencyList'] = ob_get_contents(); ob_end_clean(); ?>
    <p id="currencyTrigger" class="selectedValue">
        <?php echo $this->_smarty_vars['capture']['currencySelected']; ?>

    </p>
    <div class="flyoutBox">
    <ul id="currencies" class="corners">
        <li class="active"><?php echo $this->_smarty_vars['capture']['currencySelected']; ?>
</li>
        <?php echo $this->_smarty_vars['capture']['currencyList']; ?>

    </ul>
    </div>
    </div>
<?php endif; ?>