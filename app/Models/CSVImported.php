<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CSVImported extends Model
{
    use HasFactory;

    protected static $logAttributes = ['first_name', 'last_name', 'phone', 'mobile_phone','email','website','address','city','state','zip','is_verified'];

    protected static $logName = 'csv_imported';

    protected $table = 'csv_imported';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'mobile_phone','email','website','address','city','state','zip','is_verified'
    ];

}
