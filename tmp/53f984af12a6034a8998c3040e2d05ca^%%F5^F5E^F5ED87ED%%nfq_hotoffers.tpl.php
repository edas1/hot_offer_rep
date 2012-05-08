<?php /* Smarty version 2.6.26, created on 2012-05-08 08:08:37
         compiled from page/shop/nfq_hotoffers.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'page/shop/nfq_hotoffers.tpl', 1, false),array('modifier', 'count', 'page/shop/nfq_hotoffers.tpl', 5, false),array('modifier', 'oxmultilangassign', 'page/shop/nfq_hotoffers.tpl', 20, false),array('insert', 'oxid_tracker', 'page/shop/nfq_hotoffers.tpl', 22, false),)), $this); ?>
<?php echo smarty_function_oxscript(array('include' => "js/widgets/oxcenterelementonhover.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$( '#specCatBox' ).oxCenterElementOnHover();"), $this);?>

<?php ob_start(); ?>
    <?php $this->assign('oFirstArticle', $this->_tpl_vars['oView']->getFirstArticle()); ?>
    <?php if (count($this->_tpl_vars['oView']->getCatOfferArticleList()) > 0): ?>
        <?php $_from = $this->_tpl_vars['oView']->getCatOfferArticleList(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['CatArt'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['CatArt']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['actionproduct']):
        $this->_foreach['CatArt']['iteration']++;
?>
        <?php if (($this->_foreach['CatArt']['iteration'] <= 1)): ?>
        <?php $this->assign('oCategory', $this->_tpl_vars['actionproduct']->getCategory()); ?>
            <?php if ($this->_tpl_vars['oCategory']): ?>
                <?php $this->assign('promoCatTitle', $this->_tpl_vars['oCategory']->oxcategories__oxtitle->value); ?>
                <?php $this->assign('promoCatImg', $this->_tpl_vars['oCategory']->getPromotionIconUrl()); ?>
                <?php $this->assign('promoCatLink', $this->_tpl_vars['oCategory']->getLink()); ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['oView']->getHotOfferArticles()): ?>
        <?php $this->assign('rsslinks', $this->_tpl_vars['oView']->getRssLinks()); ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/list.tpl", 'smarty_include_vars' => array('type' => $this->_tpl_vars['oViewConf']->getViewThemeParam('sStartPageListDisplayType'),'head' => ((is_array($_tmp='PAGE_SHOP_NFQ_HOTOFFERS_HOTOFFERS')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)),'listId' => 'newItems','products' => $this->_tpl_vars['oView']->getHotOfferArticles(),'showMainLink' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
    <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'oxid_tracker')), $this); ?>

<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('oxidBlock_content', ob_get_contents());ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layout/page.tpl", 'smarty_include_vars' => array('sidebar' => 'Right')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>