<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UsersReferral;


class ReferralController extends Controller
{
    public function index()
    {
        // Создаём реферальную ссылку
        $userReferralTable = UsersReferral::where('user_id', Auth::user()->id)->first();
        $userReferralLink = Request::root() . '/register/?referral=' . $userReferralTable->code;

        $user = Auth::user();

        // Выводим всех рефералов
        $referrals = $user->referrals;

        // Выводим кол-во заходов на ссылку
        $referralsCount = $user->referralLink->count_visit;

        return view('referral/index', compact('userReferralLink', 'referrals', 'referralsCount'));
    }
}
