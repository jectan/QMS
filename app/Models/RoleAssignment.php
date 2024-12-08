<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleAssignment extends Model
{
    use HasFactory;
    public $table = 'RoleAssignment';
    public $timestamps = false;
    protected $fillable=
    [
        'userID',
        'roleID',
    ];
}
