<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tech extends Model
{
    use HasFactory;

    protected $table = 'teches';

    protected $primaryKey = 'id';

    protected $fillable = ['image','name'];
}
