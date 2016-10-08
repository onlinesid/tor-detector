<?php

require_once "src/Tor/TorDetector.php";

$tor_detector = new OnlineSid\Tor\TorDetector();

$your_server_ip = '1.2.3.4'; // the IP address of your server (web server)
$user_ip = '62.102.148.67'; // is this IP from TOR exit node?

if ($tor_detector->check($user_ip, 80, $your_server_ip)) {
    echo "Tor!\n";
} else {
    echo "Not TOR!\n";
}

