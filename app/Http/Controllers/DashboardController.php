<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Lending;

class DashboardController extends Controller
{
    public function admin_dashboard()
    {
        $total_items = Item::count();
        $total_categories = Category::count();
        $total_lendings = Lending::count();
        $total_borrowed_items = Lending::whereNull('returned_at')->sum('total');
        
        return view('pages.admin.dashboard', compact('total_items', 'total_categories', 'total_lendings', 'total_borrowed_items'));
    }

    public function staff_dashboard()
    {
        $total_available = Item::sum('total') - Lending::whereNull('returned_at')->sum('total');
        $total_categories = Category::count();
        $total_lendings = Lending::count();

        return view('pages.staff.dashboard', compact('total_available', 'total_categories', 'total_lendings'));
    }
}
