<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pensee extends Model
{
    // ADZ: on force explicitement le nom de la table.
    protected $table = 'pensees';

    // ADZ: seuls les champs autorises en insertion de masse.
    protected $fillable = [
        'contenu',
    ];
}
