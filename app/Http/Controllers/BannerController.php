<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    //show
    public function show()
    {
        $banner = Banner::where('status', 'active')->get();
        return view('admin.banner.show', [
            'banner' => $banner
        ]);
    }

    // add
    public function add()
    {
        return view('admin.banner.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.jpg'; // Save as jpg for compression

            $path = public_path('uploads/banners/');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            // Get image resource
            $imgResource = null;
            $mime = $image->getMimeType();
            if ($mime == 'image/jpeg' || $mime == 'image/jpg') {
                $imgResource = imagecreatefromjpeg($image->getRealPath());
            } elseif ($mime == 'image/png') {
                $imgResource = imagecreatefrompng($image->getRealPath());
            } elseif ($mime == 'image/gif') {
                $imgResource = imagecreatefromgif($image->getRealPath());
            }

            if ($imgResource) {
                // Optionally resize here using imagescale() or imagecopyresampled()
                // Compress and save (quality: 70)
                imagejpeg($imgResource, $path . $filename, 70);
                imagedestroy($imgResource);

                Banner::create([
                    'title' => $request->title,
                    'link' => $request->link,
                    'image' => 'uploads/banners/' . $filename,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Banner added successfully!');
    }
}
