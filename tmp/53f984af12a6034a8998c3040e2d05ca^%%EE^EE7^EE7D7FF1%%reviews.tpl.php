<?php /* Smarty version 2.6.26, created on 2012-05-08 08:08:47
         compiled from widget/reviews/reviews.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/reviews/reviews.tpl', 1, false),array('function', 'oxmultilang', 'widget/reviews/reviews.tpl', 19, false),array('function', 'oxid_include_dynamic', 'widget/reviews/reviews.tpl', 26, false),array('function', 'oxgetseourl', 'widget/reviews/reviews.tpl', 46, false),array('function', 'math', 'widget/reviews/reviews.tpl', 61, false),array('modifier', 'cat', 'widget/reviews/reviews.tpl', 46, false),array('modifier', 'date_format', 'widget/reviews/reviews.tpl', 58, false),)), $this); ?>
<?php echo smarty_function_oxscript(array('include' => "js/widgets/oxrating.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$( '#reviewRating' ).oxRating({openReviewForm: false, hideReviewButton: false});"), $this);?>

<?php echo smarty_function_oxscript(array('include' => "js/widgets/oxreview.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$( '#writeNewReview' ).oxReview();"), $this);?>

<div id="review">
    
        <?php if ($this->_tpl_vars['oxcmp_user']): ?>
            <form action="<?php echo $this->_tpl_vars['oViewConf']->getSelfActionLink(); ?>
" method="post" id="rating">
                <div id="writeReview">
                    <?php if ($this->_tpl_vars['oView']->canRate()): ?>
                        <input id="productRating" type="hidden" name="artrating" value="0">
                        <input id="recommListRating" type="hidden" name="recommlistrating" value="0">
                        <ul id="reviewRating" class="rating">
                            <li id="reviewCurrentRating" class="currentRate">
                                <a title="<?php echo $this->_tpl_vars['_star_title']; ?>
"></a>
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
                                  <a class="ox-write-review ox-rateindex-<?php echo $this->_sections['star']['index']; ?>
" rel="nofollow" title="<?php echo $this->_sections['star']['index']; ?>
 <?php if ($this->_sections['star']['index'] == 1): ?><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_STAR'), $this);?>
<?php else: ?><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_STARS'), $this);?>
<?php endif; ?>"></a>
                                </li>
                            <?php endfor; endif; ?>
                        </ul>
                    <?php endif; ?>
                    <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

                    <?php echo $this->_tpl_vars['oViewConf']->getNavFormParams(); ?>

                    <?php echo smarty_function_oxid_include_dynamic(array('file' => "form/formparams.tpl"), $this);?>

                    <input type="hidden" name="fnc" value="savereview">
                    <input type="hidden" name="cl" value="<?php echo $this->_tpl_vars['oViewConf']->getActiveClassName(); ?>
">
                    <?php if ($this->_tpl_vars['oDetailsProduct']): ?>
                        <input type="hidden" name="anid" value="<?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxid->value; ?>
">
                    <?php else: ?>
                        <?php $this->assign('_actvrecommlist', $this->_tpl_vars['oView']->getActiveRecommList()); ?>
                        <input type="hidden" name="recommid" value="<?php echo $this->_tpl_vars['_actvrecommlist']->oxrecommlists__oxid->value; ?>
">
                    <?php endif; ?>

                    <?php if ($this->_tpl_vars['sReviewUserHash']): ?>
                        <input type="hidden" name="reviewuserhash" value="<?php echo $this->_tpl_vars['sReviewUserHash']; ?>
">
                    <?php endif; ?>

                    <textarea  rows="15" name="rvw_txt" class="areabox"></textarea><br>
                    <button id="reviewSave" type="submit" title="<?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_SAVEREVIEW'), $this);?>
" class="submitButton"><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_SAVEREVIEW'), $this);?>
</button>
                </div>
            </form>
            <a id="writeNewReview" rel="nofollow"><b><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_WRITEREVIEW'), $this);?>
</b></a>
        <?php else: ?>
            <a id="reviewsLogin" rel="nofollow" href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account") : smarty_modifier_cat($_tmp, "cl=account")),'params' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="anid=".($this->_tpl_vars['oDetailsProduct']->oxarticles__oxnid->value))) ? $this->_run_mod_handler('cat', true, $_tmp, "&amp;sourcecl=") : smarty_modifier_cat($_tmp, "&amp;sourcecl=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getActiveClassName())))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()))), $this);?>
"><b><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_LOGINTOWRITEREVIEW'), $this);?>
</b></a>
        <?php endif; ?>
    


    <?php if ($this->_tpl_vars['oView']->getReviews()): ?>
        <?php $_from = $this->_tpl_vars['oView']->getReviews(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ReviewsCounter'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ReviewsCounter']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['review']):
        $this->_foreach['ReviewsCounter']['iteration']++;
?>
            <dl>
                
                    <dt id="reviewName_<?php echo $this->_foreach['ReviewsCounter']['iteration']; ?>
" class="clear item">
                        <span>
                            <span><?php echo $this->_tpl_vars['review']->oxuser__oxfname->value; ?>
</span> <?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_WRITES'), $this);?>

                            <span><?php echo ((is_array($_tmp=$this->_tpl_vars['review']->oxreviews__oxcreate->value)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
</span>
                        </span>
                        <?php if ($this->_tpl_vars['review']->oxreviews__oxrating->value): ?>
                            <?php echo smarty_function_math(array('equation' => "x*y",'x' => 20,'y' => $this->_tpl_vars['review']->oxreviews__oxrating->value,'assign' => 'iRatingAverage'), $this);?>

                            <ul class="rating">
                                <li class="currentRate" style="width: <?php echo $this->_tpl_vars['iRatingAverage']; ?>
%;"></li>
                            </ul>
                        <?php endif; ?>
                    </dt>
                    <dd>
                        <div id="reviewText_<?php echo $this->_foreach['ReviewsCounter']['iteration']; ?>
" class="description"><?php echo $this->_tpl_vars['review']->oxreviews__oxtext->value; ?>
</div>
                    </dd>
                
            </dl>
        <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
        <dl>
            <dt id="reviewName_<?php echo $this->_foreach['ReviewsCounter']['iteration']; ?>
">
                <?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_REVIEWNOTAVAILABLE'), $this);?>

            </dt>
            <dd></dd>
        </dl>
    <?php endif; ?>

</div>