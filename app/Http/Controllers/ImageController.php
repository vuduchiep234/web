<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Http\Controllers\Controller;
use DB;

class ImageController extends Controller
{
    //
    public function getListImage(){

		$data['list'] = Image::paginate(10);
		
		return view('admin.listImage', $data);
	}

    public function search(Request $request){

        $data_search = $request->get('data_search');
        $data = DB::table('images')->where('id', 'like', '%'.$data_search.'%')->orWhere('name', 'like', '%'.$data_search.'%')->orWhere('content', 'like', '%'.$data_search.'%')->paginate(10);
        return view('admin.listImage', ['list' => $data]);
    }

	public function uploadSubmit(Request $request){

        $this->validate($request, ['name-image' => 'required',
    	'photos' =>'required|image|mimes:jpg,png,jpeg.gif|max:2048']);
    	$image = $request->file('photos');
    	$name = $request->input('name-image');
    	$filename = rand().'.'.$image->getClientOriginalExtension();
    	$image->move(public_path("photos"), $filename);

    	$url_image = "photos/".$filename;

    	$listImage = new Image([
    		'name'=>$name,
    		'content'=>$url_image
    	]);
    	$listImage->save();
    	return back();
	}

    public function editImage(Request $request){

        $edit_image = Image::find($request->get('image-id'));
        $this->validate($request, ['name-image' => 'required',
        'photos' =>'required|image|mimes:jpg,png,jpeg.gif|max:2048']);
        $image = $request->file('photos');
        $edit_image->name = $request->input('name-image');
        $filename = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path("photos"), $filename);

        $url_image = "photos/".$filename;
        $edit_image->content = $url_image;

        // $listImage = new Image([
        //     'name'=>$name,
        //     'content'=>$url_image
        // ]);
        $edit_image->save();
        return back();
    }

    public function deleteImage(Request $request){

        $image = Image::find($request->input('id'));
        if($image->delete()){
            echo "Delete Success";
        }
    }

}
