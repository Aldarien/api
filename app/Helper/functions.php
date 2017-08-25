<?php
function api($output, $status = 200) {
	return App\Contract\API::output($output, $status);
}
function input($name = null) {
	return App\Contract\API::input($name);
}
?>