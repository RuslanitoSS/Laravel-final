<?php

// app/Models/Thing.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'wrnt', 'master'];

    public function uses()
    {
        return $this->hasMany(Uses::class);
    }
}

