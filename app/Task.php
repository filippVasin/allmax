<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title', 'user_id', 'priority_id', 'status_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Status','status_id', 'id');
    }

    public function priority()
    {
        return $this->belongsTo('App\Priority', 'priority_id', 'id');
    }
}
