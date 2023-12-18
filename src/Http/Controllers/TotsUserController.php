<?php

namespace Tots\User\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Tots\Auth\Models\TotsUser;
use Tots\Auth\Repositories\TotsUserRepository;
use Tots\Core\Http\Resources\SuccessResource;
use Tots\User\Http\Requests\TotsUserRequest;
use Tots\User\Http\Resources\TotsUserResource;

class TotsUserController extends \Illuminate\Routing\Controller
{
    use ValidatesRequests;

    protected $userRepository;

    public function __construct(TotsUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function list(Request $request)
    {
        // Create query
        $elofilter = \Tots\EloFilter\Query::run(TotsUser::class, $request);
        // Execute query
        return $elofilter->execute();
    }

    public function show($id)
    {
        $item = TotsUser::findOrFail($id);
        return response()->json(TotsUserResource::make($item));
    }

    public function update($id, TotsUserRequest $request)
    {
        $this->userRepository->updateByData($id, $request->validated());
        return response()->json(SuccessResource::make('User updated'));
    }

    public function delete($id)
    {
        $this->userRepository->removeById($id);
        return response()->json(SuccessResource::make('User deleted'));
    }
}
