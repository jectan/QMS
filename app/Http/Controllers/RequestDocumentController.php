<?php

namespace App\Http\Controllers;

use App\Models\RequestDocument;
use App\Models\RequestType;
use App\Models\DocType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RequestDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::guest())
        return redirect('/');
    
        $RequestDocuments = RequestDocument::join('User', 'User.userID', '=', 'RequestDocument.userID')
        ->join('DocType', 'DocType.docTypeID', '=', 'RequestDocument.docTypeID')
        ->orderBy('RequestDocument.requestID', 'asc')->paginate(5);
        return view('RequestDocument.index',  ['RequestDocuments'=>$RequestDocuments]);
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
        //dd($request);
        $request->validate([
            'requestTypeID' => ['required', 'integer'],
            'docTypeID' => ['required', 'integer'],
            'docRefCode' => ['required', 'string'],
            'currentRevNo' => ['required', 'integer'],
            'docTitle' => ['required', 'string', 'max:50'],
            'requestReason' => ['required', 'string', 'min:5', 'max:50'],
            'status' => ['required', 'integer'],
        ]); 

        $userID = Auth::id();
        $file = $request->file('requestFile');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $request->requestFile->move('RequestDocuments',$fileName);

        RequestDocument::create([
            'requestTypeID' => $request->requestTypeID,
            'docTypeID' => $request->docTypeID,
            'docRefCode' => $request->docRefCode,
            'currentRevNo' => $request->currentRevNo,
            'docTitle' => $request->docTitle,
            'requestReason' => $request->requestReason,
            'userID' => $userID,
            'requestFile' => $fileName,
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
    public function show($file)
    {
        $DocumentFile = $file;
        return view('RequestDocument.show', compact('DocumentFile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Request = RequestDocument::find($id);
        $DocType = DocType::all();
        $RequestType = RequestType::all();
        return view('RequestDocument.edit', compact('Request','DocType', 'RequestType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $RequestDocument = RequestDocument::find($id);
        $RequestDocument->update($request->all());
        return redirect()->route('RequestDocument.index')
            ->with('success', "Request Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $RequestDocument = RequestDocument::find($id);
        $RequestDocument->delete();
        return redirect()->route('RequestDocument.index')
            ->with('success', "Request Deleted Successfully!");
    }

    public function download($file)
    {
        return response()->download(public_path('RequestDocuments/'.$file));
    }
}
