<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Models;

use Mini\Database\Mysql\Eloquent as Model;

//use Mini\Database\Mysql\Model;

class User extends Model
{
    protected array $guarded = [];
    protected string $table = 'users';
}
