<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=["content", "status"];
    /**
     * このタスクを所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
