<?php

namespace app\Http\Controllers\Dashboard;

use app\Http\Controllers\Controller;
use app\Models\Dashboard\Blog\Blog;
use App\Models\Dashboard\Category\Category;
use app\Models\Dashboard\Client\Client;
use app\Models\Dashboard\ContactUs\ContactUs;
use App\Models\Dashboard\Item\Item;
use app\Models\Dashboard\Page\Page;
use app\Models\Dashboard\Testimonial\Testimonial;
use app\Models\User;
use app\Services\Dashboard\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function home()
    {
        $statistics = [
            'users' => User::count(),
            'categories' => Category::count(),
            'items' => item::count(),
            'blogs' => Blog::count(),
            'clients' => Client::count(),
            'testimonials' => Testimonial::count(),
            'pages' => Page::count(),
            'contact_messages' => ContactUs::count(),
        ];

        $recent_blogs = Blog::latest()->take(5)->get();
        $recent_messages = ContactUs::latest()->take(5)->get();

            return view('Dashboard.home', compact('statistics', 'recent_blogs', 'recent_messages'));
    }


    public function changeStatus(Request $request)
    {
        $selectedIds = $request->input('selectedIds');

        $model = $request->input('modelName');

        $updated = $this->dashboardService->changeStatus($model, $selectedIds);

        if ($updated) {
            // Set a flash message in the session
            session()->flash('success', __('status updated successfully'));

            return response()->json(['success' => true, 'newStatus' => $updated['newStatus'], 'message' => __('status updated successfully')]);
        } else {
            return response()->json(['success' => false, 'message' => __('status update failed')]);
        }
    }
}
