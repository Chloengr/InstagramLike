<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            'image'=>'',
        ]);

        if(request('image')){
            $imagePath = (request('image')->store('profile', 'public'));

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
            $imageArr = ['image' => $imagePath];
        }
        auth()->user()->profile->update(
            array_merge(
                $data,
                $imageArr ?? [],
            )
        );

        return redirect("/profile/{$user->id}");
    }
}
