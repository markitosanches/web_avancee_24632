<?php
namespace App\Models;
use App\Models\CRUD;

class City extends CRUD {
    protected $table = "city";
    protected $primaryKey = "id";
    protected $fillable = ['city'];
    
}