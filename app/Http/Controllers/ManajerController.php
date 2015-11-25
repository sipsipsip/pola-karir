<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Manajer;

use Illuminate\Http\Request;

class ManajerController extends Controller {

	public function showRencanaKarir($manajer_id, $period)
	{
        $manajer = Manajer::findOrFail($manajer_id);
        $rencanaKarir = $manajer->rencanaKarir;
        return $rencanaKarir;
	}

}
