<?php

namespace App\Model\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

trait DateScopable
{
    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopetwoMonthsOld(Builder $query){
        $query->where('created_at','<=', now()->subMonth(2));
    }
}