<?php

namespace App\Http\Controllers\Dashboard\BookTable;

use App\DataTables\BookTable\BookTableDataTable;
use App\Http\Controllers\Controller;
use App\Models\Website\BookTable;
use Illuminate\Http\Request;

class BookTableController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:book-tables.read')->only('index');
        $this->middleware('can:book-tables.delete')->only('destroy');
    }

    public function index(BookTableDataTable $dataTable)
    {
        return $dataTable->render('Dashboard.BookTables.index');
    }

    public function destroy(Request $request)
    {
        $selectedIds = $request->input('selectedIds');

        $request->validate([
            'selectedIds'   => ['array', 'min:1'],
            'selectedIds.*' => ['exists:book_tables,id'],
        ]);

        $deleted = BookTable::whereIn('id', $selectedIds)->delete();

        if (request()->ajax()) {
            if (!$deleted) {
                return response()->json(['message' => __('messages.an_error_entering_data')], 422);
            }
            return response()->json(['success' => true, 'message' => trans('messages.your_items_deleted_successfully')]);
        }
    }
}
