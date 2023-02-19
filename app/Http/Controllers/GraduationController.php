<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class GraduationController extends Controller
{
    public function update(Request $request)
    {
        $recordIds = [
            $request->input('notify'),
            $request->input('review'),
            $request->input('defense')
        ]; // assuming the checkbox inputs have different names and ids

        $status = $request->input('status');

        $allSelected = count($recordIds) == 3 && Record::whereIn('id', $recordIds)->where('selected', 1)->count() == 3;

        if ($allSelected) {
            // update the status of the relevant records
            Record::whereIn('id', $recordIds)->update(['status' => 'graduated']);
            
        }

        // redirect back to the page where the form was submitted
        return redirect()->back();
    }
}
