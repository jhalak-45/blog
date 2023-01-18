<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactd extends Model
{
    use HasFactory;
    protected $table='contact_details';
    protected $primarykey='id';

    protected $fillable=['name','email','address','website','facebook','github','info','contact'];


}
