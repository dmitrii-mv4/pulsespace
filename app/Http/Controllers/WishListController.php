<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Models\Role;
use App\Models\WishList;
use App\Models\Wish;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Wishlist\WishListCreateRequest;
use App\Http\Requests\Wishlist\WishListUpdateRequest;


class WishListController extends Controller
{
    public function index(User $user, WishList $list)
    {
        // Получаем списки с подсчетом связанных желаний текущего пользователя
        $lists = WishList::where('user_id', $user->id)
            ->withCount('wishes')
            ->get();

        // Желания текущего списка + проверка принадлежности пользователю
        $wishes = $list->wishes()
            ->where('user_id', $user->id)
            ->whereNull('wisheslist_wish_join_lists.deleted_at')
            ->get();

        // выводим кол-во всех желаний
        $wishes_count = Wish::where('user_id', $user['id'])->count();

        return view('wishlist/list', compact('user', 'lists', 'list', 'wishes', 'wishes_count'));
    }

    public function create(User $user, WishListCreateRequest $request)
    {
        //dd($request->all());

        $dataValidated = $request->validated();

        $list = WishList::create([
            'title' => $dataValidated['title'],
            'user_id' => $user->id,
            'description' => $dataValidated['description'],
        ]);

        return redirect()->route('wishlist.index', [$user->id, $list->id])->with('success', 'Лист желаний успешно создан!');
    }

    public function update(User $user, WishList $list, WishListUpdateRequest $request)
    {
        $validated = $request->validated();

        WishList::where('id', '=', $list['id'])
            ->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'updated_at' => date("Y-m-d H:i:s"),
            ]);

        return redirect()->route('wishlist.list', [$user->id, $list->id])->with('success', 'Список изменён');
    }

    public function destroy(User $user, WishList $list)
    {
        $list->delete();
        
        return redirect()->route('wishlist.index', $user->id)->with('success', 'Список удалён!');
    }
}
