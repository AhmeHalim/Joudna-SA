<?php

namespace App\Http\Controllers\Dashboard\Feedback;

use App\DataTables\Feedback\FeedbackDataTable;
use App\Http\Controllers\Controller;
use App\Models\Website\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:feedbacks.read')->only('index');
        $this->middleware('can:feedbacks.delete')->only('destroy');
    }

    public function index(FeedbackDataTable $dataTable)
    {
        return $dataTable->render('Dashboard.Feedbacks.index');
    }

    public function destroy(Request $request)
    {
        $selectedIds = $request->input('selectedIds');

        $request->validate([
            'selectedIds'   => ['array', 'min:1'],
            'selectedIds.*' => ['exists:feedbacks,id'],
        ]);

        $deleted = Feedback::whereIn('id', $selectedIds)->delete();

        if (request()->ajax()) {
            if (!$deleted) {
                return response()->json(['message' => __('messages.an_error_entering_data')], 422);
            }
            return response()->json(['success' => true, 'message' => trans('messages.your_items_deleted_successfully')]);
        }
    }
}
