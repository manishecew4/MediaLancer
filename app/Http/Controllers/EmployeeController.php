<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Media;
use App\Models\Rating;
use App\Models\Comment;
use App\Models\Grapher;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function ShowRegister(Request $request)
    {
        return view('auth.vendor_register');
    }

    public function VendorRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'type' => 'required|string|max:255',
            'phone' => 'required|string|unique:users,phone',
            'location' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'landmark' => 'nullable|string|max:255',
            'pin' => 'required|string|max:6',
            'description' => 'nullable|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $vendor = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'type' => $request['type'],
            'phone' => $request['phone'],
            'location' => $request['location'],
            'address' => $request['address'],
            'landmark' => $request['landmark'],
            'pin' => $request['pin'],
            'description' => $request['description'],
            'password' => Hash::make($request['password']),
        ]);
        // return $request;
        // email trigger
        // return "Waiting for Admin approve!";
        return redirect()->back()->with('success', 'Vendor registration successful. Please Wait for Admin approve!');
    }
    public function EmpDetails(Request $request)
    {

        // dd($request);
        $id = $request->id;
        $photo_Gr = [];
        $video_Gr = [];
        $Vendor = User::where(['type' => 2, 'is_approve' => 'true', 'id' => $id])->first();


        $rating_avg = DB::table('ratings')
            ->select('vendor_id', DB::raw('AVG(rating) as avg_rating'))
            ->where('vendor_id', '=', $id)
            ->groupBy('vendor_id')
            ->first();

        $comments = Comment::where(['vendor_id' => $id])->get();

        if (!empty($Vendor)) {
            $vPhoto = Media::where(['vendor_id' => $id, 'type' => 'photo']);
            // return ($vPhoto->count());
            if ($vPhoto->count() == 0) {
                // return "photo";
                return view('notfound');
            }
            $photo_Gr[] = [
                "id" => $id,
                "avatar" => $Vendor->avatar_vendor,
                "name" => $Vendor->name,
                "profile" => $Vendor,
                "image" => $vPhoto->get(),
                "info" => [
                    "photo" => [
                        'basic' => Grapher::where(['vendor_id' => $id, 'type' => 'photo', 'plans' => 'Basic'])->get(),
                        'standard' => Grapher::where(['vendor_id' => $id, 'type' => 'photo', 'plans' => 'Standard'])->get(),
                        'premium' => Grapher::where(['vendor_id' => $id, 'type' => 'photo', 'plans' => 'Premium'])->get(),
                    ],
                ],
            ];
        }

        if (!empty($Vendor)) {
            $vVideo = Media::where(['vendor_id' => $id, 'type' => 'video']);
            if ($vVideo->count() == 0) {
                // return "vid";
                return view('notfound');
            }
            $video_Gr[] = [
                "id" => $id,
                "avatar" => $Vendor->avatar_vendor,
                "name" => $Vendor->name,
                "profile" => $Vendor,
                "video" => $vVideo->get(),
                "info" => [

                    "video" => [
                        'basic' => Grapher::where(['vendor_id' => $id, 'type' => 'video', 'plans' => 'Basic'])->get(),
                        'standard' => Grapher::where(['vendor_id' => $id, 'type' => 'video', 'plans' => 'Standard'])->get(),
                        'premium' => Grapher::where(['vendor_id' => $id, 'type' => 'video', 'plans' => 'Premium'])->get(),
                    ],
                ],
            ];
        }
        // return $video_Gr;
        // return $photo_Gr;
        $v_id = $id;

        return view('user.employee_details', compact('photo_Gr', 'video_Gr', 'rating_avg', 'v_id', 'comments', 'Vendor'));
    }

    public function EmpList(Request $request)
    {
        $vendor = User::where('type', 2)->get();
        return view('admin.employee', compact('vendor'));
    }

    public function Sample(Request $request)
    {
        // return $request->id;
        $vendor_id = $request->query('vendor_id');
        return view('sample.photo');
    }

    public function SampleVideo(Request $request)
    {
        // return $request->id;
        $vendor_id = $request->query('vendor_id');
        return view('sample.video');
    }

    public function Approve(Request $request)
    {
        // dd($request->query('vendor_id'));
        User::where(['type' => 2, 'id' => $request->query('vendor_id')])->update(['is_approve' => $request->query('isApprove')]);

        return redirect()->back();
    }

    public function Portfolio(Request $request)
    {
        $photo = [
            'basic' => Grapher::where(['vendor_id' => Auth::user()->id, 'type' => 'photo', 'plans' => 'Basic'])->get(),
            'standard' => Grapher::where(['vendor_id' => Auth::user()->id, 'type' => 'photo', 'plans' => 'Standard'])->get(),
            'premium' => Grapher::where(['vendor_id' => Auth::user()->id, 'type' => 'photo', 'plans' => 'Premium'])->get(),
        ];

        $video = [
            'basic' => Grapher::where(['vendor_id' => Auth::user()->id, 'type' => 'video', 'plans' => 'Basic'])->get(),
            'standard' => Grapher::where(['vendor_id' => Auth::user()->id, 'type' => 'video', 'plans' => 'Standard'])->get(),
            'premium' => Grapher::where(['vendor_id' => Auth::user()->id, 'type' => 'video', 'plans' => 'Premium'])->get(),
        ];
        if (empty($photo)) {
            $photo = [];
        }
        if (empty($video)) {
            $video = [];
        }
        $category = Category::where(['status' => 'active'])->get();
        // return response()->json(["photo" => $photo, "video" => $video]);

        return view('vendor.portfolio', compact('photo', 'video', 'category'));
    }

    public function PortfolioForPhoto(Request $request)
    {
        // return $request->price;

        if ($request->f_type === 'photo') {
            // check data exist or not
            $check = Grapher::where(['vendor_id' => Auth::user()->id, 'type' => $request->f_type, 'plans' => $request->p_type]);

            if ($check->count() > 0) {
                // return "update";
                $result = $check->update([
                    'plans' => $request->p_type,
                    'price' => $request->price,
                    'srt_desc' => $request->shortDesc,
                    'max_del_time' => $request->del_time,
                    'support_txt' => $request->support_info,
                ]);
                if ($result) {
                    return 1;
                } else {
                    return 0;
                }
                // Grapher::where(['vendor_id' => Auth::user()->id, 'type' => $request->f_type, 'plans' => $request->p_type, 'id' => $request->]);
            } else {
                if ($request->price) {
                    # code...
                    $new = new Grapher;
                    $new->vendor_id = Auth::user()->id;
                    $new->type = $request->f_type;
                    $new->plans = $request->p_type;
                    $new->price = $request->price;
                    $new->srt_desc = $request->shortDesc;
                    $new->max_del_time = $request->del_time;
                    $new->support_txt = $request->support_info;
                    $new->save();
                    return "New";
                }
                return "abort photo " . $request->p_type;
            }
        }

        // Grapher::where('')
    }

    public function PortfolioForVideo(Request $request)
    {
        // return $request;
        if ($request->f_type === 'video') {
            // check data exist or not
            $check = Grapher::where(['vendor_id' => Auth::user()->id, 'type' => $request->f_type, 'plans' => $request->p_type]);

            if ($check->count() > 0) {
                // return "update";
                $result = $check->update([
                    'type' => $request->f_type,
                    'plans' => $request->p_type,
                    'price' => $request->price,
                    'srt_desc' => $request->shortDesc,
                    'max_del_time' => $request->del_time,
                    'support_txt' => $request->support_info,
                ]);
                if ($result) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                if ($request->price) {
                    # code...
                    $new = new Grapher;
                    $new->vendor_id = Auth::user()->id;
                    $new->type = $request->f_type;
                    $new->plans = $request->p_type;
                    $new->price = $request->price;
                    $new->srt_desc = $request->shortDesc;
                    $new->max_del_time = $request->del_time;
                    $new->support_txt = $request->support_info;
                    $new->save();
                    return "New";
                }
                return "abort video " . $request->p_type;
            }
        }
    }

    public function Profile(Request $request)
    {

        return view('vendor.profile');
    }

    public function ProfileSave(Request $request)
    {
        return $request;
    }

    public function Image(Request $request)
    {
        // return $request;
        $request->validate(
            [
                'category' => 'required|string',
                'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'category.required' => 'Please select category first ',
                'images.*.required' => 'At least one image is required',
                'images.*.image' => 'The uploaded file must be an image',
                'images.*.mimes' => 'The image must be of type jpeg, png, jpg, gif',
                'images.*.max' => 'The image size must be less than 2MB',
            ]
        );

        // Store the images
        foreach ($request->images as $key => $image) {
            $uniqid = uniqid() . time();
            $name = $uniqid . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/media/image');
            $image->move($destinationPath, $name);

            // Save the file path to the database
            $image = new Media;
            $image->vendor_id = Auth::user()->id;
            $image->category_id = $request->category;
            $image->type = 'photo';
            $image->path = 'media/image/' . $name;
            $image->save();
        }
        return back()->with('success', 'Images Uploaded successfully.');
    }

    public function Video(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'videos.*' => 'required|mimes:mp4,mov,ogg,qt|max:902400',
        ], [
            'category.required' => 'The category field is required video.',
            'videos.*.required' => 'At least one video is required',
            'videos.*.mimes' => 'The video must be of type mp4, mov, ogg, or qt',
            'videos.*.max' => 'The video size must be less than 900MB',
        ]);

        // Store the images
        foreach ($request->videos as $key => $video) {
            $uniqid = uniqid() . time();
            $name = $uniqid . '.' . $video->getClientOriginalExtension();
            $destinationPath = public_path('/media/video');
            $video->move($destinationPath, $name);

            // Save the file path to the database
            $video = new Media;
            $video->vendor_id = Auth::user()->id;
            $video->category_id = $request->category;
            $video->type = 'video';
            $video->path = 'media/video/' . $name;
            $video->save();
        }
        return back()->with('success', 'Videos Uploaded successfully.');
    }

    public function Rating(Request $request)
    {
        $user_id = Auth::user()->id;
        // return $request;
        $chk = Rating::where(['user_id' => $user_id, 'vendor_id' => $request->vendor_id]);

        if ($chk->count() == 1) {
            $chk->update([
                'rating' => $request->rating,
                'vendor_id' => $request->vendor_id,
                'user_id' => $user_id,
            ]);
        } else {

            $rating = new Rating;
            $rating->rating = $request->rating;
            $rating->vendor_id = $request->vendor_id;
            $rating->user_id = $user_id;
            $rating->save();
        }
    }

    public function Comment(Request $request)
    {
        // return $request;

        $cmt = new Comment;
        $cmt->comment = $request->comment;
        $cmt->username = $request->username;
        $cmt->user_id = $request->user_id;
        $cmt->post_on = $request->post_on;
        $cmt->vendor_id = $request->vendor_id;
        $cmt->save();
    }
}
