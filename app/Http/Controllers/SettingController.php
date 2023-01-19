<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    //
    public function show()
    {
        $setting = Setting::first();
        return view('setting.index', ['setting' => $setting]);
    }
    public function update(Request $request, Setting $setting)
    {
        $setting = Setting::first();
        $setting->update($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'image:png,jpg,jpeg',
            'cv' => 'required',
            'about' => 'required',
            'homepage_image' => 'image:png,jpg,jpeg,webp'
        ]);

        if ($validator->passes()) {

            $setting->fill($request->post())->save();

            // Upload image here
            if ($request->image) {
                $oldImage = $setting->image;
                // File::delete(public_path() . '/uploads' . $oldImage);
                if ($oldImage) {
                    Storage::delete($oldImage);
                }
                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time() . 'img.' . $ext;
                // $request->image->move(public_path() . '/uploads', $newFileName); // This will save file in a folder
                $request->file('image')->storeAs('uploads', $newFileName);
                $setting->image = $newFileName;
                $setting->save();
                // if ($oldImage) {
                //     Storage::delete($oldImage);
                // }
            }
            if ($request->cv) {
                $oldCv = $setting->cv;
                // File::delete(public_path() . '/uploads' . $oldCv);
                if ($oldCv) {
                    Storage::delete($oldCv);
                }
                $ext = $request->cv->getClientOriginalExtension();
                $newFileName = time() . 'cv.' . $ext;
                // $request->cv->move(public_path() . '/uploads', $newFileName); // This will save file in a folder
                $request->file('cv')->storeAs('uploads', $newFileName);

                $setting->cv = $newFileName;
                $setting->save();
            }
            if ($request->homepage_image) {
                $old = $setting->homepage_image;
                if ($old) {
                    // Storage::delete($old);
                }
                // File::delete(public_path() . '/uploads' . $old);

                $ext = $request->homepage_image->getClientOriginalExtension();
                $newFileName = time() . 'bg.' . $ext;
                // $request->homepage_image->move(public_path() . '/uploads', $newFileName); // This will save file in a folder
                $request->file('homepage_image')->storeAs('uploads', $newFileName);

                $setting->homepage_image = $newFileName;
                $setting->save();
            }

            return redirect()->route('setting.index')->with('success', ' Setting Updated successfully.');
        } else {
            // return with errrors
            return redirect()->route('setting.index')->withErrors($validator)->withInput();
        }
    }
}
