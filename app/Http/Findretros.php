<?php
namespace App\Http;
use App\Helpers\CMS;
class FindRetros {
    private $pageName, $callTimeout, $usingCloudFlare, $apiPath;

    function __construct() {
        $this->pageName        = CMS::settings('findretros');
        $this->requestTimeout  = 2;
        $this->usingCloudFlare = true;
        $this->apiPath         = 'https://findretros.com/';

        if ($this->usingCloudFlare) {

            if (isset($_SERVER['HTTP_CF_CONNECTING_IP']))
                $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
            else if (isset($_SERVER['HTTP_X_REAL_IP']))
                $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_REAL_IP'];
            else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];

        }

    }

    public function hasClientVoted()
    {
        if (!$this->_isVoteCookieSet())
        {
            $urlRequest = $this->apiPath . 'validate.php?user=' . $this->pageName . '&ip=' . $_SERVER['REMOTE_ADDR'];
            $dataRequest = $this->_makeCurlRequest($urlRequest);

            if (in_array($dataRequest, array(1, 2))) {
                $this->_setVoteCookie();
                return true;
            } else if ($dataRequest == 3) {
                return false;
            } else {
                /* There's something wrong with FindRetros, so we will mark the user as voted and have them proceed as if they voted. */
                $this->_setVoteCookie();
                return true;
            }

        }

        return true;
    }

    public function redirectClientToVote()
    {
        header('Location: ' . $this->apiPath . 'servers/' . $this->pageName . '/vote?minimal=1&return=1');
        exit();
    }

    private function _makeCurlRequest($url)
    {
        if (function_exists('curl_version')) {
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HEADER, 0);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_TIMEOUT, $this->requestTimeout);
            curl_setopt($curl, CURLOPT_USERAGENT, 'FindRetros Vote Validator');

            $requestData = curl_exec($curl);
            curl_close($curl);
        } else {

            $requestData = stream_context_create(array('http' => array('timeout' => $this->requestTimeout)));
            return @file_get_contents($url, 0, $requestData);
        }

        return $requestData;
    }

    private function _setVoteCookie()
    {
        $rankingsResetTime = $this->_getRankingsResetTime();
        setcookie('voting_stamp', $rankingsResetTime, $rankingsResetTime);
    }

    private function _isVoteCookieSet()
    {
        if (isset($_COOKIE['voting_stamp'])) {
            if ($_COOKIE['voting_stamp'] == $this->_getRankingsResetTime()) {
                return true;
            } else {
                setcookie('voting_stamp', '');
                return false;
            }

        }

        return false;
    }

    private function _getRankingsResetTime()
    {
        $serverDefaultTime = date_default_timezone_get();
        date_default_timezone_set('America/Chicago');
        $rankingsResetTime = mktime(0, 0, 0, date('n'), date('j') + 1);
        date_default_timezone_set($serverDefaultTime);

        return $rankingsResetTime;
    }
}
