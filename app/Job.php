<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
     public $fillable = ['title','description'];

     /**
     * Get the applications for the job.
     */

     public function applications()
	    {
	        return $this->hasMany('App\Application');
	    }
}
