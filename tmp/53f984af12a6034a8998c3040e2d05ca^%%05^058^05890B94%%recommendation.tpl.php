<?php /* Smarty version 2.6.26, created on 2012-05-07 16:45:31
         compiled from widget/sidebar/recommendation.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/sidebar/recommendation.tpl', 1, false),array('function', 'oxmultilang', 'widget/sidebar/recommendation.tpl', 6, false),array('modifier', 'strip_tags', 'widget/sidebar/recommendation.tpl', 22, false),)), $this); ?>
<?php echo smarty_function_oxscript(array('add' => "$('a.js-external').attr('target', '_blank');"), $this);?>

<?php $this->assign('_oRecommendationList', $this->_tpl_vars['oView']->getSimilarRecommLists()); ?>

<?php if ($this->_tpl_vars['_oRecommendationList'] || $this->_tpl_vars['oView']->getRecommSearch()): ?>
<div class="box" id="recommendationsBox">
    <h3><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_RECOMMENDATIONLIST_HEADER'), $this);?>

    <?php $this->assign('rsslinks', $this->_tpl_vars['oView']->getRssLinks()); ?>
    <?php if ($this->_tpl_vars['rsslinks']['recommlists']): ?>
        <a class="rss js-external" id="rssRecommLists" href="<?php echo $this->_tpl_vars['rsslinks']['recommlists']['link']; ?>
" title="<?php echo $this->_tpl_vars['rsslinks']['recommlists']['title']; ?>
">
            <img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('rss.png'); ?>
" alt="<?php echo $this->_tpl_vars['rsslinks']['recommlists']['title']; ?>
"><span class="FXgradOrange corners glowShadow"><?php echo $this->_tpl_vars['rsslinks']['recommlists']['title']; ?>
</span>
        </a>
    <?php endif; ?>
    </h3>

    <div>
    <?php if ($this->_tpl_vars['_oRecommendationList']): ?>
        <?php echo $this->_tpl_vars['_oRecommendationList']->rewind(); ?>


        <?php if ($this->_tpl_vars['_oRecommendationList']->current()): ?>
               <?php $this->assign('_oFirstRecommendationList', $this->_tpl_vars['_oRecommendationList']->current()); ?>
            <?php $this->assign('_oBoxTopProduct', $this->_tpl_vars['_oFirstRecommendationList']->getFirstArticle()); ?>
            <?php $this->assign('_sTitle', ((is_array($_tmp=($this->_tpl_vars['_oBoxTopProduct']->oxarticles__oxtitle->value)." ".($this->_tpl_vars['_oBoxTopProduct']->oxarticles__oxvarselect->value))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp))); ?>
            <a href="<?php echo $this->_tpl_vars['_oBoxTopProduct']->getMainLink(); ?>
" class="featured" title="<?php echo $this->_tpl_vars['_sTitle']; ?>
">
                <img src="<?php echo $this->_tpl_vars['_oBoxTopProduct']->getIconUrl(); ?>
" alt="<?php echo $this->_tpl_vars['_sTitle']; ?>
">
            </a>
        <?php endif; ?>
    <?php endif; ?>
        <ul class="featuredList">
        <?php if ($this->_tpl_vars['_oRecommendationList']): ?>
            <?php $_from = $this->_tpl_vars['_oRecommendationList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['testRecommendationsList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['testRecommendationsList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['_oListItem']):
        $this->_foreach['testRecommendationsList']['iteration']++;
?>
                <li>
                    <a href="<?php echo $this->_tpl_vars['_oListItem']->getLink(); ?>
"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['_oListItem']->oxrecommlists__oxtitle->value)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</b></a>
                    <div class="desc"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_RECOMMENDATIONLIST_LISTBY'), $this);?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['_oListItem']->oxrecommlists__oxauthor->value)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</div>
                </li>
            <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
            <?php if ($this->_tpl_vars['_oRecommendationList'] || $this->_tpl_vars['oView']->getRecommSearch()): ?>
            <li>
                <form name="basket" class="recommendationsSearchForm" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfActionLink(); ?>
" method="post">
                    <div>
                        <input type="hidden" name="cl" value="recommlist">
                        <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

                    </div>
                    <label><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_RECOMMENDATIONLIST_SEARCHFORLISTS'), $this);?>
</label>
                    <input type="text" name="searchrecomm" id="searchRecomm" value="<?php echo $this->_tpl_vars['oView']->getRecommSearch(); ?>
" class="searchInput">
                    <button class="submitButton largeButton" type="submit"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_RECOMMENDATIONLIST_SEARCHBUTTON'), $this);?>
</button>
                </form>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php endif; ?>