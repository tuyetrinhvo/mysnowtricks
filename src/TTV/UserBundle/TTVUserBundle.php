<?php

namespace TTV\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TTVUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
