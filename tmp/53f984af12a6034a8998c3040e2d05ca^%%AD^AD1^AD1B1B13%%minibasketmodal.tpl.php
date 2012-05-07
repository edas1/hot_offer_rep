<?php /* Smarty version 2.6.26, created on 2012-05-07 12:35:41
         compiled from widget/minibasket/minibasketmodal.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/minibasket/minibasketmodal.tpl', 3, false),)), $this); ?>
<?php if ($this->_tpl_vars['oxcmp_basket']->isNewItemAdded() && $this->_tpl_vars['oView']->getNewBasketItemMsgType() == 2): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/minibasket/minibasket.tpl", 'smarty_include_vars' => array('_prefix' => 'modal')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php echo smarty_function_oxscript(array('add' => "$('#modalbasketFlyout').oxModalPopup({ target: '#modalbasketFlyout', openDialog: true, width: 'auto'});"), $this);?>

    <?php echo smarty_function_oxscript(array('add' => "if ($('.scrollable .scrollbarBox').length > 0) { $('.scrollable .scrollbarBox').jScrollPane({showArrows: true, verticalArrowPositions: 'split' });}"), $this);?>

    <?php echo smarty_function_oxscript(array('add' => "$('#modalbasketFlyout').css('z-index','inherit');"), $this);?>

<?php endif; ?>