<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $primaryKey = 'id';

    protected $fillable = ['image','name','description','live_link','source_code','techs'];

    public function ProjectTech(){
        return $this->hasMany(ProjectTech::class);
    }
}
