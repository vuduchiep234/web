<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Image;
use DB;

class MemberController extends Controller
{
    //
    public function getListMember(){

		$data['list'] = User::paginate(10);
        $role['listRole'] = Role::all();
        $image['a'] = Image::all();
		return view('admin.listMember', $data, $role, $image);
	}

    public function search(Request $request){

        $data_search = $request->get('data_search');
        $data = DB::table('users')->where('id', 'like', '%'.$data_search.'%')->orWhere('email', 'like', '%'.$data_search.'%')->orWhere('first_name', 'like', '%'.$data_search.'%')->orWhere('last_name', 'like', '%'.$data_search.'%')->orWhere('password', 'like', '%'.$data_search.'%')->orWhere('phone', 'like', '%'.$data_search.'%')->orWhere('role_id', 'like', '%'.$data_search.'%')->orWhere('image_id', 'like', '%'.$data_search.'%')->paginate(10);
        return view('admin.listMember', ['list' => $data]);
    }

    public function post(Request $request){

        
    	return back();
    }

    public function editMember(Request $request){

        $member = User::find($request->get('member-id'));
        
        $member->email = $request->get('member-email');
        $member->password = $request->get('member-password');
        $member->first_name = $request->get('first-name');
        $member->last_name = $request->get('last-name');
        $member->phone = $request->get('member-phone');
        $member->role_id = $request->get('member-role_id');
        $member->image_id = $request->get('member-image_id');

        $member->save();
        return back();
        
    }

    public function deleteMember(Request $request){
        $member = User::find($request->input('id'));
        if($member->delete()){
            echo "Delete Success";
        }
    }
}
