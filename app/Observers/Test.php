<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Observers;

use App\Models\User;

class Test
{
    public function created(User $user)
    {
    }
}