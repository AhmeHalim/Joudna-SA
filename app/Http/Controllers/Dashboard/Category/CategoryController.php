<?php

namespace app\Http\Controllers\Dashboard\Category;

use App\DataTables\Categories\CategoryDataTable;
use app\Http\Controllers\Controller;
use app\Http\Requests\Dashboard\Category\CategoryRequest;
use App\Models\Dashboard\Category\Category;
use App\Services\Dashboard\Category\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;

        $this->middleware('can:categories.read')->only('index');
        $this->middleware('can:categories.create')->only('store');
        $this->middleware('can:categories.update')->only('update');
        $this->middleware('can:categories.delete')->only('destroy');
    }

    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('Dashboard.Category.index');
    }

    public function create()
    {
        return view('Dashboard.Category.create');
    }

    public function store(CategoryRequest $request)
    {
        try {
            $dataValidated = $request->validated();
            $this->categoryService->store($dataValidated);
            return redirect()->route('categories.index')->with(['success' => __('messages.your_item_added_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit(Category $category)
    {
        return view('Dashboard.Category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $dataValidated = $request->validated();
            $this->categoryService->update($request, $dataValidated, $category);
            return redirect()->route('categories.index')->with(['success' => __('messages.your_item_added_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        $selectedIds = $request->input('selectedIds');

        $request->validate([
            'selectedIds'   => ['array', 'min:1'],
            'selectedIds.*' => ['exists:categories,id'],
        ]);

        $deleted = $this->categoryService->deleteCategories($selectedIds);

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
