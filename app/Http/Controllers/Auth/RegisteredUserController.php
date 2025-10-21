<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {


// 新規登録のバリテーション
$request->validate([
    'username' => 'required|min:2|max:12',
    'email' => 'required|min:5|max:40|email|unique:users',
    'password' => 'required|min:8|max:20|alpha_num|confirmed',
]);
// unique:users → usersテーブル内での重複禁止
// alpha_num → 英数字のみ
// confirmed → パスワードが一致しているか


// パスワードをハッシュ化して安全に保存
$user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


// 登録後、「added」ページへリダイレクトして、ユーザー名をセッションで渡す
        session(['registered_name' => $user->username]);
        return redirect('added');
    }


// セッションの名前を受け取ってビューに渡す
    public function added(): View
    {
        $name = session('registered_name');
        return view('auth.added', compact('name'));
    }
}
