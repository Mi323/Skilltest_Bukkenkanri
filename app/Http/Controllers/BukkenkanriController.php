<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukkenKanri;
use Illuminate\Support\Facades\File;



class BukkenkanriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $bukkenkanris= BukkenKanri::all();
        return view('bukkenkanri.index', compact('bukkenkanris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
                    'number' => 'required|string',
                    'date' => 'required|date',
                    'address' => 'required|string',
                    'price' => 'required|numeric',
                    'pic' => 'nullable|image|max:1024',
                    'pic2' => 'nullable|image|max:1024'

                ]);

        $bukkenkanri = new BukkenKanri();
        $bukkenkanri->number=$request->number;
        $bukkenkanri->date=$request->date;
        $bukkenkanri->address=$request->address;
        $bukkenkanri->price=$request->price;

        if(request('pic')){
            $image=request()->file('pic')->getClientOriginalName();
            $name=date('Ymd_His').'_'.$image;
            request()->file('pic')->move('storage/images', $name);
            $bukkenkanri->pic=$name;
        }

        if(request('pic2')){
            $image=request()->file('pic2')->getClientOriginalName();
            $name=date('Ymd_His').'_'.$image;
            request()->file('pic2')->move('storage/images', $name);
            $bukkenkanri->pic2=$name;
        }

        $bukkenkanri->save();


        if (!empty($bukkenkanri)) {
            session()->flash('flash_message', '登録しました。');
        } else {
            session()->flash('flash_error_message', '登録できませんでした。');
        }



        return redirect(('/'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(String $id)
    {
        $bukkenkanri = BukkenKanri::find($id);
        return view('bukkenkanri.edit', compact('bukkenkanri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, String $id)
    {
        $validated = $request->validate([
            'number' => 'required|string',
            'date' => 'required|date',
            'address' => 'required|string',
            'price' => 'required|numeric',
            'pic' => 'nullable|image|max:1024',
            'pic2' => 'nullable|image|max:1024'

        ]);


        $bukkenkanri=BukkenKanri::find($id);
        if($bukkenkanri->exists()){
            $bukkenkanri->number=$request->input('number');
            $bukkenkanri->date=$request->input('date');
            $bukkenkanri->address=$request->input('address');
            $bukkenkanri->price=$request->input('price');

            if($request->hasFile('pic')) {
                $destination='storage/images'.$bukkenkanri->pic;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $image=$request->file('pic');
                $extention=$image->getClientOriginalName();
                $name=date('Ymd_His').'_'.$extention;
                $image->move('storage/images/',$name);
                $bukkenkanri->pic=$name;

            }

            if($request->hasFile('pic2')) {
                $destination='storage/images'.$bukkenkanri->pic2;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $image=$request->file('pic2');
                $extention=$image->getClientOriginalName();
                $name=date('Ymd_His').'_'.$extention;
                $image->move('storage/images/',$name);
                $bukkenkanri->pic2=$name;

            }

            $bukkenkanri->update();

            session()->flash('flash_message', '編集しました。');
        } else {
            session()->flash('flash_error_message', '編集できませんでした。');
        }


        return redirect(('/'));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bukkenkanri = BukkenKanri::find($id);
        $bukkenkanri->delete();
        session()->flash('flash_message', '削除しました。');
        return redirect('/');
    }


}
