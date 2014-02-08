<?php

namespace Multishare\Network;
namespace Silex\Application;

interface NetworkInterface
{
    public function shareUrl($url, $comment);
}
