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
        return $query->where('complete', '=', true);
    }

     /**
     * Scope a query to only uncomplete items.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOpen($query)
    {
        return $query->where('complete', '=', false);
    }

    /**
     * Scope a query to get all of the items for display in console.
     *
     * @return  Array
     */
    public function scopeAllForDisplay()
    {
        return Item::all(['name', 'complete', 'due_date'])
            ->map(function($item) {
                return [
                    'name' => $item->name,
                    'complete' => $item->complete ? 'True' : 'False',
                    'due_date' => isset($item->due_date) ? $item->due_date->format('m/d/Y') : null,
                ];
            })->toArray();
    }
}
