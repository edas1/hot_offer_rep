<?php /* Smarty version 2.6.26, created on 2012-05-07 12:56:27
         compiled from page/search/search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'page/search/search.tpl', 1, false),array('function', 'oxmultilang', 'page/search/search.tpl', 23, false),array('modifier', 'oxmultilangassign', 'page/search/search.tpl', 3, false),array('modifier', 'cat', 'page/search/search.tpl', 7, false),array('insert', 'oxid_tracker', 'page/search/search.tpl', 34, false),)), $this); ?>
<?php echo smarty_function_oxscript(array('add' => "$('a.js-external').attr('target', '_blank');"), $this);?>

<?php ob_start(); ?>
<?php $this->assign('search_title', ((is_array($_tmp='PAGE_SEARCH_SEARCH_TITLE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?>
<?php $this->assign('searchparamforhtml', $this->_tpl_vars['oView']->getSearchParamForHtml()); ?>
<?php $this->assign('template_title', ($this->_tpl_vars['search_title'])." - ".($this->_tpl_vars['searchparamforhtml'])); ?>
<?php $this->assign('search_head', ((is_array($_tmp='PAGE_SEARCH_SEARCH_HITSFOR')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?>
<?php $this->assign('search_head', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oView']->getArticleCount())) ? $this->_run_mod_handler('cat', true, $_tmp, ' ') : smarty_modifier_cat($_tmp, ' ')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['search_head']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['search_head'])))) ? $this->_run_mod_handler('cat', true, $_tmp, " &quot;") : smarty_modifier_cat($_tmp, " &quot;")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oView']->getSearchParamForHtml()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oView']->getSearchParamForHtml())))) ? $this->_run_mod_handler('cat', true, $_tmp, "&quot;") : smarty_modifier_cat($_tmp, "&quot;"))); ?>
<?php $this->assign('rsslinks', $this->_tpl_vars['oView']->getRssLinks()); ?>
<?php if ($this->_tpl_vars['rsslinks']['searchArticles']): ?>
    <?php $this->assign('imgUrl', $this->_tpl_vars['oViewConf']->getImageUrl('rss.png')); ?>
        <?php $this->assign('search_head', ($this->_tpl_vars['search_head'])." <a class=\"rss js-external\" id=\"rssSearchProducts\" href=\"".($this->_tpl_vars['rsslinks']['searchArticles']['link'])."\" title=\"".($this->_tpl_vars['rsslinks']['searchArticles']['title'])."\"><img src=\"".($this->_tpl_vars['imgUrl'])."\" alt=\"".($this->_tpl_vars['rsslinks']['searchArticles']['title'])."\"><span class=\"FXgradOrange corners glowShadow\">".($this->_tpl_vars['rsslinks']['searchArticles']['title'])."</span></a>"); ?>
<?php endif; ?>

  <h1 class="pageHead"><?php echo $this->_tpl_vars['search_head']; ?>
</h1>
  
  <?php if ($this->_tpl_vars['oView']->getArticleCount()): ?>
    <div class="listRefine clear bottomRound">
        
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/locator/listlocator.tpl", 'smarty_include_vars' => array('locator' => $this->_tpl_vars['oView']->getPageNavigationLimitedTop(),'listDisplayType' => true,'itemsPerPage' => true,'sort' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        
    </div>
  <?php else: ?>
    <div><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_SEARCH_SEARCH_NOITEMSFOUND'), $this);?>
</div>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['oView']->getArticleList()): ?>
    <?php $_from = $this->_tpl_vars['oView']->getArticleList(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['search'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['search']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['product']):
        $this->_foreach['search']['iteration']++;
?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/list.tpl", 'smarty_include_vars' => array('type' => $this->_tpl_vars['oView']->getListDisplayType(),'listId' => 'searchList','products' => $this->_tpl_vars['oView']->getArticleList(),'showMainLink' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endforeach; endif; unset($_from); ?>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['oView']->getArticleCount()): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/locator/listlocator.tpl", 'smarty_include_vars' => array('locator' => $this->_tpl_vars['oView']->getPageNavigationLimitedBottom(),'place' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endif; ?>
  
<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'oxid_tracker', 'title' => $this->_tpl_vars['template_title'])), $this); ?>

<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('oxidBlock_content', ob_get_contents());ob_end_clean(); ?>
<?php $this->assign('template_title', ((is_array($_tmp='PAGE_SEARCH_SEARCH_TITLE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layout/page.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['template_title'],'location' => ((is_array($_tmp='PAGE_SEARCH_SEARCH_LOCATION')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)),'sidebar' => 'Left')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>