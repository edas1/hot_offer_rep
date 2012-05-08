<?php /* Smarty version 2.6.26, created on 2012-05-08 08:08:46
         compiled from widget/reviews/rating.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/reviews/rating.tpl', 1, false),array('function', 'math', 'widget/reviews/rating.tpl', 5, false),array('function', 'oxgetseourl', 'widget/reviews/rating.tpl', 23, false),array('function', 'oxmultilang', 'widget/reviews/rating.tpl', 36, false),array('modifier', 'oxmultilangassign', 'widget/reviews/rating.tpl', 8, false),array('modifier', 'cat', 'widget/reviews/rating.tpl', 23, false),)), $this); ?>
<?php echo smarty_function_oxscript(array('include' => "js/widgets/oxrating.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$( '#itemRating' ).oxRating();"), $this);?>


<ul id="itemRating" class="rating">
    <?php echo smarty_function_math(array('equation' => "x*y",'x' => 20,'y' => $this->_tpl_vars['oView']->getRatingValue(),'assign' => 'iRatingAverage'), $this);?>


    <?php if (! $this->_tpl_vars['oxcmp_user']): ?>
        <?php $this->assign('_star_title', ((is_array($_tmp='DETAILS_LOGIN')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?>
    <?php elseif (! $this->_tpl_vars['oView']->canRate()): ?>
        <?php $this->assign('_star_title', ((is_array($_tmp='DETAILS_ALREADYRATED')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?>
    <?php else: ?>
        <?php $this->assign('_star_title', ((is_array($_tmp='DETAILS_RATETHISARTICLE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?>
    <?php endif; ?>

    <li class="currentRate" style="width: <?php echo $this->_tpl_vars['iRatingAverage']; ?>
%;">
        <a title="<?php echo $this->_tpl_vars['_star_title']; ?>
"></a>
        <span title="<?php echo $this->_tpl_vars['iRatingAverage']; ?>
"></span>
    </li>
    <?php unset($this->_sections['star']);
$this->_sections['star']['name'] = 'star';
$this->_sections['star']['start'] = (int)1;
$this->_sections['star']['loop'] = is_array($_loop=6) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['star']['show'] = true;
$this->_sections['star']['max'] = $this->_sections['star']['loop'];
$this->_sections['star']['step'] = 1;
if ($this->_sections['star']['start'] < 0)
    $this->_sections['star']['start'] = max($this->_sections['star']['step'] > 0 ? 0 : -1, $this->_sections['star']['loop'] + $this->_sections['star']['start']);
else
    $this->_sections['star']['start'] = min($this->_sections['star']['start'], $this->_sections['star']['step'] > 0 ? $this->_sections['star']['loop'] : $this->_sections['star']['loop']-1);
if ($this->_sections['star']['show']) {
    $this->_sections['star']['total'] = min(ceil(($this->_sections['star']['step'] > 0 ? $this->_sections['star']['loop'] - $this->_sections['star']['start'] : $this->_sections['star']['start']+1)/abs($this->_sections['star']['step'])), $this->_sections['star']['max']);
    if ($this->_sections['star']['total'] == 0)
        $this->_sections['star']['show'] = false;
} else
    $this->_sections['star']['total'] = 0;
if ($this->_sections['star']['show']):

            for ($this->_sections['star']['index'] = $this->_sections['star']['start'], $this->_sections['star']['iteration'] = 1;
                 $this->_sections['star']['iteration'] <= $this->_sections['star']['total'];
                 $this->_sections['star']['index'] += $this->_sections['star']['step'], $this->_sections['star']['iteration']++):
$this->_sections['star']['rownum'] = $this->_sections['star']['iteration'];
$this->_sections['star']['index_prev'] = $this->_sections['star']['index'] - $this->_sections['star']['step'];
$this->_sections['star']['index_next'] = $this->_sections['star']['index'] + $this->_sections['star']['step'];
$this->_sections['star']['first']      = ($this->_sections['star']['iteration'] == 1);
$this->_sections['star']['last']       = ($this->_sections['star']['iteration'] == $this->_sections['star']['total']);
?>
        <li class="s<?php echo $this->_sections['star']['index']; ?>
">
            <a  class="<?php if ($this->_tpl_vars['oView']->canRate()): ?>ox-write-review<?php endif; ?> ox-rateindex-<?php echo $this->_sections['star']['index']; ?>
" rel="nofollow"
                <?php if (! $this->_tpl_vars['oxcmp_user']): ?>
                    href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account") : smarty_modifier_cat($_tmp, "cl=account")),'params' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="anid=".($this->_tpl_vars['oDetailsProduct']->oxarticles__oxnid->value))) ? $this->_run_mod_handler('cat', true, $_tmp, "&amp;sourcecl=") : smarty_modifier_cat($_tmp, "&amp;sourcecl=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName())))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()))), $this);?>
"
                <?php elseif ($this->_tpl_vars['oView']->canRate()): ?>
                    href="#review"
                <?php endif; ?>
                title="<?php echo $this->_tpl_vars['_star_title']; ?>
">
            </a>
         </li>
    <?php endfor; endif; ?>
    <li class="ratingValue">
        <a id="itemRatingText" class="rates" rel="nofollow" <?php if ($this->_tpl_vars['sRateUrl']): ?>href="<?php if (! $this->_tpl_vars['oxcmp_user']): ?><?php echo smarty_function_oxgetseourl(array('ident' => $this->_tpl_vars['sRateUrl'],'params' => $this->_tpl_vars['sRateUrlParams']), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['sRateUrl']; ?>
<?php endif; ?>#review"<?php endif; ?>>
            <?php if ($this->_tpl_vars['oView']->getRatingCount()): ?>
                (<?php echo $this->_tpl_vars['oView']->getRatingCount(); ?>
)
            <?php else: ?>
                <?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_NORATINGS'), $this);?>

            <?php endif; ?>
        </a>
    </li>
</ul>

