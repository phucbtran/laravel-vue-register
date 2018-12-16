<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;

class UserController extends Controller
{
	public function __construct(UserRepository $repository)
	{
		$this->repository = $repository;
	}

    public function index()
    {
    	$users = $this->repository->all();

    	return view('company.user.index', compact('users'));
    }
}
