<?php

namespace Allyson\Providers;

interface ProviderInterface
{
    public function api(object $mail): bool;
    public function sdk(object $mail): bool;
    public function smtp(object $mail): bool;
}