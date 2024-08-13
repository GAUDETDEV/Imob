<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyVideoModifyRequest;
use App\Http\Requests\PropertyVideoRequest;
use App\Models\Property;
use App\Models\PropertyVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyVideoController extends Controller
{
    //

    public function store(PropertyVideoRequest $request, Property $property)
    {

        $path = $request->file('video')->store('videos', 'public');

        $video = new PropertyVideo();

        $video->propriete_id = $property->id;
        $video->titre_video = $request->titre_video;
        $video->description_video = $request->description_video;
        $video->file_path_video = $path;

        $video->save();

        return redirect()->route('admin.properties.show',['property' => $property->id])->with('success', 'Vidéo ajouté avec succès!');

    }


    public function edit(PropertyVideo $video){

        return view('admin.videos_properties.edit',[

            'video' => $video,

        ]);


    }


    public function playlisteVideoProperty(Property $property){

        $video_playlistes = DB::table('property_videos')->where('propriete_id','=',$property->id)->paginate(20);

        return view('admin.videos_properties.playliste',[

            "property" => $property,
            "video_playlistes" => $video_playlistes,

        ]);

    }

    public function addVideoPlayliste(PropertyVideoRequest $request, Property $property){

        $path = $request->file('video')->store('videos', 'public');

        $video = new PropertyVideo();

        $video->propriete_id = $property->id;
        $video->titre_video = $request->titre_video;
        $video->description_video = $request->description_video;
        $video->file_path_video = $path;

        $video->save();

        return redirect()->route('admin.properties.playliste.video',['property' => $property->id])->with('success', 'Vidéo ajouté à la playliste avec succès!');


    }


    public function update(Request $request, PropertyVideo $video){

        if($request->hasFile("video")){

            $path = $request->file('video')->store('videos', 'public');

            $video->titre_video = $request->titre_video;
            $video->description_video = $request->description_video;
            $video->file_path_video = $path;

            $video->save();

            return redirect()->route('admin.properties.video.edit',['video' => $video->id])->with('success', 'Video modifié avec succès!');

        }else{

            $video->titre_video = $request->titre_video;
            $video->description_video = $request->description_video;

            $video->save();

            return redirect()->route('admin.properties.video.edit',['video' => $video->id])->with('success', 'Video modifié avec succès!');

        }

    }


    public function destroy(PropertyVideo $video){

        $video->delete();

        return redirect()->route('admin.properties.playliste.video',['property' => $video->propriete_id])->with('success', 'Suppression réussit!');

    }



}
