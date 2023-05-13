<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
    public $timestamps = false;
protected $table = 'labact3';
// column sa table
protected $fillable = [
'id', 'firstname', 'lastname'
];
}
