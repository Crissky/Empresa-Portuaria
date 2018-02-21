<?php

/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** caminhos dos templates de header e footer **/
define('HEADER_TEMPLATE', ABSPATH . 'header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'footer.php');
