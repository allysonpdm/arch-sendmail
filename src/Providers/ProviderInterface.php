<?php

namespace Allyson\Providers;

interface ProviderInterface
{
    public function api(object $email): bool;
    public function sdk(object $email): bool;
    public function smtp(object $email): bool;
}