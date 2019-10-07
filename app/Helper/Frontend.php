<?php

namespace App\Helper;
use Illuminate\Support\Facades\DB;

class Frontend 
{
	public static function sidebar()
	{
		return DB::select("SELECT cat.id,cat.Name,cat.status,(SELECT Name FROM category where id = cat.parent_id) as parent FROM category as cat");
	}
}
?>