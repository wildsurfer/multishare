<?php

namespace Multishare\Network;

class Twitter
{
    protected $config;
    protected $url;

    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setUrl($url)
    {
        $this->url= $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function shareUrl($inputUrl, $inputComment)
    {
        $settings = $this->getConfig();
        $url = $this->getUrl();
        $url = $url.'statuses/update.json';

        $requestMethod = 'POST';

        $twitter = new \TwitterAPIExchange($settings);

        $postFields = array(
            'status' => $inputComment . ' ' . $inputUrl
        );

        $result = $twitter->buildOauth($url, $requestMethod)
            ->setPostfields($postFields)
            ->performRequest();

        if ($result) return true;
        else return false;
    }
}
