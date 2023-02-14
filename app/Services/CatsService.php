<?php

namespace App\Services;

use App\Models\Country;

class CatsService
{
  public function get()
  {
    return Country::all()->sortBy('country_name');
  }
}