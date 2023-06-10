<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Propuesta extends Model
{
    use HasFactory;
    protected $table = 'propuestas';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    public $incrementing = true;
    public $timestamps = false;

    public function estudiantes():BelongsTo{
        return $this->belongsTo(Estudiante::class, 'estudiante_rut', 'rut');
    }

    public function profesor_propuestas():HasMany{
        return $this->hasMany(Profesor_Propuesta::class);
    }
}
