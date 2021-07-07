<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['note'];

    public function setTitleAttribute($value) {
            $this->attributes['note'] = strtolower($value);
        }

        public function getTitleAttribute($value) {
            return strtoupper($value);
        }
        public function user(){
            return $this->belongsTo('App\User');
        }


}
