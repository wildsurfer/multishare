<?php

namespace Multishare\Network;

interface NetworkInterface
{
    public function shareUrl($url, $comment);
}
