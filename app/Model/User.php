<?php

declare (strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;
use Fx\HyperfHttpAuth\Contract\Authenticatable;

/**
 */
class User extends Model implements Authenticatable
{
    use \Fx\HyperfHttpAuth\Authenticatable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
}