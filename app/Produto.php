<?php

namespace App;

use App\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produto extends Model
{
    // Impede que Laravel insira registros de tempo nos registros
    public $timestamps = false;

    public function Image(): BelongsToMany {
        return $this->belongsToMany(Image::class);
    }
}
