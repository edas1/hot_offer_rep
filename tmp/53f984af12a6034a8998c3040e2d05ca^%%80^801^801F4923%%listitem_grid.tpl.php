<?php /* Smarty version 2.6.26, created on 2012-05-08 08:09:15
         compiled from widget/product/listitem_grid.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'oxhasrights', 'widget/product/listitem_grid.tpl', 14, false),array('function', 'oxmultilang', 'widget/product/listitem_grid.tpl', 19, false),array('modifier', 'oxaddparams', 'widget/product/listitem_grid.tpl', 54, false),)), $this); ?>

    <?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>
    <?php if ($this->_tpl_vars['showMainLink']): ?>
        <?php $this->assign('_productLink', $this->_tpl_vars['product']->getMainLink()); ?>
    <?php else: ?>
        <?php $this->assign('_productLink', $this->_tpl_vars['product']->getLink()); ?>
    <?php endif; ?>
    <?php $this->assign('blShowToBasket', true); ?>     <?php if ($this->_tpl_vars['blDisableToCart'] || $this->_tpl_vars['product']->isNotBuyable() || ( $this->_tpl_vars['aVariantSelections'] && $this->_tpl_vars['aVariantSelections']['selections'] ) || $this->_tpl_vars['product']->hasMdVariants() || ( $this->_tpl_vars['oViewConf']->showSelectListsInList() && $this->_tpl_vars['product']->getSelections(1) ) || $this->_tpl_vars['product']->getVariants()): ?>
        <?php $this->assign('blShowToBasket', false); ?>
    <?php endif; ?>
    <?php ob_start(); ?>
        
            <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'SHOWARTICLEPRICE')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                <?php $this->assign('tprice', $this->_tpl_vars['product']->getTPrice()); ?>
                <?php $this->assign('price', $this->_tpl_vars['product']->getPrice()); ?>
                <?php if ($this->_tpl_vars['tprice'] && $this->_tpl_vars['tprice']->getBruttoPrice() > $this->_tpl_vars['price']->getBruttoPrice()): ?>
                <span class="priceOld">
                    <?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_REDUCEDFROM'), $this);?>
 <del><?php echo $this->_tpl_vars['product']->getFTPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
</del>
                </span>
                <?php endif; ?>
                
                    <?php if ($this->_tpl_vars['product']->getFPrice()): ?>
                        <strong><span><?php echo $this->_tpl_vars['product']->getFPrice(); ?>
</span> <?php echo $this->_tpl_vars['currency']->sign; ?>
 <?php if (! ( $this->_tpl_vars['product']->hasMdVariants() || ( $this->_tpl_vars['oViewConf']->showSelectListsInList() && $this->_tpl_vars['product']->getSelections(1) ) || $this->_tpl_vars['product']->getVariantList() )): ?> *<?php endif; ?></strong>
                    <?php endif; ?>
                
                <?php if ($this->_tpl_vars['product']->getPricePerUnit()): ?>
                    <span id="productPricePerUnit_<?php echo $this->_tpl_vars['testid']; ?>
" class="pricePerUnit">
                        <?php echo $this->_tpl_vars['product']->oxarticles__oxunitquantity->value; ?>
 <?php echo $this->_tpl_vars['product']->getUnitName(); ?>
 | <?php echo $this->_tpl_vars['product']->getPricePerUnit(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
/<?php echo $this->_tpl_vars['product']->getUnitName(); ?>

                    </span>
                <?php elseif ($this->_tpl_vars['product']->oxarticles__oxweight->value): ?>
                    <span id="productPricePerUnit_<?php echo $this->_tpl_vars['testid']; ?>
" class="pricePerUnit">
                        <span title="weight"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_ARTWEIGHT'), $this);?>
</span>
                        <span class="value"><?php echo $this->_tpl_vars['product']->oxarticles__oxweight->value; ?>
 <?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_ARTWEIGHT2'), $this);?>
</span>
                    </span>
                <?php endif; ?>
            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        
    <?php $this->_smarty_vars['capture']['product_price'] = ob_get_contents(); ob_end_clean(); ?>
    <a id="<?php echo $this->_tpl_vars['testid']; ?>
" href="<?php echo $this->_tpl_vars['_productLink']; ?>
" class="titleBlock title fn" title="<?php echo $this->_tpl_vars['product']->oxarticles__oxtitle->value; ?>
 <?php echo $this->_tpl_vars['product']->oxarticles__oxvarselect->value; ?>
">
        <span><?php echo $this->_tpl_vars['product']->oxarticles__oxtitle->value; ?>
 <?php echo $this->_tpl_vars['product']->oxarticles__oxvarselect->value; ?>
</span>
        <div class="gridPicture">
            <img src="<?php echo $this->_tpl_vars['product']->getThumbnailUrl(); ?>
" alt="<?php echo $this->_tpl_vars['product']->oxarticles__oxtitle->value; ?>
 <?php echo $this->_tpl_vars['product']->oxarticles__oxvarselect->value; ?>
">
        </div>
    </a>
    
        <div class="priceBlock">
            <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'TOBASKET')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                <?php echo $this->_smarty_vars['capture']['product_price']; ?>

                <?php if (! $this->_tpl_vars['blShowToBasket']): ?>
                    <a href="<?php echo $this->_tpl_vars['_productLink']; ?>
" class="toCart button"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_MOREINFO'), $this);?>
</a>
                <?php else: ?>
                    <?php $this->assign('listType', $this->_tpl_vars['oView']->getListType()); ?>
                    <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['oView']->getLink())) ? $this->_run_mod_handler('oxaddparams', true, $_tmp, "listtype=".($this->_tpl_vars['listType'])."&amp;fnc=tobasket&amp;aid=".($this->_tpl_vars['product']->oxarticles__oxid->value)."&amp;am=1") : smarty_modifier_oxaddparams($_tmp, "listtype=".($this->_tpl_vars['listType'])."&amp;fnc=tobasket&amp;aid=".($this->_tpl_vars['product']->oxarticles__oxid->value)."&amp;am=1")); ?>
" class="toCart button" title="<?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_ADDTOCART'), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_ADDTOCART'), $this);?>
</a>
                <?php endif; ?>
            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </div>
   
