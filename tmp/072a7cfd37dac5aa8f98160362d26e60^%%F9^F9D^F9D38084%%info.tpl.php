<?php /* Smarty version 2.6.26, created on 2012-05-04 08:29:42
         compiled from widget/trustedshops/info.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/trustedshops/info.tpl', 1, false),array('function', 'oxmultilang', 'widget/trustedshops/info.tpl', 14, false),array('modifier', 'cat', 'widget/trustedshops/info.tpl', 24, false),)), $this); ?>
<?php echo smarty_function_oxscript(array('add' => "$('a.js-external').attr('target', '_blank');"), $this);?>

<!-- Trusted Shops Siegel -->
<?php if ($this->_tpl_vars['oView']->getTrustedShopId()): ?>
    <?php $this->assign('tsId', $this->_tpl_vars['oView']->getTrustedShopId()); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['oView']->getTSExcellenceId()): ?>
    <?php $this->assign('tsId', $this->_tpl_vars['oView']->getTSExcellenceId()); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['tsId']): ?>
    <div id="tsSeal">
        <a id="tsCertificate" class="js-external" href="https://www.trustedshops.com/shop/certificate.php?shop_id=<?php echo $this->_tpl_vars['tsId']; ?>
">
            <img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('trustedshops_m.gif'); ?>
" title="<?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_TRUSTEDSHOPS_ITEM_IMGTITLE'), $this);?>
">
        </a>
    </div>
    <div id="tsText">
        <a id="tsProfile" class="js-external" title="<?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_TRUSTEDSHOPS_ITEM_ALTTEXT'), $this);?>
" href="<?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_TRUSTEDSHOPS_ITEM_PROFILELINK'), $this);?>
<?php echo $this->_tpl_vars['tsId']; ?>
.html">
            <?php echo $this->_tpl_vars['oxcmp_shop']->oxshops__oxname->value; ?>
 <?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_TRUSTEDSHOPS_ITEM_SEALOFAPPROVAL'), $this);?>

        </a>
    </div>
<?php else: ?>
    <a id="tsMembership" class="js-external" href="<?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_TRUSTEDSHOPS_ITEM_LINK'), $this);?>
">
        <?php $this->assign('sTrustShopImg', ((is_array($_tmp=((is_array($_tmp='trustedshops_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getActLanguageAbbr()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getActLanguageAbbr())))) ? $this->_run_mod_handler('cat', true, $_tmp, ".gif") : smarty_modifier_cat($_tmp, ".gif"))); ?>
        <img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl($this->_tpl_vars['sTrustShopImg']); ?>
" alt="<?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_TRUSTEDSHOPS_ITEM_ALTTEXT'), $this);?>
">
    </a>
<?php endif; ?>
<!-- / Trusted Shops Siegel -->