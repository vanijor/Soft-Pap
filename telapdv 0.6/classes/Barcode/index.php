<?php
// http://taylorlopes.com/gerando-codigo-de-barras-com-php/

require_once('barcode.inc.php'); 
$code_number = '125634991745816477';

// new barCodeGenrator($code_number,0,'hello.gif'); 
new barCodeGenrator($code_number,0,'hello.gif', 190, 130, true);
?> 