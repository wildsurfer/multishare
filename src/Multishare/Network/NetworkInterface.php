<?php

namespace Multishare\Network;

interface NetworkInterface
{
    public function shareText($text);
    public function buildService();
}
