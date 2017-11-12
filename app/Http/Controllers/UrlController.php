<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index($id) {
    	$url = Url::findOrFail($id);

    	return redirect($url->url, 301);
    }

	public function delete($id) {
		Url::destroy($id);
	}

}
