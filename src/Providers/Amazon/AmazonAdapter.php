<?php

namespace Allyson\Providers\Amazon;

use Allyson\Providers\BaseProvider;

class AmazonAdapter extends BaseProvider
{
    public function api(object $mail): bool
    {
        return false;
    }

    public function sdk(object $mail): bool
    {
        return false;
    }
}