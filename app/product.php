<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model {

		protected $table = 'products';

		protected $fillable = ['name','price','image','description','orders','status','user_id'];

		public $timestamps = true;

}
