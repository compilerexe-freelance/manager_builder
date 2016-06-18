<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Record_Users extends Model
{
    use SoftDeletes;
    protected $table = 'users';
    protected $fillable = ['code','name','address','tel','email','username','password','permission'];
    protected $dates = ['deleted_at'];

}
