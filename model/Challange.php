<?php

use \Illuminate\Database\Eloquent\Model;

class Challange extends Model {
  //
  public $timestamps = false;

  public function orders() {
    return $this->belongsToMany(Order::class);
  }

  public static function validate($data) {
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
    if(!is_numeric($data['price'])){
        $errors[] = 'The price must contain a number.';
    }
    if (empty($data['image'])) {
      $errors[] = 'Please fill in a image';
    }

    return $errors;
  }
  
}
