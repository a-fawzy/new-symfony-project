<?php

namespace Ahmed\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AhmedUserBundle extends Bundle {

    public function getParent() {
        return 'FOSUserBundle';
    }

}
