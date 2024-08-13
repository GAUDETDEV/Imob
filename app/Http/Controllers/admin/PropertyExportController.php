<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PropertiesExport;
use App\Models\PropertyOption;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\pdf;

class PropertyExportController extends Controller
{
    //
    public function exportPDF()
    {
        $properties = Property::all();

        $pdf = PDF::loadView('admin.properties.pdf', compact('properties'));
        return $pdf->download('proprietes.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new PropertiesExport, 'proprietes.xlsx');
    }

}
