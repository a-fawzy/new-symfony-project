<?php

namespace Ahmed\AdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AhmedAdminBundle extends Bundle
{
    public function getParent() {
        return 'SonataAdminBundle';
    }
}
