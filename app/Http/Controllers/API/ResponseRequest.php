<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:19 PM
 */

namespace App\Http\Controllers\API;


trait ResponseRequest
{
    public function notFound()
    {
        return response()->json(['Error' => 'Not Found'], 404);
    }

    public function createResponse($success, $fails)
    {
        if($success == null){
            return response()->json(['Error' => ['False' => $fails]], 400);
        }
        elseif($fails == null){
            return response()->json(['Success' => $success], 201);
        }
        else{
            return response()->json(['Success' => $success, 'Error' => ['False' => $fails]],202);
        }
    }

    public function getResponse($model, $total)
    {
        if($model === null){
            return $this->notFound();
        }
        $body = ['data' => $model];

        if($total != null){
            $body['total'] = $total;
        }
        return response()->json($body);
    }

    public function deleteResponse()
    {
        return response()->json(['Message' => 'Delete Done']);
    }

    public function updateResponse($success, $fails)
    {
        if($success == null){
            return response()->json(['Error' => ['False' => $fails]], 400);
        }
        elseif($fails == null){
            return response()->json(['Success' => $success], 201);
        }
        else{
            return response()->json(['Success' => $success, 'Error' => ['False' => $fails]],202);
        }
    }
}