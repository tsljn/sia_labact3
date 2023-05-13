<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
Class UserController extends Controller {
private $request;
public function __construct(Request $request){
$this->request = $request;
}
    public function getAllUsers(){
        $users = User::all();
        return response()->json($users, 200);
    }
    public function showUsersID($id)
    {
        //
        return User::where('id','like','%'.$id.'%')->get();
    }
    public function addUsers(Request $request ){
        $rules = [
       'id' => 'max:20',
       'firstName' => 'required|max:20',
       'lastName' => 'required|max:20',
        ];
        $this->validate($request,$rules);
        $user = User::create($request->all());
        return $user;
        
}
    public function updateUser(Request $request,$id)
    {
    $rules = [
    'id' => 'max:20',
    'firstName' => 'required|max:20',
    'lastName' => 'required|max:20',
    ];
    $this->validate($request, $rules);
    $user = User::findOrFail($id);
    $user->fill($request->all());

    // if no changes happen
    if ($user->isClean()) {
    return $this->errorResponse('At least one value must
    change', Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    $user->save();
    return $user;
}
    public function deleteUser($id)
    {
    $user = User::findOrFail($id);
    $user->delete();

 
    // old code
    /*
    $user = User::where('userid', $id)->first();
    if($user){
    $user->delete();
    return $this->successResponse($user);
    }
    {
    return $this->errorResponse('User ID Does Not Exists',
    Response::HTTP_NOT_FOUND);
    }
    */
    }
}
