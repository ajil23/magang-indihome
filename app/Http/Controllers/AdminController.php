<?php

namespace App\Http\Controllers;

use App\Models\DataSales;
use App\Models\Sector;
use App\Models\TransactionType;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $sector = Sector::count();
        $dataSales = DataSales::count();
        $transaction = TransactionType::count();
        $sales = User::where('role', 'sales')->count();
        return view('admin.index', compact('sector', 'dataSales', 'transaction', 'sales'));
    }
}
