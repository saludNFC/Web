<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Patient;

class SearchController extends Controller
{
    public function appendValue($data, $type, $element)
	{
		// operate on the item passed by reference, adding the element and type
		foreach ($data as $key => & $item) {
			$item[$element] = $type;
		}
		return $data;
	}

	public function appendURL($data, $prefix)
	{
		// operate on the item passed by reference, adding the url based on slug
		foreach ($data as $key => & $item) {
			$item['url'] = url($prefix. '/' . $item['historia'] . '/consultas/create');
		}
		return $data;
	}
	public function index(Request $request)
	{
		$query = e($request->input('q',''));
        // dd($query);
		if(!$query && $query == '') return response()->json(array(), 400);

		$patients = Patient::where('apellido','like','%'.$query.'%')
			->orderBy('apellido','asc')
			->take(5)
			->get(array('historia','apellido','nombre'))->toArray();

		// $categories = Category::where('name','like','%'.$query.'%')
		// 	->has('products')
		// 	->take(5)
		// 	->get(array('slug', 'name'))
		// 	->toArray();

		// Data normalization
		// $categories = $this->appendValue($categories, url('img/icons/category-icon.png'),'icon');
		$patients = $this->appendURL($patients, 'paciente');
		// $categories  = $this->appendURL($categories, 'categories');
		// Add type of data to each item of each set of results
		$patients = $this->appendValue($patients, 'patients', 'class');
		// $categories = $this->appendValue($categories, 'category', 'class');
		// Merge all data into one array
		$data = array_merge($patients);
		return response()->json([
			'data'=>$data
		]);
	}
}
