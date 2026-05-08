<?php

namespace app\Http\Controllers\Dashboard\Item;

use App\DataTables\Item\ItemDataTable;
use app\Http\Controllers\Controller;
use app\Http\Requests\Dashboard\Item\ItemRequest;
use App\Models\Dashboard\Item\Item;
use App\Services\Dashboard\Item\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;

        $this->middleware('can:items.read')->only('index');
        $this->middleware('can:items.create')->only('store');
        $this->middleware('can:items.update')->only('update');
        $this->middleware('can:items.delete')->only('destroy');
    }

    public function index(ItemDataTable $dataTable)
    {
        return $dataTable->render('Dashboard.Items.index');
    }

    public function create()
    {
        $categories = $this->itemService->create();
        return view('Dashboard.Items.create', compact('categories'));
    }

    public function store(ItemRequest $request)
    {
        try {
            $dataValidated = $request->validated();
            $this->itemService->store($dataValidated);
            return redirect()->route('items.index')->with(['success' => __('messages.your_item_added_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit(Item $item)
    {
        $categories = $this->itemService->edit($item);
        return view('Dashboard.Items.edit', compact('item', 'categories'));
    }

    public function update(ItemRequest $request, Item $item)
    {
        try {
            $dataValidated = $request->validated();
            $this->itemService->update($request, $dataValidated, $item);
            return redirect()->route('items.index')->with(['success' => __('messages.your_item_added_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        $selectedIds = $request->input('selectedIds');

        $request->validate([
            'selectedIds'   => ['array', 'min:1'],
            'selectedIds.*' => ['exists:Items,id'],
        ]);

        $deleted = $this->itemService->deleteItems($selectedIds);

        if (request()->ajax()) {
            if (!$deleted) {
                return response()->json(['message' => __('messages.an messages.error entering data')], 422);
            }
            return response()->json(['success' => true, 'message' => trans('messages.your_items_deleted_successfully')]);
        }

        if (!$deleted) {
            return redirect()->back()->withErrors(__('messages.an error has occurred. Please contact the developer to resolve the issue'));
        }
    }
}
