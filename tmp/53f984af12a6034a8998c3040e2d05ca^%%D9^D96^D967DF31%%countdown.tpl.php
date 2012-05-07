<?php /* Smarty version 2.6.26, created on 2012-05-07 16:45:31
         compiled from widget/minibasket/countdown.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'widget/minibasket/countdown.tpl', 4, false),array('function', 'counter', 'widget/minibasket/countdown.tpl', 5, false),array('modifier', 'oxformattime', 'widget/minibasket/countdown.tpl', 7, false),)), $this); ?>
<?php if ($this->_tpl_vars['oViewConf']->getShowBasketTimeout()): ?>
    <p class="totals">
        <span class="item">
            <?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_COUNTDOWN_BASKET_TIMEOUT'), $this);?>

            <?php echo smarty_function_counter(array('name' => 'mini_basket_countdown_nr','assign' => 'countdown_nr'), $this);?>

        </span>
        <strong class="price" id="countdown"><?php echo ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getBasketTimeLeft())) ? $this->_run_mod_handler('oxformattime', true, $_tmp) : smarty_modifier_oxformattime($_tmp)); ?>
</strong>
    </p>
    <hr>
<?php endif; ?>