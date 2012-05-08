<?php /* Smarty version 2.6.26, created on 2012-05-08 08:06:22
         compiled from layout/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxid_include_dynamic', 'layout/header.tpl', 4, false),array('function', 'oxgetseourl', 'layout/header.tpl', 10, false),array('function', 'oxmultilang', 'layout/header.tpl', 10, false),array('modifier', 'cat', 'layout/header.tpl', 10, false),array('modifier', 'count', 'layout/header.tpl', 20, false),)), $this); ?>
<div id="header" class="clear">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/header/languages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/header/currencies.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php echo smarty_function_oxid_include_dynamic(array('file' => "widget/header/servicebox.tpl"), $this);?>

  <ul id="topMenu">
    <li class="login flyout<?php if ($this->_tpl_vars['oxcmp_user']->oxuser__oxpassword->value): ?> logged<?php endif; ?>">
       <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/header/loginbox.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </li>
    <?php if (! $this->_tpl_vars['oxcmp_user']): ?>
        <li><a id="registerLink" href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSslSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=register") : smarty_modifier_cat($_tmp, "cl=register"))), $this);?>
" title="<?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_ACCOUNT_REGISTER_REGISTER'), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_ACCOUNT_REGISTER_REGISTER'), $this);?>
</a></li>
    <?php endif; ?>
  </ul>
  <?php $this->assign('slogoImg', "logo.png"); ?>
  <a id="logo" href="<?php echo $this->_tpl_vars['oViewConf']->getHomeLink(); ?>
" title="<?php echo $this->_tpl_vars['oxcmp_shop']->oxshops__oxtitleprefix->value; ?>
"><img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl($this->_tpl_vars['slogoImg']); ?>
" alt="<?php echo $this->_tpl_vars['oxcmp_shop']->oxshops__oxtitleprefix->value; ?>
"></a>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/header/topcategories.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php echo smarty_function_oxid_include_dynamic(array('file' => "widget/minibasket/minibasket.tpl"), $this);?>

    <?php echo smarty_function_oxid_include_dynamic(array('file' => "widget/minibasket/minibasketmodal.tpl"), $this);?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/header/search.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<?php if ($this->_tpl_vars['oView']->getClassName() == 'start' && count($this->_tpl_vars['oView']->getBanners()) > 0): ?>
    <div class="oxSlider">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/promoslider.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
<?php endif; ?>