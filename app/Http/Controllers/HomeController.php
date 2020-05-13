<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * パスワード変更
     *
     */
    public function showChangePasswordForm() {
        return view('auth.changepassword');
    }

    public function changePassword(Request $request) {
        //現在のパスワードが正しいかを調べる
        if(!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with('change_password_error', '現在のパスワードが間違っています。');
        }

        //現在のパスワードと新しいパスワードが違っているかを調べる
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with('change_password_error', '新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
        }

        //パスワードのバリデーション。新しいパスワードは6文字以上、new-password_confirmationフィールドの値と一致しているかどうか。
        $validated_data = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //パスワードを変更
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with('change_password_success', 'パスワードを変更しました。');
    }

    /**
     *
     * スレッド
     *
     */
    public function viewThread()
    {

        // データベースからメッセージを取得
        $data = DB::table("thread")
                ->where("user_id",Auth::id())
                ->orderByDesc("created_at")
                ->limit(25)
                ->get();

        return view("thread",compact("data"));
    }

    public function postThread(Request $request) {

        // 二重送信防止
        $request->session()->regenerateToken();

        // バリデーション
        $request->validate([
            'message' => 'required|max:2',
            'file' => 'nullable|file|max:1024'
        ]);

        // ファイルが送信された場合の処理
        if (!is_null($request->file("file"))) {
            $file = $request->file("file");
            $serverFilename = time()."-".$file->getClientOriginalName();
            $file->storeAs(Auth::id(),$serverFilename);
            $originalFilename = $file->getClientOriginalName();
        }else {
            $serverFilename = NULL;
            $originalFilename = NULL;
        }

        DB::table("thread")
            ->insert(
                [
                    "user_id" => Auth::id(),
                    "sender" => Auth::id(),
                    "message" => $request->message,
                    "original_filename" => $originalFilename,
                    "server_filename" => $serverFilename,
                    "created_at" => NOW(),
                ]
            );

        return redirect(route("thread"));
    }

    public function downloadThread($serverFilename)
    {

        // ファイルがなければHTTPステータスコード404をレスポンス
        if (empty($serverFilename)) {
            abort(404);
            exit;
        }

        return Storage::get(Auth::id()."/".$serverFilename);

    }

    /**
     *
     * お支払い
     *
     */
    public function payment()
    {

        // $data = DB::table("thread")->where("id",Auth::id())->get();

        return view("payment");
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('mypage');
    }

    public function logout() {
        Auth::logout();

    }

}
