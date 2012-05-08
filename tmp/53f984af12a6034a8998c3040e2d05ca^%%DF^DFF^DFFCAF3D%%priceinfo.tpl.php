<?php /* Smarty version 2.6.26, created on 2012-05-08 08:41:49
         compiled from page/details/inc/priceinfo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'page/details/inc/priceinfo.tpl', 1, false),array('function', 'oxmultilang', 'page/details/inc/priceinfo.tpl', 5, false),)), $this); ?>
<?php echo smarty_function_oxscript(array('add' => "$( 'a.js-amountPriceSelector' ).oxAmountPriceSelect();"), $this);?>

<a class="selector corners FXgradBlueDark js-amountPriceSelector" href="#priceinfo" id="amountPrice" rel="nofollow"><img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('selectbutton.png'); ?>
" alt="Select"></a>
<?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>
<ul class="pricePopup corners shadow" id="priceinfo">
<li><span><h4><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_MOREYOUBUYMOREYOUSAVE'), $this);?>
</h4></span></li>
<li><label><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_FROM'), $this);?>
</label><span><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_PCS'), $this);?>
</span></li>
<?php $_from = $this->_tpl_vars['oDetailsProduct']->loadAmountPriceInfo(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['amountPrice'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['amountPrice']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['priceItem']):
        $this->_foreach['amountPrice']['iteration']++;
?>
    <li>
        <label><?php echo $this->_tpl_vars['priceItem']->oxprice2article__oxamount->value; ?>
</label>
        <span>
        <?php if ($this->_tpl_vars['priceItem']->oxprice2article__oxaddperc->value): ?>
            <?php echo $this->_tpl_vars['priceItem']->oxprice2article__oxaddperc->value; ?>
 <?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_DISCOUNT'), $this);?>

        <?php else: ?>
            <span><?php echo $this->_tpl_vars['priceItem']->fbrutprice; ?>
</span> <?php echo $this->_tpl_vars['currency']->sign; ?>

        <?php endif; ?>
        </span>
    </li>
<?php endforeach; endif; unset($_from); ?>
</ul>