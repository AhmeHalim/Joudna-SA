<?php
namespace app\Services\Dashboard;

use app\Models\Dashboard\About\AboutValue;
use app\Models\Dashboard\Album\Album;
use app\Models\Dashboard\Blog\Blog;
use app\Models\Dashboard\Blog\BlogCategory;
use app\Models\Dashboard\Category\Category;
use app\Models\Dashboard\Client\Client;
use app\Models\Dashboard\Item\Item;
use app\Models\Dashboard\Menu\Menu;
use app\Models\Dashboard\Menu\MenuItem;
use app\Models\Dashboard\Page\Page;
use app\Models\Dashboard\Slider\Slider;
use app\Models\Dashboard\Testimonial\Testimonial;
use app\Models\Dashboard\WebsiteStatistics\WebsiteStatistics;
use App\Models\Website\StudentTraining;

class DashboardService
{
    public function changeStatus($model, $ids)
    {
        foreach ($ids as $id) {
            if($id === 'on') continue;

            if ($model == 'services') {
                $updatedModel = Category::find($id);
            }

            if ($model == 'albums') {
                $updatedModel = Album::find($id);
            }

            if ($model == 'menus') {
                $updatedModel = Menu::find($id);
            }

            if ($model == 'menu_items') {
                $updatedModel = MenuItem::find($id);
            }

            if ($model == 'pages') {
                $updatedModel = Page::find($id);
            }

            if ($model == 'categories') {
                $updatedModel = Category::find($id);
            }

            if ($model == 'items') {
                $updatedModel = Item::find($id);
            }

            if ($model == 'sliders') {
                $updatedModel = Slider::find($id);
            }

            if ($model == 'blogs') {
                $updatedModel = Blog::find($id);
            }

            if ($model == 'blog_categories') {
                $updatedModel = BlogCategory::find($id);
            }

            if ($model == 'clients') {
                $updatedModel = Client::find($id);
            }

            if ($model == 'testimonials') {
                $updatedModel = Testimonial::find($id);
            }

            if ($model == 'website_statistics') {
                $updatedModel = WebsiteStatistics::find($id);
            }

            if ($model == 'projects') {
                $updatedModel = item::find($id);
            }

            if ($model == 'about_values') {
                $updatedModel = AboutValue::find($id);
            }


            if ($updatedModel) {
                $newStatus = $updatedModel->status == 'published' ? 'inactive' : 'published';
                $updatedModel->update(['status' => $newStatus]);
            }
        }
        return ['newStatus' => $newStatus];
    }

}
