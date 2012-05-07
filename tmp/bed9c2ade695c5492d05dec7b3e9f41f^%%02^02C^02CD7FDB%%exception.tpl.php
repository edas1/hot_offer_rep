<?php /* Smarty version 2.6.26, created on 2012-05-07 11:38:46
         compiled from message/exception.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'message/exception.tpl', 22, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
    <head>
        <title>Exception Error</title>
        <style>
            .errorBox {width: auto; font-size:12px; font-weight:bold; color:#D81F01; margin: 20px; padding: 0; border: none; width: 500px;}
            .errorBox .stackTrace { font-size: 11px; color #000; font-weight: normal; margin: 10px 0; padding: 10px 0; border-top: 2px solid #EED8D2}
            .errorBox .msg { font-size: 14px; color #000; font-weight: normal;}
            .error {padding: 8px 15px 8px 20px;  margin-bottom: 15px; font-size: 12px; color: #4b0b0b; border: 2px solid #fed8d2; background: #ffe7e3;}
            p { font: 12px/12px Trebuchet MS,Tahoma,Verdana,Arial,Helvetica,sans-serif; }
        </style>
    </head>

    <body>
        
        <div class="errorBox" style="width: auto;">
              <?php if (count ( $this->_tpl_vars['Errors'] ) > 0 && count ( $this->_tpl_vars['Errors']['default'] ) > 0): ?>
              <div class="error">
                  <?php $_from = $this->_tpl_vars['Errors']['default']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['oEr']):
?>
                      <p class="msg"><?php echo $this->_tpl_vars['oEr']->getOxMessage(); ?>
</p>

                      <p class="stackTrace"><?php echo ((is_array($_tmp=$this->_tpl_vars['oEr']->getStackTrace())) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
;</p>
                  <?php endforeach; endif; unset($_from); ?>
              </div>
              <?php endif; ?>          
        </div>
    </body>

</html>