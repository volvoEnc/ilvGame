<?php

namespace App\Http\Controllers;

use App\Http\Requests\Privileges\CreatePrivilegesRequest;
use App\Http\Resources\Privileges\PrivilegeResource;
use App\Privilege;
use Illuminate\Http\Request;

class PrivilegeController extends Controller
{
    public function create(CreatePrivilegesRequest $request)
    {
        return new PrivilegeResource(Privilege::create($request->all()));
    }

    public function index(Request $request)
    {
        return PrivilegeResource::collection(Privilege::query()
            ->groupBy('action', 'name', 'description')
            ->select(['name', 'description', 'action'])
            ->get());
    }
}
