<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDocument extends Model
{
    use HasFactory;
    public $table = 'RequestDocument';
    protected $primaryKey = 'requestID';
    public $timestamps = false;
    protected $fillable=
    [  
        'requestID',
        'requestTypeID',
        'docTypeID',
        'docRefCode',
        'currentRevNo',
        'docTitle',
        'requestReason',  
        'userID',  
        'requestFile',  
        'requestDate',
        'requestStatus',
    ];
}
