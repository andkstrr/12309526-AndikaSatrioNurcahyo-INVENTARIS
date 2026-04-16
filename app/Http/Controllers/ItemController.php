<?php

namespace App\Http\Controllers;

use App\Exports\ItemsExport;
use App\Models\Item;
use App\Models\Category;
use App\Models\Lending;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with('category')->get();

        return view('pages.admin.items.index', compact('items'));
    }

    public function index_staff()
    {
        $items = Item::with('category')->get();

        return view('pages.staff.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.admin.items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'total' => 'required',
        ]);

        Item::create($validated);

        return redirect()->route('admin.items.index')->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $item = Item::findOrFail($item->id);
        $categories = Category::all();

        return view('pages.admin.items.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'total' => 'required',
            'repair' => 'nullable|integer|min:0',
        ]);

        // If repair is provided, add it to existing value
        if (isset($validated['repair']) && $validated['repair'] > 0) {
            $validated['repair'] = $item->repair + $validated['repair'];
        } else {
            unset($validated['repair']);
        }

        $item->update($validated);

        return redirect()->route('admin.items.index')->with('success', 'Item updated successfully.');
    }

    public function lending(Item $item)
    {
        $lendings = Lending::with('handledBy', 'returnedBy')->where('item_id', $item->id)->get();

        return view('pages.admin.items.lending', compact('item', 'lendings'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }

    public function export()
    {
        return Excel::download(new ItemsExport, 'items.xlsx');
    }
}