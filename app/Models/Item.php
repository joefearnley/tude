<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'complete' => 'boolean',
        'due_date' => 'datetime:d/m/Y',
    ];

     /**
     * Scope a query to only complete items.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeComplete($query)
    {
        return $query->whereTrue('complete');
    }

     /**
     * Scope a query to only uncomplete items.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOpen($query)
    {
        return $query->whereFalse('complete');
    }

    public function getCompleteAttribute($value)
    {
        if ($value === '1') {
            return true;
        }

        return false;
    }
}
