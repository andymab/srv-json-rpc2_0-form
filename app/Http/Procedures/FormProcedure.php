<?php

declare(strict_types=1);

namespace App\Http\Procedures;

use App\Models\Form;
use App\Models\FormData;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Sajya\Server\Procedure;

class FormProcedure extends Procedure
{
    /**
     * The name of the procedure that will be
     * displayed and taken into account in the search
     *
     * @var string
     */
    public static string $name = 'FormProcedure';

    /**
     * Execute the procedure.
     *
     * @param Request $request
     *
     * @return array|string|integer
     */
    public function handle(Request $request)
    {
        // write your code
    }


    public function getforms()
    {
        return Form::all();
    }


    public function storeformdata(Request $request){
        try{
            $formdata  = new FormData();
            $formdata->form_uid = $request->form_uid;
            $formdata->data = json_encode($request->formdata);
            $formdata->save();
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }


    public function getform(Request $request)
    {
        return Form::where('id','=',$request->form_uid)->first();
    }
}
