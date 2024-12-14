<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approve extends Model
{
    use HasFactory;
    public $table = 'Approve';
    protected $primaryKey = 'approveID';
    public $timestamps = false;
    protected $fillable=
    [
        'userID',
        'requestID',
        'approveComment',
        'approveDate',
    ];
}
