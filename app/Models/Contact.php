<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $table = 'contact';

    protected $primaryKey = 'id';

    public $fillable = [
        'name',
        'email',
        'contact',
        'address',
        'subject',
        'message'
    ];
    public $timestamps = true;
}
