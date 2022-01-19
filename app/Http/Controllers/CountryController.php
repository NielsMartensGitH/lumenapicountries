<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    
    public function showAllCountries()
    {
        // return response()->json(Country::all());

        $result = DB::select("SELECT * FROM countries");
        return json_encode($result);
    }

    public function showOneCountry($id)
    {
        // return response()->json(Country::find($id));

        $result = DB::select("SELECT * FROM countries WHERE id = $id");
        return json_encode($result);
    }

    public function create(Request $request)
    {
        $country = Country::create($request->all());

        return response()->json($country, 201);
    }

    public function update($id, Request $request)
    {
        $country = Country::findOrFail($id);
        $country->update($request->all());

        return response()->json($country, 200);
    }

    public function delete($id)
    {
        Country::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}