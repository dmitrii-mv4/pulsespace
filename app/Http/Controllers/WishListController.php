<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Models\Role;
use App\Models\WishList;
use App\Models\Wish;
use App\Models\LevelTasksBindUsers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Wishlist\WishListCreateRequest;
use App\Http\Requests\Wishlist\WishListUpdateRequest;


class WishListController extends Controller
{
    public function index(User $user)
    {
        return 'index';
    }

    public function create(User $user, WishListCreateRequest $request)
    {
        //dd($request->all());

        $dataValidated = $request->validated();

        // генерируем url адрес
        $url_list = date("YmdHis");

        $list = WishList::create([
            'title' => $dataValidated['title'],
            'user_id' => $user->id,
            'url' => $url_list,
            'description' => $dataValidated['description'],
        ]);

         return redirect()->route('user.wishlist.index', $user->id);
    }

    public function update(User $user, WishList $list, WishListUpdateRequest $request)
    {
        dd($list);
    }

    public function delete()
    {
        //
    }
}
