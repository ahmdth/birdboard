<?php

namespace App\Models;

use App\Traits\TriggerActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  use HasFactory, TriggerActivity;

  protected $guarded = ['id'];
  protected $touches = ['project'];
  protected $casts = ['complated' => 'boolean'];

//  protected static function boot()
//  {
//    parent::boot();
//    static::created(function ($task) {
//      Activity::create(['description' => 'task_created']);
//    });
//  }


  public function complate()
  {
    $this->update(['complated' => true]);
  }

  public function project()
  {
    return $this->belongsTo(Project::class);
  }

  public function recordActivity($description)
  {
    $this->activity()->create([
      'description' => $description
    ]);
  }
}
