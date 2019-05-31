<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // Impede que Laravel insira registros de tempo nos registros
    public $timestamps = false;
}
