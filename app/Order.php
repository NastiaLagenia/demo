<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
		'body',
		'fio',
		'email',
		'phone',
		'adress',
		'type',
		'pay',
		'comment',
		'status',
		'user_id'
	];
}
