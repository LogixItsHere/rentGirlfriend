<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\Girlfriend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class GirlfriendController extends Controller
{
    public function index()
    {
        $girlfriends = Girlfriend::all();
        return view('admin.girlfriend.index')->with('girlfriends', $girlfriends);
    }

    public function create()
    {
        return view('admin.girlfriend.create');
    }

    public function store(Request $request)
    {
        if($request->hasFile("gf_profile")){
            $file=$request->file("gf_profile");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("profile/"),$imageName);
        }
        $girlfriend = new Girlfriend([
            "gf_name" =>$request->gf_name,
            "gf_location" =>$request->gf_location,
            "gf_aboutme" =>$request->gf_aboutme,
            "gf_rulecan" =>$request->gf_rulecan,
            "gf_rulecant" =>$request->gf_rulecant,
            "gf_price1" =>$request->gf_price1,
            "gf_price2" =>$request->gf_price2,
            "gf_description" =>$request->gf_description,
            "gf_profile" =>$imageName,
            "status" =>$request->status == true ? '1' : '0',
        ]);

        $girlfriend->save();

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $request["girlfriend_id"]=$girlfriend->id;
                $request["image"]=$imageName;
                $file->move(\public_path("images"),$imageName);
                Image::create($request->all());

            }
        }

        return redirect("admin/girlfriend");
    }

    public function edit($id)
    {
        $girlfriends = Girlfriend::findOrFail($id);
        return view('admin.girlfriend.edit')->with('girlfriends', $girlfriends);
    }

    public function destroy($id)
    {
        $girlfriends = Girlfriend::findOrFail($id);

        if(File::exists("profile/".$girlfriends->gf_profile))
        {
            File::delete("profile/".$girlfriends->gf_profile);
        }
        $images=Image::where("girlfriend_id",$girlfriends->id)->get();
        foreach($images as $image){
            if(File::exists("image/".$image->image)){
                File::delete("image/".$image->image);
            }
        }
        
        $girlfriends->delete();
        return redirect("admin/girlfriend");
    }

    public function update(Request $request,$id)
    {
        $girlfriend = Girlfriend::findOrFail($id);
        if($request->hasFile("gf_profile")){
            if (File::exists("profile/" . $girlfriend->gf_profile)) {
                File::delete("profile/" . $girlfriend->gf_profile);
            }
            $file=$request->file("gf_profile");
            $girlfriend->gf_profile=time()."_".$file->getClientOriginalName();
            $file->move(\public_path("/profile"),$girlfriend->gf_profile);
            $request['gf_profile']=$girlfriend->gf_profile;
        }
        $girlfriend->update([
            "gf_name" =>$request->gf_name,
            "gf_location" =>$request->gf_location,
            "gf_aboutme" =>$request->gf_aboutme,
            "gf_rulecan" =>$request->gf_rulecan,
            "gf_rulecant" =>$request->gf_rulecant,
            "gf_price1" =>$request->gf_price1,
            "gf_price2" =>$request->gf_price2,
            "gf_description" =>$request->gf_description,
            "gf_profile" =>$girlfriend->gf_profile,
            "status" =>$request->status == true ? '1' : '0',
        ]);

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $request["girlfriend_id"]=$girlfriend->id;
                $request["image"]=$imageName;
                $file->move(\public_path("images"),$imageName);
                Image::create($request->all());

            }
        }

        return redirect("admin/girlfriend");
    }

    public function deleteimage($id){
        $images=Image::findOrFail($id);
        if (File::exists("images/".$images->image)) {
           File::delete("images/".$images->image);
       }

       Image::find($id)->delete();
       return back();
   }
}
