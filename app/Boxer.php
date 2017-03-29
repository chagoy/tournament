<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boxer extends Model
{
    public function scopeFilter($query, $filter)
    {
    	if ($country = $filter['country']) {
    		$query->where('country', $country);
    	}
    	if ($weight = $filter['weight']) {
    		$query->where('weight', $weight);
    	}
    }
}
