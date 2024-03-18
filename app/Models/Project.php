<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//ricordati di importare hasMany!
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    // nei fillable vanno indicati i campi con valore decsritti nelle migration
    protected $fillable = [
        'name',
        'description',
        'user_id'
    ];

    public function projectTasks(): HasMany {
        return $this->hasMany(Task::class);
    }
}

// class Progetti extends Model
// {
//     protected $table = 'progetti';
//     use HasFactory;
//     public function user()
//     {
//         return $this->belongsTo(User::class);
//     }
// }
