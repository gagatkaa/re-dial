<?php

use \Illuminate\Database\Eloquent\Model;

class Content extends Model
{
  //
  public $timestamps = false;

  public static function validate($data)
  {
    $errors = [];

    if (empty($data['name'])) {
      $errors[] = 'Please fill in a name';
    }
    if (empty($data['when'])) {
      $errors[] = 'Please pick an option';
    }
    if (empty($data['tool_used'])) {
      $errors[] = 'Please pick an option';
    }
    if (empty($data['impact'])) {
      $errors[] = 'Please pick an option';
    }


    return $errors;
  }

}
