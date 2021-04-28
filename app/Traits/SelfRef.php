<?php

namespace App\Traits;

trait SelfRef{
    protected $parentColumn = 'parent_id';

    public function parent()
    {
        return $this->belongsTo(static::class)->with('user:id,first_name,last_name');
    }

    public function children()
    {
        return $this->hasMany(static::class, $this->parentColumn)->with('user:id,first_name,last_name');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren')->with('user:id,first_name,last_name');
    }

    public function root()
    {
        return $this->parent
            ? $this->parent->root()
            : $this;
    }
}
