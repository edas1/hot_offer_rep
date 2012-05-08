<?php /* Smarty version 2.6.26, created on 2012-05-08 08:06:23
         compiled from widget/sidebar/partners.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'widget/sidebar/partners.tpl', 2, false),)), $this); ?>
<div class="box">
    <h3><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_TRUSTED_SHOPS'), $this);?>
</h3>
    <div class="content">
        
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/trustedshops/info.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        
    </div>

</div>