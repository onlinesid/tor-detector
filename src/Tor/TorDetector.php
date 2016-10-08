<?php

namespace OnlineSid\Tor;

/**
 * Class TorDetector
 *
 * Helps to detect if visitors are using a Tor browser to surf the website.
 *
 * Thanks to https://trac.torproject.org/projects/tor/wiki/doc/TorDNSExitList
 *
 * Thanks to https://jrnv.nl/detecting-the-use-of-proxies-and-tor-network-6c240d6cc5f#.k8ldcs21o
 *
 * @package OnlineSid\Tor
 */
class TorDetector
{
    /**
     * Checks if the remote IP is from a TOR exit node or not
     *
     * @param string $remoteIp The IP of the visitor you'd like to check.
     * @param int    $port     The port on which your server is running, e.g.: port 80.
     * @param string $serverIp Your server IP.
     *
     * @return bool
     */
    public function check($remoteIp, $port, $serverIp)
    {
        $detectHost = sprintf(
            '%s.%s.%s.ip-port.exitlist.torproject.org',
            $this->reverseIPOctets($remoteIp),
            $port,
            $this->reverseIPOctets($serverIp)
        );

        // According to the guide, if this returns 127.0.0.2, it's a Tor exit node
        return gethostbyname($detectHost) === '127.0.0.2';
    }

    /**
     * This function simply reverses the IP's octets.
     *
     * @param string $ip The IP to be reversed.
     *
     * @return string
     */
    protected function reverseIPOctets($ip)
    {
        return implode(array_reverse(explode('.', $ip)), '.');
    }
}