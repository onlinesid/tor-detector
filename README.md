# Tor Detector PHP library
A library to detect if your website visitor is from a TOR network or not. 

At the moment this is achieved by using a DNS lookup method as described in https://trac.torproject.org/projects/tor/wiki/doc/TorDNSExitList

## Usage

```php
$tor_detector = new OnlineSid\Tor\TorDetector();

$your_server_ip = '1.2.3.4'; // the IP address of your server (web server)
$user_ip = '62.102.148.67'; // is this IP from TOR exit node?

if ($tor_detector->check($user_ip, 80, $your_server_ip)) {
    echo "Tor!\n";
} else {
    echo "Not TOR!\n";
}
```

## Credit
Original code is taken from https://jrnv.nl/detecting-the-use-of-proxies-and-tor-network-6c240d6cc5f (it wasn't working but very close)