<?php
$links = [
"https://addons.mozilla.org/en-US/firefox/addon/dark-scroll/",
"https://github.com/ExclusiveRishi"
];
$i = rand(0, sizeof($links));
header("Location: " . $links[$i]);
exit();