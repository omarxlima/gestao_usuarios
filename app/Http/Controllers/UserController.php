<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller


{
    protected $model;

    public function __construct(User $user) //$user = new User;
    {
        $this->model = $user;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd('UserController@index');

        // $users = User::where('name', 'LIKE', '%{$request->search}%')->get();

        $users = $this->model
                        ->getUsers(
                            search: $request->search ?? ''
                        );

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUserFormRequest $request)
    {
        // dd($request->only([
        //     'name', 'email','password'
        // ]));

        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();



        $data = $request->all();
        $data['password'] = bcrypt($request->password);
       $this->model->create($data);

       return redirect()->route('users.index');
    //    return redirect()->route('users.show', $user->id);  // $user =  $this->model->create($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $user = $this->model->where('id', $id)->first();

        if (!$user = $this->model->find($id)) {
            return redirect()->route('users.index');
        }


        return view('users.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');


        return view ('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

            $data = $request->only('name', 'email');
            if($request->password)
                $data['password'] = bcrypt($request->password);

            $user->update($data);

            return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$user = $this->model->find($id)) {
            return redirect()->route('users.index');
        }

        $user->delete();
        return redirect()->route('users.index');

    }
}
