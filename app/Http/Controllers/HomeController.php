<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Grapher;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $photo_Gr = [];
        $video_Gr = [];
        // first query all vendor
        // $allVendor = User::where(['type' => 2])->get(); //'is_approve' => 'true'
        // $allVendor = User::where(['type' => 2])->leftJoin('ratings', 'users.id', '=', 'ratings.vendor_id')
        //     ->select('users.*', DB::raw('AVG(ratings.rating) as avg_rating'))
        //     ->groupBy('users.id')
        //     ->get();
        //    $allVendor = User::where('type', 2)
        //         ->leftJoin('ratings', 'users.id', '=', 'ratings.vendor_id')
        //         ->select('users.id', 'users.name', 'users.avatar_vendor', 'users.is_approve', DB::raw('AVG(ratings.rating) as avg_rating'))
        //         ->groupBy('users.id')
        //         ->get();

        // $allVendor = DB::table('users')
        //     ->leftJoin('ratings', 'users.id', '=', 'ratings.vendor_id')
        //     ->select('users.id', 'users.name', 'users.avatar_vendor', 'users.is_approve', DB::raw('AVG(ratings.rating) AS avg_rating'))
        //     ->where('type', '=', 2)
        //     ->groupBy('users.id')
        //     ->get();
        $allVendor = DB::select("SELECT users.id, users.name, users.avatar_vendor, users.is_approve, AVG(ratings.rating) as avg_rating FROM users LEFT JOIN ratings ON users.id = ratings.vendor_id GROUP BY users.id, users.name, users.avatar_vendor, users.is_approve");

        foreach ($allVendor as $key => $item) {

            $vId = $item->id;
            $vName = $item->name;
            if (!empty($item->avatar_vendor)) {
                $vAvatar = $item->avatar_vendor;
            } else {
                $vAvatar = "img/user/a.jpg";
            }
            // $vAvatar;
            $vPhoto = Media::where(['vendor_id' => $vId, 'type' => 'photo'])->get();
            $vInfoPhoto = Grapher::where(['vendor_id' => $vId, 'type' => 'photo', 'plans' => 'Basic'])->first();

            $vVideo = Media::where(['vendor_id' => $vId, 'type' => 'video'])->first();
            $vInfoVideo = Grapher::where(['vendor_id' => $vId, 'type' => 'video', 'plans' => 'Basic'])->first();
            $avgRating = $item->avg_rating;
            if (!empty($vInfoPhoto) && !empty($vPhoto) && !empty($vVideo)) {
                // && !empty($vPhoto)

                $photo_Gr[] = [
                    "id" => $vId,
                    "avatar" => $vAvatar,
                    "name" => $vName,
                    "image" => $vPhoto,
                    "basic" => [
                        "price" => $vInfoPhoto->price,
                        "info" => $vInfoPhoto->srt_desc,
                    ],
                    "avg_rating" => $avgRating,
                ];
            }

            if (!empty($vInfoVideo)  && !empty($vPhoto) && !empty($vVideo)) {
                // && !empty($vVideo)
                $BUG['VID'][] = $vVideo;
                $video_Gr[] = [
                    "id" => $vId,
                    "avatar" => $vAvatar,
                    "name" => $vName,
                    "video" => $vVideo,
                    "basic" => [
                        "price" => $vInfoVideo->price,
                        "info" => $vInfoVideo->srt_desc,
                    ],
                    "avg_rating" => $avgRating,
                ];
            }
        }
        // return $photo_Gr;
        // return $video_Gr;
        // return $allVendor;
        // return $BUG;
        // second query all media photo/video
        // create new object for all vendor merging with ( photo => basic plans ), ( video => basic plans )

        return view('user.home', compact('photo_Gr', 'video_Gr'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        // return view('adminHome');
        return view('admin.dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function vendorHome()
    {
        return view('vendor.dashboard');
    }

    public function contact()
    {
        return view('contact');
    }

    public function AjaxSearch(Request $request)
    {
        // return $request;
        $query = base64_decode($request->input('query'));

        $vendorSuggestions = User::where(['type' => 2, 'is_approve' => 'true'])
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();
        // ->pluck('name', 'description')
        // ->toArray();

        $allVendor = DB::select("SELECT users.id as vendor_id, users.name, users.avatar_vendor, users.is_approve, AVG(ratings.rating) as avg_rating
        FROM users
        LEFT JOIN ratings ON users.id = ratings.vendor_id
        WHERE users.type = 2
          AND users.is_approve = 'true'
          AND (users.name LIKE '%$query%' OR users.description LIKE '%$query%')
        GROUP BY users.id, users.name, users.avatar_vendor, users.is_approve");

        // return URL::to('/');
        foreach ($allVendor as &$item) {
            // Check if avg_rating is null and set it to 0
            if ($item->avg_rating === null) {
                $item->avg_rating = 0;
            }
            // Perform your query to fetch additional data
            $grapher = Grapher::where(['vendor_id' => $item->vendor_id, 'type' => 'photo', 'plans' => 'Basic'])->first();
            $user = User::where(['id' => $item->vendor_id, 'type' => 2, 'is_approve' => 'true'])->first();
            // ELECT * FROM `media` WHERE `vendor_id` = 2 and `type` = 'photo'
            $media = Media::where(['vendor_id' => $item->vendor_id, 'type' => 'photo'])->first();
            if ($item->avatar_vendor === null) {
                if ($media) {
                    $item->avatar_vendor = URL::to('/') . '/' . $media->path;
                } else {
                    $item->avatar_vendor = "https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png";
                }
            }
            // // Check if the query returned a result
            if ($grapher) {
                // Add the additional fields to the item
                $item->price = (int) $grapher->price;
                $item->srt_desc = $grapher->srt_desc;
                $item->location = $user->address;
            } else {
                // Handle the case when no result is found
                $item->price = null;
                $item->srt_desc = null;
                $item->location = null;
            }
        }
        // Remove objects without a price using array_filter
        $allVendor = array_filter($allVendor, function ($item) {
            return isset($item->price);
        });
        // return $allVendor;

        return view("search_result", compact('allVendor'));

        return response()->json(['suggestions' => $vendorSuggestions]);
    }
}
