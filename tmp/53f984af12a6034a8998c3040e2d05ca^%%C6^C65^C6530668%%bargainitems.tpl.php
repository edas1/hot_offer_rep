<?php /* Smarty version 2.6.26, created on 2012-05-07 12:56:08
         compiled from widget/product/bargainitems.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/product/bargainitems.tpl', 1, false),array('function', 'oxmultilang', 'widget/product/bargainitems.tpl', 21, false),array('function', 'oxgetseourl', 'widget/product/bargainitems.tpl', 35, false),array('modifier', 'strip_tags', 'widget/product/bargainitems.tpl', 7, false),array('modifier', 'cat', 'widget/product/bargainitems.tpl', 35, false),array('block', 'oxhasrights', 'widget/product/bargainitems.tpl', 16, false),)), $this); ?>
<?php echo smarty_function_oxscript(array('add' => "$('a.js-external').attr('target', '_blank');"), $this);?>

<?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>
<?php $_from = $this->_tpl_vars['oView']->getBargainArticleList(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['bargainList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bargainList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['_product']):
        $this->_foreach['bargainList']['iteration']++;
?>
<?php if (($this->_foreach['bargainList']['iteration'] <= 1)): ?>
    <?php $this->assign('sBargainArtTitle', ($this->_tpl_vars['_product']->oxarticles__oxtitle->value)." ".($this->_tpl_vars['_product']->oxarticles__oxvarselect->value)); ?>
    <?php ob_start(); ?>
        <a id="titleBargain_<?php echo $this->_foreach['bargainList']['iteration']; ?>
" href="<?php echo $this->_tpl_vars['_product']->getMainLink(); ?>
" class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['sBargainArtTitle'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a>
    <?php $this->_smarty_vars['capture']['bargainTitle'] = ob_get_contents(); ob_end_clean(); ?>
    <?php ob_start(); ?>
        <a href="<?php echo $this->_tpl_vars['_product']->getMainLink(); ?>
"><img src="<?php echo $this->_tpl_vars['_product']->getThumbnailUrl(); ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['sBargainArtTitle'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" class="picture"></a>
    <?php $this->_smarty_vars['capture']['bargainPic'] = ob_get_contents(); ob_end_clean(); ?>
    <?php ob_start(); ?>
        
            <div class="price <?php if ($this->_tpl_vars['_product']->getPricePerUnit()): ?>tight<?php endif; ?>" id="priceBargain_<?php echo $this->_foreach['bargainList']['iteration']; ?>
">
                <div>
                <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'SHOWARTICLEPRICE')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                    <?php $this->assign('tprice', $this->_tpl_vars['_product']->getTPrice()); ?>
                    <?php $this->assign('price', $this->_tpl_vars['_product']->getPrice()); ?>
                    <?php if ($this->_tpl_vars['tprice'] && $this->_tpl_vars['tprice']->getBruttoPrice() > $this->_tpl_vars['price']->getBruttoPrice()): ?>
                    <span class="priceOld">
                        <?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_REDUCEDFROM'), $this);?>
 <del><?php echo $this->_tpl_vars['_product']->getFTPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
</del>
                    </span>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['_product']->getFPrice()): ?>
                        <?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>
                         <span class="priceValue"><?php echo $this->_tpl_vars['_product']->getFPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
 <?php if (! ( $this->_tpl_vars['_product']->hasMdVariants() || ( $this->_tpl_vars['oViewConf']->showSelectListsInList() && $this->_tpl_vars['_product']->getSelections(1) ) || $this->_tpl_vars['_product']->getVariantList() )): ?>*<?php endif; ?></span>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['_product']->getPricePerUnit()): ?>
                    <span class="pricePerUnit">
                        <?php echo $this->_tpl_vars['_product']->oxarticles__oxunitquantity->value; ?>
 <?php echo $this->_tpl_vars['_product']->getUnitName(); ?>
 | <?php echo $this->_tpl_vars['_product']->getPricePerUnit(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
/<?php echo $this->_tpl_vars['_product']->getUnitName(); ?>

                    </span>
                    <?php endif; ?>
                    
                        <?php if (! ( $this->_tpl_vars['_product']->hasMdVariants() || ( $this->_tpl_vars['oViewConf']->showSelectListsInList() && $this->_tpl_vars['_product']->getSelections(1) ) || $this->_tpl_vars['_product']->getVariantList() )): ?>
                            <a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=start") : smarty_modifier_cat($_tmp, "cl=start")),'params' => "fnc=tobasket&amp;aid=".($this->_tpl_vars['_product']->oxarticles__oxid->value)."&amp;am=1"), $this);?>
" class="toCart button" title="<?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_BARGAIN_ITEMS_PRODUCT_ADDTOCART'), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_BARGAIN_ITEMS_PRODUCT_ADDTOCART'), $this);?>
</a>
                        <?php else: ?>
                            <a href="<?php echo $this->_tpl_vars['_product']->getMainLink(); ?>
" class="toCart button"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_MOREINFO'), $this);?>
</a>
                        <?php endif; ?>
                    
                <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                </div>
            </div>
        
    <?php $this->_smarty_vars['capture']['bargainPrice'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<div class="specBoxTitles rightShadow">
    <h3>

        <strong><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_SHOP_START_WEEKSPECIAL'), $this);?>
</strong>

        <?php $this->assign('rsslinks', $this->_tpl_vars['oView']->getRssLinks()); ?>
        <?php if ($this->_tpl_vars['rsslinks']['bargainArticles']): ?>
            <a class="rss js-external" id="rssBargainProducts" href="<?php echo $this->_tpl_vars['rsslinks']['bargainArticles']['link']; ?>
" title="<?php echo $this->_tpl_vars['rsslinks']['bargainArticles']['title']; ?>
"><img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('rss.png'); ?>
" alt="<?php echo $this->_tpl_vars['rsslinks']['bargainArticles']['title']; ?>
"><span class="FXgradOrange corners glowShadow"><?php echo $this->_tpl_vars['rsslinks']['bargainArticles']['title']; ?>
</span></a>
        <?php endif; ?>
    </h3>
    <?php echo $this->_smarty_vars['capture']['bargainTitle']; ?>

</div>
<div class="specBoxInfo">
    <?php echo $this->_smarty_vars['capture']['bargainPrice']; ?>

    <?php echo $this->_smarty_vars['capture']['bargainPic']; ?>

</div>