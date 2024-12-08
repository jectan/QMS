<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $table = 'Role';
    protected $primaryKey = 'roleID';
    public $timestamps = false;
    protected $fillable=
    [
        'roleDesc',
        'status',
    ];
}