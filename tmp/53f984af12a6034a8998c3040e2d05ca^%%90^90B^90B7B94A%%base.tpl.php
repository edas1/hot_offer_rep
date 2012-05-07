<?php /* Smarty version 2.6.26, created on 2012-05-07 16:45:32
         compiled from layout/base.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'layout/base.tpl', 9, false),array('function', 'oxstyle', 'layout/base.tpl', 49, false),array('function', 'oxscript', 'layout/base.tpl', 87, false),array('function', 'oxid_include_dynamic', 'layout/base.tpl', 100, false),)), $this); ?>
<?php ob_start(); ?>

    <?php $this->assign('_sMetaTitlePrefix', $this->_tpl_vars['oView']->getTitlePrefix()); ?>
    <?php $this->assign('_sMetaTitleSuffix', $this->_tpl_vars['oView']->getTitleSuffix()); ?>
    <?php $this->assign('_sMetaTitlePageSuffix', $this->_tpl_vars['oView']->getTitlePageSuffix()); ?>
    <?php $this->assign('_sMetaTitle', $this->_tpl_vars['oView']->getTitle()); ?>

    <title><?php echo $this->_tpl_vars['_sMetaTitlePrefix']; ?>
<?php if ($this->_tpl_vars['_sMetaTitlePrefix'] && $this->_tpl_vars['_sMetaTitle']): ?> | <?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['_sMetaTitle'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
<?php if ($this->_tpl_vars['_sMetaTitleSuffix'] && ( $this->_tpl_vars['_sMetaTitlePrefix'] || $this->_tpl_vars['_sMetaTitle'] )): ?> | <?php endif; ?><?php echo $this->_tpl_vars['_sMetaTitleSuffix']; ?>
 <?php if ($this->_tpl_vars['_sMetaTitlePageSuffix']): ?> | <?php echo $this->_tpl_vars['_sMetaTitlePageSuffix']; ?>
 <?php endif; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['oView']->getCharSet(); ?>
">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=9" >
    <![endif]-->
    <?php if ($this->_tpl_vars['oView']->noIndex() == 1): ?>
        <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
    <?php elseif ($this->_tpl_vars['oView']->noIndex() == 2): ?>
        <meta name="ROBOTS" content="NOINDEX, FOLLOW">
    <?php endif; ?>
    <?php if ($this->_tpl_vars['oView']->getMetaDescription()): ?>
        <meta name="description" content="<?php echo $this->_tpl_vars['oView']->getMetaDescription(); ?>
">
    <?php endif; ?>
    <?php if ($this->_tpl_vars['oView']->getMetaKeywords()): ?>
        <meta name="keywords" content="<?php echo $this->_tpl_vars['oView']->getMetaKeywords(); ?>
">
    <?php endif; ?>

    <?php if ($this->_tpl_vars['oViewConf']->getFbAppId()): ?>
        <meta property="og:site_name" content="<?php echo $this->_tpl_vars['oViewConf']->getBaseDir(); ?>
">
        <meta property="fb:app_id" content="<?php echo $this->_tpl_vars['oViewConf']->getFbAppId(); ?>
">
        <meta property="og:title" content="<?php echo $this->_tpl_vars['_sMetaTitlePrefix']; ?>
<?php if ($this->_tpl_vars['_sMetaTitlePrefix'] && $this->_tpl_vars['_sMetaTitle']): ?> | <?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['_sMetaTitle'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
<?php if ($this->_tpl_vars['_sMetaTitleSuffix'] && ( $this->_tpl_vars['_sMetaTitlePrefix'] || $this->_tpl_vars['_sMetaTitle'] )): ?> | <?php endif; ?><?php echo $this->_tpl_vars['_sMetaTitleSuffix']; ?>
 <?php if ($this->_tpl_vars['_sMetaTitlePageSuffix']): ?> | <?php echo $this->_tpl_vars['_sMetaTitlePageSuffix']; ?>
 <?php endif; ?>">
        <?php if ($this->_tpl_vars['oViewConf']->getActiveClassName() == 'details'): ?>
            <meta property="og:type" content="product">
            <meta property="og:image" content="<?php echo $this->_tpl_vars['oView']->getActPicture(); ?>
">
            <meta property="og:url" content="<?php echo $this->_tpl_vars['oView']->getCanonicalUrl(); ?>
">
        <?php else: ?>
            <meta property="og:type" content="website">
            <meta property="og:image" content="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('basket.png'); ?>
">
            <meta property="og:url" content="<?php echo $this->_tpl_vars['oViewConf']->getCurrentHomeDir(); ?>
">
        <?php endif; ?>
    <?php endif; ?>


    <?php $this->assign('canonical_url', $this->_tpl_vars['oView']->getCanonicalUrl()); ?>
    <?php if ($this->_tpl_vars['canonical_url']): ?>
        <link rel="canonical" href="<?php echo $this->_tpl_vars['canonical_url']; ?>
">
    <?php endif; ?>
    <link rel="shortcut icon" href="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('favicon.ico'); ?>
">

    
        <?php echo smarty_function_oxstyle(array('include' => "css/reset.css"), $this);?>

        <?php echo smarty_function_oxstyle(array('include' => "css/oxid.css"), $this);?>

        <?php echo smarty_function_oxstyle(array('include' => "css/ie7.css",'if' => 'IE 7'), $this);?>

        <?php echo smarty_function_oxstyle(array('include' => "css/ie8.css",'if' => 'IE 8'), $this);?>

        <?php echo smarty_function_oxstyle(array('include' => "css/libs/jscrollpane.css"), $this);?>

    

    <?php $this->assign('rsslinks', $this->_tpl_vars['oView']->getRssLinks()); ?>
    <?php if ($this->_tpl_vars['rsslinks']): ?>
        <?php $_from = $this->_tpl_vars['rsslinks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rssentry']):
?>
            <link rel="alternate" type="application/rss+xml" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['rssentry']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" href="<?php echo $this->_tpl_vars['rssentry']['link']; ?>
">
        <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>

    
        <?php $_from = $this->_tpl_vars['oxidBlock_head']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_block']):
?>
            <?php echo $this->_tpl_vars['_block']; ?>

        <?php endforeach; endif; unset($_from); ?>
    

<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('oxidBlock_pageHead', ob_get_contents());ob_end_clean(); ?>
<!DOCTYPE HTML>
<html lang="<?php echo $this->_tpl_vars['oView']->getActiveLangAbbr(); ?>
" <?php if ($this->_tpl_vars['oViewConf']->getShowFbConnect()): ?>xmlns:fb="http://www.facebook.com/2008/fbml"<?php endif; ?>>
<head>
    <?php $_from = $this->_tpl_vars['oxidBlock_pageHead']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_block']):
?>
        <?php echo $this->_tpl_vars['_block']; ?>

    <?php endforeach; endif; unset($_from); ?>
    <?php echo smarty_function_oxstyle(array(), $this);?>

</head>
<body>
    <?php $_from = $this->_tpl_vars['oxidBlock_pageBody']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_block']):
?>
        <?php echo $this->_tpl_vars['_block']; ?>

    <?php endforeach; endif; unset($_from); ?>
    <?php $_from = $this->_tpl_vars['oxidBlock_pagePopup']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_block']):
?>
        <?php echo $this->_tpl_vars['_block']; ?>

    <?php endforeach; endif; unset($_from); ?>

    
        <?php echo smarty_function_oxscript(array('include' => "js/libs/jquery.min.js",'priority' => 1), $this);?>

        <?php echo smarty_function_oxscript(array('include' => "js/libs/jquery-ui.min.js",'priority' => 1), $this);?>

        <?php echo smarty_function_oxscript(array('include' => 'js/libs/superfish/hoverIntent.js'), $this);?>

        <?php echo smarty_function_oxscript(array('include' => 'js/libs/superfish/supersubs.js'), $this);?>

        <?php echo smarty_function_oxscript(array('include' => 'js/libs/superfish/superfish.js'), $this);?>

    

    <?php if ($this->_tpl_vars['oViewConf']->isTplBlocksDebugMode()): ?>
        <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxblockdebug.js"), $this);?>

        <?php echo smarty_function_oxscript(array('add' => "$( 'hr.debugBlocksStart' ).oxBlockDebug();"), $this);?>

    <?php endif; ?>

    <?php echo smarty_function_oxscript(array(), $this);?>

    <?php echo smarty_function_oxid_include_dynamic(array('file' => "widget/dynscript.tpl"), $this);?>


    <?php $_from = $this->_tpl_vars['oxidBlock_pageScript']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_block']):
?>
        <?php echo $this->_tpl_vars['_block']; ?>

    <?php endforeach; endif; unset($_from); ?>

    <!--[if (gte IE 6)&(lte IE 8)]>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['oViewConf']->getResourceUrl('js/libs/IE9.js'); ?>
"></script>
    <![endif]-->


</body>
</html>