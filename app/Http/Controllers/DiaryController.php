<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $id = Auth::id();
        $diaries = Diary::where('user_id', $id)->get();
        return view('dashboard', ['diaries' => $diaries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $images = Image::all();
        return view('diary.create_diary', ['images' => $images]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // 유효성 검사
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image_path' => 'required',
        ]);

        // Diary 모델 인스턴스 생성
        $diary = new Diary;
        $diary->title = $request->title;
        $diary->content = $request->content;
        $diary->image_path = $request->image_path;
        // user_id가 있다면 추가
        $diary->user_id = Auth::id();

        $diary->save();

        // 리다이렉트 또는 응답 반환
        // return redirect()->route('diary.index');
        return redirect()->route('diary.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
            $diary = Diary::find($id);
            return view('diary.show_diary', ['diary' => $diary]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $diary = Diary::find($id);
        $images = Image::all();
        return view('diary.create_diary', ['diary' => $diary, 'images' => $images]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // 유효성 검사
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image_path' => 'required',
        ]);

        // 해당 id의 Diary 찾기
        $diary = Diary::find($id);

        // 유저의 입력으로 Diary 업데이트
        $diary->title = $request->title;
        $diary->content = $request->content;
        $diary->image_path = $request->image_path;

        // 데이터베이스에 변경사항 저장
        $diary->save();

        // 업데이트된 Diary 보여주는 페이지로 리다이렉트
        return redirect()->route('diary.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $diary = Diary::find($id);
        $diary->delete();
        return redirect()->route('diary.index');
    }
}
