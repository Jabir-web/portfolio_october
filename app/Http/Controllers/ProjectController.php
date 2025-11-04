<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // Delete 
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Optional: delete project image if saved locally
        if ($project->image && file_exists(public_path('uploads/' . $project->image))) {
            unlink(public_path('uploads/' . $project->image));
        }

        $project->delete();

        return redirect()->back()->with('success', 'Project deleted successfully.');
    }

    //    show 
    public function show()
    {
        $project = Project::where('status', 'active')->get();
        return view('admin.project.show', [
            'projects' => $project

        ]);
    }

    // view
    public function view()
    {
        return view('admin.project.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'version' => 'nullable|string|max:100',
            'size' => 'nullable|string|max:100',
            'video_link' => 'nullable|string|max:255',
            'amount' => 'nullable|string|max:100',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        // handle image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.jpg';
            $path = public_path('uploads/projects/');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            try {
                $mime = $file->getMimeType();
                $src = null;

                if ($mime === 'image/jpeg' || $mime === 'image/jpg') {
                    $src = imagecreatefromjpeg($file->getRealPath());
                } elseif ($mime === 'image/png') {
                    $src = imagecreatefrompng($file->getRealPath());
                } elseif ($mime === 'image/gif') {
                    $src = imagecreatefromgif($file->getRealPath());
                }

                if (! $src) {
                    // if GD can't create resource, fallback to move
                    $file->move($path, $filename);
                    $validated['image'] = 'uploads/projects/' . $filename;
                } else {
                    $origW = imagesx($src);
                    $origH = imagesy($src);

                    // target max width
                    $maxW = 1400;
                    if ($origW > $maxW) {
                        $ratio = $maxW / $origW;
                        $newW = (int) round($origW * $ratio);
                        $newH = (int) round($origH * $ratio);
                    } else {
                        $newW = $origW;
                        $newH = $origH;
                    }

                    $dst = imagecreatetruecolor($newW, $newH);

                    // handle PNG transparency by filling white background (since saving as JPG)
                    $white = imagecolorallocate($dst, 255, 255, 255);
                    imagefill($dst, 0, 0, $white);

                    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newW, $newH, $origW, $origH);

                    // save as JPEG with quality 75
                    imagejpeg($dst, $path . $filename, 75);

                    imagedestroy($src);
                    imagedestroy($dst);

                    $validated['image'] = 'uploads/projects/' . $filename;
                }
            } catch (\Throwable $e) {
                // final fallback
                $file->move($path, $filename);
                $validated['image'] = 'uploads/projects/' . $filename;
            }
        }

        Project::create($validated);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['message' => 'Project saved successfully.'], 200);
        }

        return redirect()->back()->with('success', 'Project saved successfully.');
    }

    public function viewAndRedirect(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->increment('views');
        return view('code-project-detail', compact('project'));
    }

    // update
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'version' => 'nullable|string|max:100',
            'size' => 'nullable|string|max:100',
            'video_link' => 'nullable|string|max:255',
            'amount' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'status' => 'nullable|string|max:50',
            'views' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        // handle image replacement if provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.jpg';
            $path = public_path('uploads/projects/');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            try {
                $mime = $file->getMimeType();
                $src = null;

                if ($mime === 'image/jpeg' || $mime === 'image/jpg') {
                    $src = imagecreatefromjpeg($file->getRealPath());
                } elseif ($mime === 'image/png') {
                    $src = imagecreatefrompng($file->getRealPath());
                } elseif ($mime === 'image/gif') {
                    $src = imagecreatefromgif($file->getRealPath());
                }

                if (! $src) {
                    // if GD can't create resource, fallback to move
                    $file->move($path, $filename);
                    $validated['image'] = 'uploads/projects/' . $filename;
                } else {
                    $origW = imagesx($src);
                    $origH = imagesy($src);

                    // target max width
                    $maxW = 1400;
                    if ($origW > $maxW) {
                        $ratio = $maxW / $origW;
                        $newW = (int) round($origW * $ratio);
                        $newH = (int) round($origH * $ratio);
                    } else {
                        $newW = $origW;
                        $newH = $origH;
                    }

                    $dst = imagecreatetruecolor($newW, $newH);

                    // handle PNG transparency by filling white background (since saving as JPG)
                    $white = imagecolorallocate($dst, 255, 255, 255);
                    imagefill($dst, 0, 0, $white);

                    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newW, $newH, $origW, $origH);

                    // save as JPEG with quality 75
                    imagejpeg($dst, $path . $filename, 75);

                    imagedestroy($src);
                    imagedestroy($dst);

                    $validated['image'] = 'uploads/projects/' . $filename;
                }
            } catch (\Throwable $e) {
                // final fallback
                $file->move($path, $filename);
                $validated['image'] = 'uploads/projects/' . $filename;
            }

            // delete old image if exists
            if ($project->image && file_exists(public_path($project->image))) {
                @unlink(public_path($project->image));
            }
        }

        $project->update($validated);

        return redirect()->back()->with('success', 'Project updated successfully.');
    }



    public function like($id)
    {
        $user = Auth::user();
        $project = Project::findOrFail($id);

        // Check if user already liked
        $existingLike = Like::where('user_id', $user->id)
            ->where('project_id', $project->id)
            ->first();

        if ($existingLike) {
            // Unlike
            $existingLike->delete();
            $liked = false;
        } else {
            // Like
            Like::create([
                'user_id' => $user->id,
                'project_id' => $project->id,
            ]);
            $liked = true;
        }

        $likeCount = Like::where('project_id', $project->id)->count();

        return response()->json([
            'liked' => $liked,
            'likes' => $likeCount,
        ]);
    }
}
