<?php /* Smarty version 2.6.26, created on 2012-05-08 08:06:23
         compiled from layout/sidebar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'layout/sidebar.tpl', 53, false),array('function', 'oxmultilang', 'layout/sidebar.tpl', 61, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['oxidBlock_sidebar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_block']):
?>
    <?php echo $this->_tpl_vars['_block']; ?>

<?php endforeach; endif; unset($_from); ?>


    
        <?php if ($this->_tpl_vars['oView']->isDemoShop()): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/sidebar/adminbanner.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    

    
        <?php if ($this->_tpl_vars['oxcmp_categories']): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/sidebar/categoriestree.tpl", 'smarty_include_vars' => array('categories' => $this->_tpl_vars['oxcmp_categories']->getClickRoot(),'act' => $this->_tpl_vars['oxcmp_categories']->getClickCat(),'deepLevel' => 0)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    

    
        <?php if ($this->_tpl_vars['oView']->getClassName() == 'start'): ?>
            <?php if ($this->_tpl_vars['oViewConf']->showTs('WIDGET')): ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/trustedshops/ratings.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php endif; ?>
        <?php endif; ?>
    

    
        <?php if ($this->_tpl_vars['oView']->getClassName() == 'start'): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/sidebar/partners.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    

    
        <?php if ($this->_tpl_vars['oView']->getClassName() == 'start' && $this->_tpl_vars['oView']->getTop5ArticleList()): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/boxproducts.tpl", 'smarty_include_vars' => array('_boxId' => 'topBox','_oBoxProducts' => $this->_tpl_vars['oView']->getTop5ArticleList(),'_sHeaderIdent' => 'BOX_TOPOFTHESHOP_HEADER')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    

    
        <?php if ($this->_tpl_vars['oViewConf']->getShowListmania()): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/sidebar/recommendation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    

    
        <?php if ($this->_tpl_vars['oView']->showTags() && $this->_tpl_vars['oView']->getClassName() != 'details' && $this->_tpl_vars['oView']->getClassName() != 'alist' && $this->_tpl_vars['oView']->getClassName() != 'suggest' && $this->_tpl_vars['oView']->getClassName() != 'tags'): ?>
            <?php if ($this->_tpl_vars['oView']->getTagCloudManager()): ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/sidebar/tags.tpl", 'smarty_include_vars' => array('oTagsManager' => $this->_tpl_vars['oView']->getTagCloudManager())));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php endif; ?>
        <?php endif; ?>
    

    
        <?php if (((is_array($_tmp=$this->_tpl_vars['oxcmp_news'])) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp))): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/sidebar/news.tpl", 'smarty_include_vars' => array('oNews' => $this->_tpl_vars['oxcmp_news'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    

    
          <?php if ($this->_tpl_vars['oView']->isActive('FbFacepile') && $this->_tpl_vars['oView']->isConnectedWithFb()): ?>
        	<div id="facebookFacepile" class="box">
		    	<h3><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_FACEBOOK_FACEPILE_HEADER'), $this);?>
</h3>
		    	<div class="content" id="productFbFacePile">
        			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/facebook/enable.tpl", 'smarty_include_vars' => array('source' => "widget/facebook/facepile.tpl",'ident' => "#productFbFacePile",'type' => 'text')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        	    </div>
			</div>
        <?php endif; ?>
    

    
        <?php if ($this->_tpl_vars['oView']->getClassName() == 'start'): ?>
           <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/shoplupe/ratings.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    

