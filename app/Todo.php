<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
   //
   protected $table = 'users';
   protected $fillable = ['username','email','password'];
}
 

?>