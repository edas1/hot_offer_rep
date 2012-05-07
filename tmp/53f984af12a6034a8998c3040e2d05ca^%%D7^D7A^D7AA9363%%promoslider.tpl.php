<?php /* Smarty version 2.6.26, created on 2012-05-07 12:56:08
         compiled from widget/promoslider.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'widget/promoslider.tpl', 3, false),array('function', 'oxstyle', 'widget/promoslider.tpl', 4, false),array('function', 'oxscript', 'widget/promoslider.tpl', 5, false),)), $this); ?>
<?php $this->assign('oBanners', $this->_tpl_vars['oView']->getBanners()); ?>
<?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>
<?php if (count($this->_tpl_vars['oBanners'])): ?>
    <?php echo smarty_function_oxstyle(array('include' => "css/libs/anythingslider.css"), $this);?>

    <?php echo smarty_function_oxscript(array('include' => "js/libs/anythingslider.js"), $this);?>

    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxslider.js",'priority' => 10), $this);?>

    <?php echo smarty_function_oxscript(array('add' => "$( '#promotionSlider' ).oxSlider();"), $this);?>

    <img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('promo-shadowleft.png'); ?>
" height="220" width="7" class="promoShadow" alt="">
    <img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('promo-shadowright.png'); ?>
" height="220" width="7" class="promoShadow shadowRight" alt="">
    <ul id="promotionSlider">
        <?php $_from = $this->_tpl_vars['oBanners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['oBanner']):
?>
        <?php $this->assign('oArticle', $this->_tpl_vars['oBanner']->getBannerArticle()); ?>
        <li>
            <?php $this->assign('sBannerLink', $this->_tpl_vars['oBanner']->getBannerLink()); ?>
            <?php if ($this->_tpl_vars['sBannerLink']): ?>
            <a href="<?php echo $this->_tpl_vars['sBannerLink']; ?>
">
            <?php endif; ?>
            <?php if ($this->_tpl_vars['oArticle']): ?>
            <span class="promoBox">
                <strong class="promoPrice"><?php echo $this->_tpl_vars['oArticle']->getFPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
</strong>
                <strong class="promoTitle"><?php echo $this->_tpl_vars['oArticle']->oxarticles__oxtitle->value; ?>
</strong>
            </span>
            <?php endif; ?>
            <?php $this->assign('sBannerPictureUrl', $this->_tpl_vars['oBanner']->getBannerPictureUrl()); ?>
            <?php if ($this->_tpl_vars['sBannerPictureUrl']): ?>
            <img src="<?php echo $this->_tpl_vars['sBannerPictureUrl']; ?>
" height="220" width="940" alt="<?php echo $this->_tpl_vars['oBanner']->oxactions__oxtitle->value; ?>
">
            <?php endif; ?>
            <?php if ($this->_tpl_vars['sBannerLink']): ?>
            </a>
            <?php endif; ?>
        </li>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
<?php endif; ?>