<?php /* Smarty version 2.6.26, created on 2012-05-08 08:29:53
         compiled from inc_error.tpl */ ?>

    <?php if (count ( $this->_tpl_vars['Errors']['default'] ) > 0): ?>
    <div class="errorbox">
        <?php $_from = $this->_tpl_vars['Errors']['default']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['oEr']):
?>
            <p><?php echo $this->_tpl_vars['oEr']->getOxMessage(); ?>
</p>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    <?php endif; ?>