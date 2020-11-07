<?php

namespace App\Http\Controllers;
use App\Consultant;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    public function index()
    {
        $consultancy = Consultant::orderBy('nro_order','desc')->paginate(10);
        return view('admin.consultant.index',compact('consultancy'));
    }

    public function create()
    {
        return view('admin.consultant.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'info'=>'required|string',
            'customer'=>'required|string|max:150',
            'fechas'=>'required|string|max:80',
            'nro_order'=>'required|integer'
        ]);

        $consultant=new Consultant();
        $consultant->info=$request->info;
        $consultant->fechas=$request->fechas;
        $consultant->customer=$request->customer;
        $consultant->nro_order=$request->nro_order;
        $consultant->save();
        return redirect('panel/consultant')->with('Mensaje','Consultoría agregada correctamente');
    }

    public function edit($id)
    {
        $consultant = Consultant::findOrFail($id);
        return view('admin.consultant.edit',compact('consultant'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'info'=>'required|string',
            'customer'=>'required|string|max:150',
            'fechas'=>'required|string|max:80',
            'nro_order'=>'required|integer'
        ]);
        $consultant = Consultant::find($id);
        $consultant->info=$request->info;
        $consultant->fechas=$request->fechas;
        $consultant->customer=$request->customer;
        $consultant->nro_order=$request->nro_order;
        $consultant->save();
        return redirect('panel/consultant')->with('Mensaje','Consultoría actualizada correctamente');
    }

    public function destroy($id)
    {
        $consultant = Consultant::find($id);
        $consultant->delete();
        return redirect('panel/consultant')->with('Mensaje','Consultoría eliminada correctamente');
    }
}
