<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyOptionRequest;
use App\Models\Property;
use App\Models\PropertyOption;
use Illuminate\Http\Request;

class PropertyOptionController extends Controller
{
    //
    public function index()
    {
        $options = PropertyOption::with('property')->paginate(10);
        return view('admin.options.properties.index', compact('options'));
    }

    public function create()
    {
        $properties = Property::all();

        return view('admin.options.properties.create',[

            'properties' => $properties,

        ]);

    }

    public function store(StorePropertyOptionRequest $request)
    {

        PropertyOption::create($request->all());

        return redirect()->route('admin.options.properties.create')->with('success', 'Option créée avec succès!');

    }

    public function edit(PropertyOption $option)
    {
        $property = Property::where('id',$option->property_id)->first();
        $other_properties = Property::where('id','!=',$option->property_id)->get();

        return view('admin.options.properties.edit',[

            "option" => $option,
            "property" => $property,
            "other_properties" => $other_properties,

        ]);
    }


    public function update(StorePropertyOptionRequest $request, PropertyOption $option)
    {

        $option->update($request->all());

        return redirect()->route('admin.options.properties.edit', $option->id)->with('success', 'Option mise à jour avec succès!');
    }


    public function destroy(PropertyOption $option)
    {
        $option->delete();

        return redirect()->route('admin.options.properties.index', $option->id)->with('success', 'Option supprimée avec succès!');
    }

}
