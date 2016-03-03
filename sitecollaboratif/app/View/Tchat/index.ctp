<?php 
echo $this->Html->script('/js/jquery-1.12.0.min.js');
echo $this->Html->script('chat.chat.js');
echo $this->Html->css('chat.chat.css');
?>
<?php echo $this->ajaxChat->generate('generale'); ?> 