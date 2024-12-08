<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    public $table = 'Document';
    protected $primaryKey = 'docID';
    public $timestamps = false;
    protected $fillable=
    [
        'docTypeID',
        'docRefCode',
        'docTitle',
        'docFile',
        'effectiveDate',
    ];
}
