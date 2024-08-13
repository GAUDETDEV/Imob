<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\pdf;


class UserExportController extends Controller
{
    //
    public function exportPDF()
    {
        $users = User::all();
        $pdf = PDF::loadView('admin.users.pdf', compact('users'));
        return $pdf->download('users.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
