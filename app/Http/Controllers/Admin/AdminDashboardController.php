<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();
        $revenue = Transaction::where("transaction_status", "SUCCESS")->sum(
            "total_price"
        );
        $transaction = Transaction::count();
        return view("pages.admin.dashboard", [
            "customer" => $customer,
            "revenue" => $revenue,
            "transaction" => $transaction,
        ]);
    }
}