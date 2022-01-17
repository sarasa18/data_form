<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DataForm;
use Illuminate\Support\Facades\DB;
//フォームチェックデータ
use App\Services\CheckFormData;
//バリデーション
use App\Http\Requests\StoreDataForm;

class DataFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$dataall = DataForm::all();
        $search = $request->input('search');
        //一覧取得
        // $dbdatas = DB::table('data_forms')
        //     ->select('id', 'your_name', 'title', 'created_at')
        //     ->orderBy('created_at', 'DESC')
        //     ->paginate(20);

        //検索フォーム用
        $query = DB::table('data_forms');

        // もし検索フォームに文字があれば
        if ($search !== null) {
            //全角スペースをはんかくに
            $search_split = mb_convert_kana($search, 's');
            // 空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split, -1, PREG_SPLIT_NO_EMPTY);
            foreach ($search_split2 as $value) {
                $query->where('your_name', 'like', '%' . $value . '%');
                $query->orWhere('id', 'like', '%' . $value . '%');
                $query->orWhere('title', 'like', '%' . $value . '%');
                $query->orWhere('contact', 'like', '%' . $value . '%');
                $query->orWhere('email', 'like', '%' . $value . '%');
            }
        }

        $query->select('id', 'your_name', 'title', 'created_at');
        $query->orderBy('created_at', 'DESC');
        $dbdatas = $query->paginate(20);

        return view('data.index', compact('dbdatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataForm $request)
    {
        $data = new DataForm();

        $data->your_name = $request->input('your_name');
        $data->title = $request->input('title');
        $data->email = $request->input('email');
        $data->url = $request->input('url');
        $data->gender = $request->input('gender');
        $data->age = $request->input('age');
        $data->contact = $request->input('contact');
        //dd($your_name, $title);
        $data->save();
        return redirect('data/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pickdata = DataForm::find($id);

        $gender = CheckFormData::checkGender($pickdata);
        $age = CheckFormData::checkAge($pickdata);


        return view('data.show', compact('pickdata', 'gender', 'age'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pickdata = DataForm::find($id);

        return view('data.edit', compact('pickdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pickdata = DataForm::find($id);

        $pickdata->your_name = $request->input('your_name');
        $pickdata->title = $request->input('title');
        $pickdata->email = $request->input('email');
        $pickdata->url = $request->input('url');
        $pickdata->gender = $request->input('gender');
        $pickdata->age = $request->input('age');
        $pickdata->contact = $request->input('contact');

        $pickdata->save();
        return redirect('data/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pickdata = DataForm::find($id);
        $pickdata->delete();

        return redirect('data/index');
    }
}
