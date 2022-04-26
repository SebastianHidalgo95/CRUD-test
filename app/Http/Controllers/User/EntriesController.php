<?php

namespace App\Http\Controllers\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MGEntry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
class EntriesController extends Controller
{
    public function entries (){
        $entries = MGEntry::all();
        return view('user.entries.index', compact('entries'));
    }
    public function createEntry (Request $request) {
        try {
            
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|between:2,100',
                'text' => 'required',
                'title' => 'required',
                'date' => 'required|date',
            ],[
                'name.required'=>'Se requiere un nombre',
                'team_id.required'=>'Se requiere un equipo',
                'text.required'=>'Se requiere un text',
                'title.required'=>'Se requiere un title',
                'date.required'=>'Se requiere una fecha', 
            ]);
            if ($validator->fails()){
                return redirect()->back()->with('error', $validator->errors()->first());
                // return response()->json(['error'=>$validator->errors()->first()]);
            }
            $id = Auth::User()->id;
            $entry = MGEntry::create(array_merge($validator->validated(), ['user_id'=>$id]));
            $entry->save();
            
            return redirect()->back()->with('success', 'Entry created successfully');
        } catch (Exception $e) { 
            return redirect()->back()->with('error', 'Could not create entry');
                
            // return response()->json(['error' => $e->getMessage()], 500);
        }   
    }
    public function getAllEntries () {
        try {
            $entry = MGEntry::get();
            return response()->json($entry);
        } catch (Exception $e) { 
            return response()->json(['error' => $e->getMessage()], 500);
        } 
    }
    public function updateEntry (Request $request, $id_entry) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|between:2,100',
                'text' => 'required',
                'title' => 'required',
                'date' => 'required|date',
            ],[
                'name.required'=>'Se requiere un nombre',
                'text.required'=>'Se requiere un text',
                'title.required'=>'Se requiere un title',
                'date.required'=>'Se requiere una fecha', 
            ]);
            if ($validator->fails()){
                return redirect()->back()->with('error','Could not updated entry', $validator->errors()->first());
            }
            
            $entry = MGEntry::where('_id','=',$id_entry)->first();
            
            if($entry) {
                $entry->name = $request->name;
                $entry->user_id = Auth::User()->id;
                $entry->text = $request->text;
                $entry->title = $request->title;
                $entry->date = $request->date;
                $entry->save();
                
                return redirect()->back()->with('success', 'Entry updated successfully');
            } else {
                return redirect()->back()->withErrors(true);
            }
        } catch (Exception $e) { 
            return redirect()->back()->with('error', 'Could not updated entry');
        }   
    }
    public function deleteEntry (Request $request, $id_entry) {
        try {
            $entry = MGEntry::where('_id','=', $id_entry)->first();
            if($entry) {
                $entry->delete();
                return redirect()->back()->with('success', 'Entry deleted successfully');
            } else {
                return response()->json(['error'=>'La entrada no existe']);
            }
        } catch (Exception $e) { 
            return response()->json(['error' => $e->getMessage()], 500);
        } 
    }

}
