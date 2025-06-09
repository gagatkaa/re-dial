<?php

use \Illuminate\Database\Eloquent\Model;

class Story extends Model
{
  public $timestamps = false; // ✅ if you're not using created_at / updated_at
  protected $table = 'user_stories'; // ✅ THIS is required!



  protected $fillable = [
    'user_name',
    'usage_time',
    'tool_used',
    'impact',
    'consent_to_share',
  ];
  //


  public static function validate($data)
  {
    $errors = [];


    if (empty($_POST['user_name'])) {
      $errors['user_name'] = 'Name is required.';
    }

    if (empty($_POST['usage_time'])) {
      $errors['usage_time'] = 'Please select a moment.';
    }

    if (empty($_POST['tool_used'])) {
      $errors['tool_used'] = 'Please select a tool.';
    }

    if (empty($_POST['impact'])) {
      $errors['impact'] = 'Please describe how it helped.';
    }


    return $errors;
  }

}
