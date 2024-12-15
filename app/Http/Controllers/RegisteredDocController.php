<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\DocType;
use App\Models\RequestType;
use App\Models\RequestDocument;
use App\Models\Approve;
use App\Models\RegisteredDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredDocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::guest())
        return redirect('/');
    
        $RequestDocuments = RequestDocument::join('RequestType', 'RequestType.requestTypeID', '=', 'RequestDocument.requestTypeID')
        ->join('User', 'User.userID', '=', 'RequestDocument.userID')
        ->join('DocType', 'DocType.docTypeID', '=', 'RequestDocument.docTypeID')
        ->where('requestStatus', '=', 3)
        ->orWhere('requestStatus', '=', 4)
        ->orderBy('User.userID', 'asc')->paginate(5);
        //dd($RequestDocuments);
        return view('RegisterDocument.index',  ['RequestDocuments'=>$RequestDocuments]);
    }

    public function index2()
    {
        if(Auth::guest())
        return redirect('/');
    
        $RegisteredDoc = RegisteredDoc::join('RequestDocument', 'RequestDocument.requestID', '=', 'RegisteredDoc.requestID')
        ->join('RequestType', 'RequestType.requestTypeID', '=', 'RequestDocument.requestTypeID')
        ->join('User', 'User.userID', '=', 'RequestDocument.userID')
        ->join('DocType', 'DocType.docTypeID', '=', 'RequestDocument.docTypeID')
        ->Where('requestStatus', '=', 4)
        ->orderBy('User.userID', 'asc')->paginate(5);
        //dd($RegisteredDoc);
        return view('Document.index',  ['RegisteredDocs'=>$RegisteredDoc]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $Request = RequestDocument::find($id);
        $DocType = DocType::all();
        $RequestType = RequestType::all();
        $Review = Review::where('requestID', $id)->firstOrFail();
        $Approve = Approve::where('requestID', $id)->firstOrFail();
        return view('RegisterDocument.create', compact('Request','DocType', 'RequestType', 'Review', 'Approve'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        //dd('store');
        $RequestDocument = RequestDocument::find($id);
        $RequestDocument->update([
            'requestStatus' => '4',
        ]);
        
        $this->createregistration($request, $id);
        return redirect()->route('RegisterDocument.index')
            ->with('success', "Approved Successfully!");
    }

    private function createregistration($request, $id)
    {  
        $file = $request->file('docFile');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $request->docFile->move('RegisteredDocuments',$fileName);

        RegisteredDoc::create([
            'requestID' => $request->requestID,
            'effectivityDate' => $request->effectivityDate,
            'docFile' => $fileName,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($file)
    {
        $DocumentFile = $file;
        return view('Document.show', compact('DocumentFile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegisteredDoc $registeredDoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegisteredDoc $registeredDoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegisteredDoc $registeredDoc)
    {
        //
    }
}
