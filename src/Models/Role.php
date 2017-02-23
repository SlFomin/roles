<?php

namespace SlFomin\Roles\Models;

use Illuminate\Database\Eloquent\Model;
use SlFomin\Roles\Contracts\RoleHasRelations as RoleHasRelationsContract;
use SlFomin\Roles\Traits\RoleHasRelations;
use SlFomin\Roles\Traits\Slugable;

class Role extends Model implements RoleHasRelationsContract
{
    use Slugable, RoleHasRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'level', 'parent_id'];

    /**
     * Create a new model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if ($connection = config('roles.connection')) {
            $this->connection = $connection;
        }
    }
}
