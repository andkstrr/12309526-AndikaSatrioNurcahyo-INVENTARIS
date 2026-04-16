<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Exports\LendingsExport;
use Maatwebsite\Excel\Facades\Excel;

class LendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lendings = Lending::with('item', 'handledBy', 'returnedBy')->get();

        return view('pages.staff.lendings.index', compact('lendings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();

        return view('pages.staff.lendings.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'entries' => 'required|array|min:1',
            'entries.*.borrower_name' => 'required',
            'entries.*.item_id' => 'required',
            'entries.*.total' => 'required|integer|min:1',
            'reason' => 'required',
        ]);

        // Check stock availability for all entries first
        foreach ($validated['entries'] as $index => $entry) {
            $item = Item::findOrFail($entry['item_id']);
            $available = $item->total - $item->repair - $item->activeLendingsTotal();

            if ($entry['total'] > $available) {
                return redirect()->back()->withInput()->with('error', 'Item "' . $item->name . '" stock not available! Available stock is ' . $available . ' unit.');
            }
        }

        // Create all lending records
        foreach ($validated['entries'] as $entry) {
            Lending::create([
                'borrower_name' => $entry['borrower_name'],
                'item_id' => $entry['item_id'],
                'total' => $entry['total'],
                'reason' => $validated['reason'],
                'handled_by' => auth()->id(),
                'date' => now()->format('Y-m-d'),
            ]);
        }

        return redirect()->route('staff.lendings.index')->with('success', 'Lending data created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lending $lending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lending $lending)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lending $lending)
    {
        if ($lending->returned_at) {
            return redirect()->back()->with('error', 'Item has already been returned.');
        }

        $lending->update([
            'returned_at' => now(),
            'returned_by' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Item returned successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lending $lending)
    {
        $lending->delete();

        return redirect()->route('staff.lendings.index')->with('success', 'Lending data deleted successfully.');
    }

    public function export()
    {
        return Excel::download(new LendingsExport, 'lendings.xlsx');
    }
}
