<?php

namespace App\Http\Controllers;

use App\Models\RequestDocument;
use App\Models\RequestType;
use App\Models\DocType;
use Illuminate\Http\Request;
use Auth;

class RequestDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_ID = Auth::user()->userID;
        $RequestDocuments = RequestDocument::join('User', 'User.userID', '=', 'RequestDocument.userID')
        ->orderBy('RequestDocument.requestID', 'asc')->paginate(5);
        dd($user_ID);
        return view('RequestDocument.index',  ['RequestDocuments'=>$RequestDocuments, 'user_ID'=>$user_ID]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $DocType = DocType::all();
        $RequestType = RequestType::all();
        return view('RequestDocument.create', compact('DocType', 'RequestType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       /*  $request->validate([
            'requestTypeID' => ['required', 'integer'],
            'docTypeID' => ['required', 'integer'],
            'docRefCode' => ['required', 'string'],
            'currentRevNo' => ['required', 'integer'],
            'docTitle' => ['required', 'string', 'max:50'],
            'requestReason' => ['required', 'string', 'min:5', 'max:50'],
            'userID' => ['required', 'integer'],
            'requestFile' => ['required', 'mimes:pdf', 'string'],
            'requestDate' => ['required', 'date'],
            'status' => ['required', 'integer'],
        ]); */

        RequestDocument::create([
            'requestTypeID' => $request->requestTypeID,
            'docTypeID' => $request->docTypeID,
            'docRefCode' => $request->docRefCode,
            'currentRevNo' => $request->currentRevNo,
            'docTitle' => $request->docTitle,
            'requestReason' => $request->requestReason,
            'userID' => $request->userID,
            'requestFile' => $request->requestFile,
            'requestTypeID' => $request->requestTypeID,
            'requestDate' => $request->requestDate,
            'status' => $request->status,
        ]);
        return redirect()->route('RequestDocument.index')
          ->with('success', 'Document Request Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RequestDocument $requestDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        dd('Edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        dd('Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        dd('Delete');
    }
}
