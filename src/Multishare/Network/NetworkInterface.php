<?php

namespace Multishare\Network;
namespace Silex\Application;

interface NetworkInterface
{
    public function setApp(Application $app);
    public function getApp();
    public function shareUrl($url, $comment);
}
