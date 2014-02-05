<?php
if(!empty($users)) {
	foreach($users as $user) {
		echo $user['User']['username']."\n";
	}
} else {
	echo 'No results!'."\n";
}
?>