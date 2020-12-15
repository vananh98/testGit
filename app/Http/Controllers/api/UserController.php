<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\testApiController as testApiController;
use App\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator as ValidationValidator;

class UserController extends testApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $resoult = User::select('id', 'fullname')->get();
        if (empty($resoult)) {
            $error = "Chưa có User";
            return $this->sendError($error);
        }
        return $this->sendResponse($resoult->toArray(), "sucess");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mess = "chưa tạo view";
        return  $this->sendError($mess, "dùng x-wwww-form-unlencorded ở POSTMAN");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required | email | unique:users|email',
            'pass' => 'required',
        ]);
        if ($validate->fails()) {
            return $this->sendError("can't create uesr", $validate->errors());
        }
        $user = User::create([
            'fullname' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->pass),
            'status' => 1, // int
            'employee_id' => 1, // int
            'created_by' => 1,  // int
            'updated_by' => 1 // int
        ]);
        return $this->sendResponse($user, "success create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        if (empty($user)) {
            return $this->sendError("Not Found User");
        }
        return $this->sendResponse($user, 'sucess');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        if (!empty($user)) {
            $mess = "get user success";
            return $this->sendResponse($user, $mess);
        }
        $error = "not found User";
        return $this->sendError($error);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //s
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required'
            ]
        );
        if ($validate->fails()) {
            return $this->sendError('Validation Error', $validate->errors());
        }
        $user = User::updateOrInsert(
            ['id' => $id],
            ['fullname' => $request->name]
        );
        $user = User::find($id);
        return $this->sendResponse($user->toArray(), "sucesss");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        dd($user);
        $user->delete();

        return $this->sendResponse($user->toArray(), "success delete");
    }
}
