<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profesor_Propuesta extends Model
{
    use HasFactory;
    protected $table = 'profesor_propuestas';
    protected $primaryKey = ['propuesta_id', 'profesor_rut'];
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function profesores():BelongsTo{
        return $this->belongsTo(Profesor::class);
    }

    public function propuestas():BelongsTo{
        return $this->belongsTo(Propuesta::class);
    }
}
