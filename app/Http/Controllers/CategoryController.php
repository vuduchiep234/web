<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Validator;
use DB;

class CategoryController extends Controller
{
    //
	public function getCategory(){

		$data['list'] = Category::paginate(10);
		return view('admin.listTypeProduct', $data);
	}

    public function search(Request $request){

        $data_search = $request->get('data_search');
        $data = DB::table('categories')->where('id', 'like', '%'.$data_search.'%')->orWhere('type', 'like', '%'.$data_search.'%')->paginate(10);
        return view('admin.listTypeProduct', ['list' => $data]);
    }

    public function post(Request $request){

        // $validator = Validator::make($request->all(), [

        //     'type' => 'required',
        // ]);

        // $error = array();
        // $success_output = '';

        // if($validator->fails()){

        //     foreach ($validator->messages()->getMessages() as $field_name  => $messages) {
        //         $error[] = $messages;
        //     }
        // }
        // else{
        //     if($request->get('button-action') == "insert"){
        //         $category = new Category([
        //             'type' => $request->get('type-cate')
        //         ]);
        //         $category->save();
        //         $success_output = '<div class="alert alert-success">Success</div>';
        //     }
        // }
        // $output = array(
        //     'error' => $error,
        //     'success' => $success_output
        // );
        // echo json_encode($output);

    	

    	return back();
    }

    public function editCategory(Request $request){

        $category = Category::find($request->get('cate-id'));
        $category->type = $request->get('cate-type');
        $category->save();
        return back();
        
    }

    public function deleteCategory(Request $request){
        $category = Category::find($request->input('id'));
        if($category->delete()){
            echo "Delete Success";
        }
    }
}
