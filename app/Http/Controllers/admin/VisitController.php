<?php

namespace App\Http\Controllers\admin;

use App\Exports\SalesVisitExport;
use App\Http\Controllers\Controller;
use App\Models\DataSales;
use App\Models\Sector;
use App\Models\TransactionType;
use App\Models\Visit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VisitController extends Controller
{
    public function index()
    {
        $visit = Visit::paginate(10);
        $sector = Sector::all();
        $transaction = TransactionType::all();
        $sales = DataSales::all();
        return view('admin.visit.index', compact('visit', 'sector', 'transaction', 'sales'));
    }

    public function export($format)
    {
        if ($format == 'excel') {
            return Excel::download(new SalesVisitExport, 'sales_visit.xlsx');
        } elseif ($format == 'pdf') {
            $visits = Visit::all();  // Ambil data yang ingin diekspor

            // Render tampilan ke PDF
            $pdf = Pdf::loadView('admin.visit.pdf', compact('visits'));

            // Download PDF
            return $pdf->download('sales_visit.pdf');
        }
    }
}
