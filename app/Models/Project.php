<?php

namespace App\Models;

use App\Traits\TriggerActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  use HasFactory, TriggerActivity;

  protected $guarded = ['id'];

  public function owner()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function tasks()
  {
    return $this->hasMany(Task::class);
  }

//  public function activity()
//  {
//    return $this->morphMany(Activity::class, 'subject');
//  }
//
//  public function recordActivity($description)
//  {
//    $this->activity()->create(compact('description'));
//  }
}
