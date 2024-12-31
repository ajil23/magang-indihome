<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DataSales;
use App\Models\Sector;
use App\Models\TransactionType;
use App\Models\Visit;
use Illuminate\Http\Request;

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
}
