<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Dossier extends Model
{
  public static function boot(){
    parent::boot();

    // over-ride the creating event
    static::creating(function($dossier)
    {
      $dossier->id_user = auth()->user() ? auth()->user()->id : null;
      $dossier->status = 'en attent';

    });
  }
}
