<?php

namespace App\Http\Controllers\Auth;

use App\Entities\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Repositories\DepartmentRepository;
use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    private $roleRepository;
    private $departmentRepository;

    /**
     * Create a new controller instance.
     * @param  RoleRepository $roleRepository, DepartmentRepository $departmentRepository
     * @param  DepartmentRepository $departmentRepository
     * @return void
     */
    public function __construct(RoleRepository $roleRepository, DepartmentRepository $departmentRepository)
    {
        $this->middleware('guest');
        $this->roleRepository = $roleRepository;
        $this->departmentRepository = $departmentRepository;
    }

    public function get()
    {
        $roles = $this->roleRepository->all();
        $departments = $this->departmentRepository->all();
        return response()->json([
            'roles' => $roles,
            'departments' => $departments,
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  Request  $request
     * @return \App\Entities\User
     */

    protected function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'role_id' => 'required',
            'department_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $success = [
            'user' => $user,
            'token' => bin2hex(openssl_random_pseudo_bytes(64)),
        ];

        return response()->json($success);
    }

}
