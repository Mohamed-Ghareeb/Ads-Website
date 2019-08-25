<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'icon', 'parent_id'];

    protected $dates = ['deleted_at'];

    public function iconPath()
    {
        return asset($this->icon);
    }
}
