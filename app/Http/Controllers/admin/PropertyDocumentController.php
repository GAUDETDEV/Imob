<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyDocumentRequest;
use App\Models\Property;
use App\Models\PropertyDocument;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyDocumentController extends Controller
{
    //
    public function index(Request $request)
    {

        $query = $request->input('query');

        $documents = PropertyDocument::with('property')->where('document_name', 'like', "%$query%")
                     ->orWhere('document_type', 'like', "%$query%")
                     ->orWhere('upload_date', 'like', "%$query%")
                     ->paginate(10);

        $documents = PropertyDocument::with('property')->paginate(10);
        return view('admin.documents.properties.index', compact('documents'));
    }

    public function create()
    {
        $properties = Property::all();
        return view('admin.documents.properties.form', compact('properties'));
    }

    public function store(PropertyDocumentRequest $request)
    {

        $filePath = $request->file('document')->store('documents', 'public');

        PropertyDocument::create([
            'property_id' => $request->property_id,
            'document_name' => $request->document_name,
            'file_path' => $filePath,
            'document_type' => $request->document_type,
            'description' => $request->description,
            'upload_date' => Carbon::now(),
        ]);

        return redirect()->route('admin.documents.properties.create')->with('success', 'Document téléchargé avec succès.');
    }

    public function show($document)
    {
        $document = PropertyDocument::findOrFail($document);
        return view('admin.documents.properties.show', compact('document'));
    }

    public function destroy($document)
    {

        $document = PropertyDocument::findOrFail($document);
        Storage::delete($document->file_path);
        $document->delete();

        return redirect()->route('admin.documents.properties.index')->with('success', 'Document supprimé avec succès.');
    }
}
