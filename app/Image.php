<?php

namespace App;

use App\Produto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Image extends Model
{
    // Impede que Laravel insira registros de tempo nos registros
    public $timestamps = false;

    // Definindo nome da coluna id
    protected $primaryKey = 'id_image';

    public function Image(): BelongsToMany {
        return $this->belongsToMany(Produto::class);
    }
}
