<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\MGEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    public function createEntry (Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|between:2,100',
                'user_id' => 'required',
                'text' => 'required',
                'title' => 'required',
                'date' => 'required|date',
            ],[
                'name.required'=>'Se requiere un nombre',
                'user_id.required'=>'Se requiere un id de usuario',
                'team_id.required'=>'Se requiere un equipo',
                'text.required'=>'Se requiere un text',
                'title.required'=>'Se requiere un title',
                'date.required'=>'Se requiere una fecha', 
            ]);
            if ($validator->fails()){
                return response()->json(['error'=>$validator->errors()->first()]);
            }
            
            $entry = MGEntry::create($validator->validated());
            $entry->save();
            return response()->json($entry);
        } catch (Exception $e) { 
            return response()->json(['error' => $e->getMessage()], 500);
        }   
    }
    public function updateEntry (Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'id_entry' => 'required',
                'name' => 'required|string|between:2,100',
                'user_id' => 'required',
                'text' => 'required',
                'title' => 'required',
                'date' => 'required|date',
            ],[
                'id_entry.required'=>'Se requiere un id_entry',
                'name.required'=>'Se requiere un nombre',
                'user_id.required'=>'Se requiere un id de usuario',
                'text.required'=>'Se requiere un text',
                'title.required'=>'Se requiere un title',
                'date.required'=>'Se requiere una fecha', 
            ]);
            if ($validator->fails()){
                return response()->json(['error'=>$validator->errors()->first()]);
            }
            
            $entry = MGEntry::where('_id','=',$request->id_entry)->first();
            
            if($entry) {
                $entry->name = $request->name;
                $entry->user_id = $request->user_id;
                $entry->text = $request->text;
                $entry->title = $request->title;
                $entry->date = $request->date;
                $entry->save();
                return response()->json($entry);
            } else {
                return response()->json(['error'=>'La entrada no existe']);
            }
        } catch (Exception $e) { 
            return response()->json(['error' => $e->getMessage()], 500);
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
    public function getEntry (Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'id_entry' => 'required',
            ],[
                'id_entry.required'=>'Se requiere un id de la entrada',
            ]);
            if ($validator->fails()){
                return response()->json(['error'=>$validator->errors()->first()]);
            }
            $entry = MGEntry::where('_id','=',$request->id_entry)->first();
            if($entry) {
                return response()->json($entry);
            } else {
                return response()->json(['error'=>'La entrada no existe']);
            }
        } catch (Exception $e) { 
            return response()->json(['error' => $e->getMessage()], 500);
        } 
    }
    public function deleteEntry (Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'id_entry' => 'required',
            ],[
                'id_entry.required'=>'Se requiere un id de la entrada',
            ]);
            if ($validator->fails()){
                return response()->json(['error'=>$validator->errors()->first()]);
            }
            $entry = MGEntry::where('_id','=',$request->id_entry)->first();
            if($entry) {
                $entry->delete();
                return response()->json($entry);
            } else {
                return response()->json(['error'=>'La entrada no existe']);
            }
        } catch (Exception $e) { 
            return response()->json(['error' => $e->getMessage()], 500);
        } 
    }

}
