<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    //protected $table = '바꾸고 싶은 테이블명';
    //protected $primaryKey = '바꾸고 싶은 pk';
    protected $fillable = ['title', 'ctnt', 'hits'];
    //protected $guarded = ['보호하고 싶은 칼럼명']; 한번 적은 값을 바꾸지 않게 보호하고 싶을 경우
    protected $guarded = ['created_at'];
}
