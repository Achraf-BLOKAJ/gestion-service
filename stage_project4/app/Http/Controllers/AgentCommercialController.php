<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentCmlRequest;
use App\Models\AgentCommercial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentCommercialController extends Controller
{

    public function index()
    {
        $agentCommercials = AgentCommercial::all();
        return view('AgentCommercial.index', compact('agentCommercials'));
    }


    public function create()
    {
        return view('AgentCommercial.create');
    }

   
    public function store(AgentCmlRequest $request)
    {
        $formFields = $request->validated();

        $formFields['password'] = Hash::make($request->password);

        AgentCommercial::create($formFields);

        return redirect()->route('agentcommercial.idex')->with('success','Votre compte est bien crée');
    }


    public function show(AgentCommercial $agentCommercial)
    {
        return view('AgentCommercial.show',compact("agentCommercial"));
    }


    public function edit(AgentCommercial $agentCommercial)
    {
        return view('AgnetCommercial.edit',compact( 'agentCommercial'));
    }

    public function update(Request $request, AgentCommercial $agentCommercial)
    {
        $formFields = $request->validated();
        $formFields['password'] = Hash::make($request->password);
        $agentCommercial->fill($formFields)->save();
        return redirect()->route('agentCommaercial.show',$agentCommercial->id)->with('success','Votre compte est bien modifié');
    }

    public function destroy(AgentCommercial $agentCommercial)
    {
        $agentCommercial->delete();
        return to_route('agentCommercial.index')->with('success','Le compte a été bien supprimé');
    }
}
