<?php

namespace Allyson\Providers\Google;

use Allyson\Providers\BaseProvider;

class GoogleAdapter extends BaseProvider
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