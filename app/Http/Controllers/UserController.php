<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Url;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function stats($userId) {
    	$user = User::findOrFail($userId);

    	$regs = Url::where("user_id", $userId);
    	$sum = collect(["hits" => $regs->sum("hits")]);
    	$count = collect(['count' => $regs->count("id")]);
    	$topDez = collect(["topUrls" => Url::where("user_id", $userId)->top(10)->orderBy("hits", "desc")->get()->toArray()]);

    	$return = $sum->merge($count)->merge($topDez);

    	return response()->json($return);
    }

	public function urls(Request $request, $userId) {
		$user = User::findOrFail($userId);
		
		
		$url = new Url;
		$url->url = $request->url;
		$url->shortUrl = $request->shortUrl;

		$user->addUrl($url);

		return $url;
	}

	public function create(Request $request) {
		$newUser = $request->id;

		if( User::find($newUser) ){
			return response()->json("Conflict", 409);
		}

		$user = new User;

		$user->id = $newUser;

		$user->save();

		return response()->json($user, 201);
	}

	public function delete($user) {
		User::destroy($user);
	}

}
