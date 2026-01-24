<?php

namespace app\Http\Controllers\WebSite;

use app\Factories\MessageSender\MessageSenderFactory;
use app\Http\Controllers\Controller;
use app\Http\Requests\Website\ContactUsRequest;
use app\Models\Dashboard\About\AboutUs;
use app\Models\Dashboard\About\AboutValue;
use app\Models\Dashboard\Album\Album;
use app\Models\Dashboard\Blog\Blog;
use app\Models\Dashboard\Client\Client;
use app\Models\Dashboard\ContactUs\ContactUs;
use app\Models\Dashboard\Page\Page;
use app\Models\Dashboard\Project\Project;
use app\Models\Dashboard\Service\Service;
use app\Models\Dashboard\Setting\HomepageSection;
use app\Models\Dashboard\Setting\Setting;
use app\Models\Dashboard\Slider\Slider;
use app\Models\Dashboard\Testimonial\Testimonial;
use app\Models\Dashboard\WebsiteStatistics\WebsiteStatistics;

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
        $services = Service::where('status', 'published')->where('home',1)->take(4)->get();
        $clients = Client::where('status', 'published')->where('home', 'published')->get();
        $recentProjectAlbums = Album::where('status', 'published')->where('type','projects')->take(6)->get();
        $projects_album = Album::with('images')->where('status', 'published')->where('type', 'project')->first();
        $aboutUs = AboutUs::first();
        $about_values = AboutValue::where('status', 'published')->get();
        $websiteStatistics = WebsiteStatistics::where('status', 'published')->get();
        $blogs = Blog::with('category')->where('status', 'published')->where('home', 1)->latest()->limit(6)->get();
        $testimonials = Testimonial::where('status', 'published')->get();

        return view('website.home',compact('homepageSections','sliders','services','projects_album','clients','aboutUs','about_values','websiteStatistics','testimonials','recentProjectAlbums','projects_album','blogs'));
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
            'email' => 'info@vrfegypt.com',
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

    public function services()
    {
        $services = Service::where('status', 'published')->get();
        return view('website.services', compact('services'));
    }

    public function serviceDetails(Service $service)
    {
        $relatedServices =Service::where('status', 'published')->get();
        return view('website.service_details', compact('service','relatedServices'));
    }

    public function projects()
    {
        $services = Service::where('status', 'published')->get();
        return view('website.projects', compact('services'));
    }

    public function projectDetails(Project $project)
    {
        return view('website.service_details', compact('project'));
    }

    public function pageDetails(Page $page)
    {
        return view('website.page_details', compact('page'));
    }

    public function clients()
    {
        $clients = Client::where('status', 'published')->get();
        return view('website.clients', compact('clients'));
    }

    public  function portfolio()
    {
        return view('website.portfolio');
    }


    public function blogs()
    {
        $blogs = Blog::where('status', 'published')->get();
        return view('website.blogs', compact('blogs'));
    }

    public function blogDetails(Blog $blog)
    {
        $relatedBlogs =Blog::where('blog_category_id',$blog->blog_category_id)->where('status', 'published')->get();
        return view('website.blog_details', compact('blog','relatedBlogs'));
    }
}
