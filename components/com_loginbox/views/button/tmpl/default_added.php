<?php
$idLink = intval($this->link->get('id'));
?>
<script type="text/javascript">
window.addEvent('domready', function() {
   var tag = "{loginbutton}<?php echo $idLink?>{/loginbutton}";
   window.parent.jInsertEditorText(tag, 'text');
   window.parent.document.getElementById('sbox-window').close();   
});
</script>