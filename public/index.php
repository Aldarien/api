<?php
include_once dirname(__DIR__) . '/bootstrap/autoload.php';

if (get('p') !== false) {
	switch (get('p')) {
		case 'test':
			echo api(['test' => 'ok']);
			break;
		default:
			echo api(['test2' => 'nok'], 404);
			break;
	}
} else {
	echo api(['test1' => 'nok'], 404);
}
?>
