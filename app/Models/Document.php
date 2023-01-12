<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'crew_id',
        'code',
        'name',
        'document_number',
        'date_issued',
        'date_expiry',
        'remarks',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_issued' => 'datetime',
        'date_expiry' => 'datetime',
    ];

    function crew()
    {
        return $this->belongsTo(Crew::class);
    }
}
