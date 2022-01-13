<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleStoreRequest;
use App\Http\Requests\Admin\RoleUpdateRequest;
use App\Http\Resources\Admin\RoleCollection;
use App\Http\Resources\Admin\RoleResource;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    /**
     * @return RoleCollection
     */
    public function index(): RoleCollection
    {
        return new RoleCollection(Role::all());
    }

    /**
     * @param RoleStoreRequest $request
     * @return RoleResource
     */
    public function store(RoleStoreRequest $request): RoleResource
    {
        return new RoleResource(Role::create($request->validated()));
    }

    /**
     * @param Role $role
     * @return RoleResource
     */
    public function show(Role $role): RoleResource
    {
        return new RoleResource($role);
    }

    /**
     * @param RoleUpdateRequest $request
     * @param Role $role
     * @return RoleResource
     */
    public function update(RoleUpdateRequest $request, Role $role): RoleResource
    {
        $role->update($request->validated());
        return new RoleResource($role);
    }

    /**
     * @param Role $role
     * @return void
     */
    public function destroy(Role $role)
    {
        $role->delete();
    }

    public function test(){
        return [

        ];
    }

}
