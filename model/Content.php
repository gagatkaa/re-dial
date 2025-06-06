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
    if (empty($data['description'])) {
      $errors[] = 'Please fill in a description';
    }
    if (empty($data['price'])) {
      $errors[] = 'Please fill in a price';
    }
    if (!is_numeric($data['price'])) {
      $errors[] = 'The price must contain a number.';
    }
    if (empty($data['image'])) {
      $errors[] = 'Please fill in a image';
    }

    return $errors;
  }

}
