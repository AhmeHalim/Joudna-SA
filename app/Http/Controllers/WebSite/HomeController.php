<?php

namespace app\Http\Controllers\WebSite;

use app\Factories\MessageSender\MessageSenderFactory;
use app\Http\Controllers\Controller;
use App\Http\Requests\Website\BookTableRequest;
use app\Http\Requests\Website\ContactUsRequest;
use App\Http\Requests\Website\FeedbackRequest;
use app\Models\Dashboard\About\AboutUs;
use app\Models\Dashboard\About\AboutValue;
use app\Models\Dashboard\Album\Album;
use app\Models\Dashboard\Blog\Blog;
use app\Models\Dashboard\Category\Category;
use app\Models\Dashboard\Client\Client;
use app\Models\Dashboard\ContactUs\ContactUs;
use app\Models\Dashboard\Page\Page;
use app\Models\Dashboard\Setting\HomepageSection;
use app\Models\Dashboard\Setting\Setting;
use app\Models\Dashboard\Slider\Slider;
use app\Models\Dashboard\Testimonial\Testimonial;
use app\Models\Dashboard\WebsiteStatistics\WebsiteStatistics;
use App\Models\Website\BookTable;
use App\Models\Website\Feedback;

class HomeController extends Controller
{
    protected $settings;
    public function __construct()
    {
        $this->settings = Setting::firstOrFail();
    }

    public function index()
    {
        $lang = app()->getLocale();

        $homepageSections = HomepageSection::where('is_active', '1')->orderBy('order')->get();
        $sliders = Slider::where('lang', $lang)->where('status', 'published')->get();
        $clients = Client::where('status', 'published')->where('home', 'published')->get();
        $menuCategories = Category::with(['items' => function($query) {
            $query->where('status', 'published')->orderBy('display_order');
        }])
            ->where('status', 'published')
            ->orderBy('display_order')
            ->get()
            ->filter(fn($category) => $category->items->isNotEmpty());




        $recentProjectAlbums = Album::where('status', 'published')->where('type','projects')->take(6)->get();
        $projects_album = Album::with('images')->where('status', 'published')->where('type', 'project')->first();
        $aboutUs = AboutUs::first();
        $about_values = AboutValue::where('status', 'published')->get();
        $websiteStatistics = WebsiteStatistics::where('status', 'published')->get();
        $blogs = Blog::with('category')->where('status', 'published')->where('home', 1)->latest()->limit(6)->get();
        $testimonials = Testimonial::where('status', 'published')->get();

        return view('website.home',compact('homepageSections','sliders','projects_album','clients','aboutUs','about_values','websiteStatistics','testimonials','recentProjectAlbums','projects_album','blogs','menuCategories'));
    }

    public function about_us()
    {
        $aboutUs = AboutUs::first();
        $websiteStatistics = WebsiteStatistics::where('status', 'published')->get();
        $about_values = AboutValue::where('status', 'published')->get();

        return view('website.about_us', compact('aboutUs', 'about_values','websiteStatistics'));
    }

    public function contact_us()
    {
        return view('website.contact_us');
    }

    public function contact_us_save(ContactUsRequest $request)
    {
        $validated_data = $request->validated();
        $contact= ContactUs::create($validated_data);

        $user = [
            'email' => 'info@email.com',
            'contact_email' => $contact->email,
            'name' => $contact->name,
            'phone' => $contact->phone,
            'message' => $contact->message,
        ];

        $emailSender = MessageSenderFactory::make('email');
        $emailSender->send(
            [$user],
            'contact_us',
            __('home.Thank You'),
            __('home.Thank you for contact us we will call you soon')
        );

        return back()->with(['success' => trans('home.Thank you for contacting us. A customer service officer will contact you soon')]);
    }

    public function galleryImages()
    {
        $generalAlbum = Album::where('album_type', 'images')->where('type', 'general')->with('images')->first();
        return view('website.gallery-images',compact('generalAlbum'));
    }

    public function galleryVideos()
    {
        $generalAlbum = Album::where('album_type', 'images')->where('type', 'general')->with('videos')->first();
        return view('website.gallery-videos',compact('generalAlbum'));
    }

    public function menu()
    {
        $menuCategories = Category::with(['items' => function($query) {
            $query->where('status', 'published')->orderBy('display_order');
        }])
            ->where('status', 'published')
            ->orderBy('display_order')
            ->get()
            ->filter(fn($category) => $category->items->isNotEmpty());
        return view('website.menu',compact('menuCategories'));
    }

    public function feedBack()
    {
        return view('website.feed_back');
    }

    public function feedback_save(FeedbackRequest $request)
    {
        $validated_data = $request->validated();
        $feedback = Feedback::create($validated_data);

        $user = [
            'email'         => 'info@email.com',
            'contact_email' => $feedback->email,
            'name'          => $feedback->fname . ' ' . $feedback->lname,
            'phone'         => $feedback->phone,
            'message'       => $feedback->message,
        ];

        $emailSender = MessageSenderFactory::make('email');
        $emailSender->send(
            [$user],
            'feedback',
            __('home.Thank You'),
            __('home.Thank you for your feedback')
        );

        return back()->with(['success' => trans('home.Thank you for your feedback we will review it soon')]);
    }

    public function book_table()
    {
        return view('website.book-table');
    }
    public function book_table_save(BookTableRequest $request)
    {
        $validated_data = $request->validated();
        $booking = BookTable::create($validated_data);

        $user = [
            'email'         => 'info@email.com',
            'contact_email' => $booking->email,
            'name'          => $booking->name,
            'phone'         => $booking->phone,
            'message'       => $booking->message,
        ];

        $emailSender = MessageSenderFactory::make('email');
        $emailSender->send(
            [$user],
            'book_table',
            __('home.Thank You'),
            __('home.Thank you for your booking')
        );

        return back()->with(['success' => trans('home.book_table_success')]);
    }


}
