<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;


class StatsController extends Controller
{
    public function index(){
    	$regs = Url::all();
    	$sum = collect([ 'hits' => $regs->sum("hits")]);
    	$count = collect([ 'count' => $regs->count('id')]);

    	$topDez = collect([ "topUrls" => Url::Top(10)->orderBy("hits", "desc")->get()->toArray()]);

    	$return = $sum->merge($count)->merge($topDez);
    	return response()->json($return);
    }

    public function show($id){
    	return Url::findOrFail($id);
    }
}
