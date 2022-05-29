<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use App\Models\FormData;
use Illuminate\Support\Facades\DB;

class FormDataController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = DB::table('form_data')
        ->leftJoin('forms', 'form_data.form_uid', '=', 'forms.id')
        ->select('form_data.*', 'forms.name as name')
        ->orderBy("updated_at")
        ->get();
        return view('formdata.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formdata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model =  new FormData();
        $object = json_decode($request->json_);

        $model->name=$object->title;
        $model->description=$object->description;
        $model->model=$request->json_;
        $model->save();
        return redirect(route('formdata.show', $model))->with('success', 'Форма успешно создана');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $formdata = FormData::where('id','=',$id)->first();
        $form = Form::where('id','=',$formdata->form_uid)->first();
        $form_model = json_decode($form->model);
        $formdata_data = json_decode($formdata->data);
        return view('formdata.show', compact('formdata','form_model','formdata_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormData  $formdata
     * @return \Illuminate\Http\Response
     */
    public function edit(FormData $formdata)
    {
        return view('formdata.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormData  $formdata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormData $formdata)
    {
        $object = json_decode($request->json_);
        $formdata->name=$object->title;
        $formdata->description=$object->description;
        $formdata->model=$request->json_;
        $formdata->update();
        return redirect(route('formdata.show', compact('form')))->with('success', 'Форма успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formdata = FormData::where('id','=',$id)->first();
        $formdata->delete();
        return redirect(route('formdata.index'))->with('success', 'Форма успешно удалена');
    }




}

