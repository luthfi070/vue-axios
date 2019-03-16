<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class guru extends Model
{
	public $table = 't_guru';

	protected $fillable = [
		'nama', 'email', 'alamat', 'matpel'
	];
}
?>