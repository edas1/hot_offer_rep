<?php /* Smarty version 2.6.26, created on 2012-05-08 08:29:44
         compiled from nav_frame.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'nav_frame.tpl', 5, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
    <title><?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_ADMIN_TITLE_1'), $this);?>
</title>
</head>

<!-- frames -->
<frameset <?php if ($this->_tpl_vars['oViewConf']->blLoadDynContents && $this->_tpl_vars['oViewConf']->sShopCountry): ?>rows="*,150"<?php else: ?>rows="*"<?php endif; ?> border="0">
    <frame src="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
&cl=navigation&item=navigation.tpl" name="adminnav" id="adminnav" frameborder="0" scrolling="auto" noresize marginwidth="0" marginheight="0">

    <?php if ($this->_tpl_vars['oViewConf']->blLoadDynContents && $this->_tpl_vars['oViewConf']->sShopCountry): ?>
    <frame src="<?php echo $this->_tpl_vars['oViewConf']->getServiceUrl(); ?>
banners/navigation.html"  name="adminfrm" id="adminfrm" frameborder="0" scrolling="auto" noresize marginwidth="0" marginheight="0">
    <?php endif; ?>
</frameset>

</html>