<?php

class Twitter extends NetworkInterface
{
    public function setApp(Application $app)
    {
        $this->app = $app;
    }

    public function getApp()
    {
        return $this->app;
    }

    public function shareUrl()
    {
        $app = $this->getApp();

        $data = array(
            'status' => 'Test status text'
        );

        $twitter = new TwitterAPIExchange($app['twitter']['settings']);
        echo $twitter->buildOauth($app['twitter']['url'].'statuses/update.json', 'POST')
            ->setPostfields($data)
            ->performRequest();
    }
}
