<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    
    public function store(Request $request)
    {
        $checklist = new Checklist;
        $checklist->content = $request->content;
        $checklist->save();
        
    }

    public function show(Checklist $checklist)
    {
        $checklist = Checklist::all();
        return $checklist;
    }

    public function update(Request $request)
    {
        $checklist = Checklist::find($request->id);
        $checklist->checked = !($checklist->checked);
        $checklist->save();
    }

    public function destroy($id)
    {
        $data = Checklist::find($id)->delete();
    }
}
