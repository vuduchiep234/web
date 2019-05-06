<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use DB;

class RoleController extends Controller
{
    //
    public function post(Request $request){

		
		return back();
	}

    public function getListRole(){

		$data['list'] = Role::paginate(10);
		return view('admin.listRole', $data);
        // return view('admin.listRole');
	}

    public function searchRole(Request $request){

        $data_search = $request->get('data_search');
        $data = DB::table('roles')->where('id', 'like', '%'.$data_search.'%')->orWhere('type', 'like', '%'.$data_search.'%')->paginate(10);
        return view('admin.listRole', ['list' => $data]);
    }

    // public function _se_searchRolearchRole(Request $request){
        
    //     if($request->ajax()){
    //         $data = $request->get('query');
    //         if($data != ''){
    //             $role = DB::table('roles')->where('id', 'like', '%'.$data.'%')->orWhere('type', 'like', '%'.$data.'%')->get();
    //         }
    //         else{
    //             $role = DB::table('roles')->get();
    //         }
    //         $row_total = $role->count();
    //         if($row_total > 0){
    //             foreach ($role as $row) {
    //                 $output .= '
    //                 <tr>
    //                     <td>'.$row->id.'</td>
    //                     <td>'.$row->type.'</td>
    //                 </tr>
    //                 ';
    //             }
    //         }
    //         else{
    //             $output = '
    //             <tr>
    //                 <td align="center" colspan="2">
    //                     Khong co du lieu
    //                 </td>
    //             </tr>
    //             ';
    //         }
    //         $role_data = array(
    //             'table_data' => $output,
    //             'total_data' => $row_total
    //         );
    //         echo json_encode($role_data);
    //     }
    // }

	public function editRole(Request $request){

        $role = Role::find($request->get('role-id'));
        $role->type = $request->get('role-type');
        
        $role->save();
        return back();
        
    }

    public function deleteRole(Request $request){
        $role = Role::find($request->input('id'));
        if($role->delete()){
            echo "Delete Success";
        }
    }

    // public function searchRole(){

    //     $data['list'] = Role::all();
    //     return view('admin.listRole', $data);
    // }
}
