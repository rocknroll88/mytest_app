<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'phone', 'email', 'subject', 'textarea', 'file', 'author_id'] ;


    public function getUser(){
        return $this->belongsTo(User::class, 'author_id');
    }

}
