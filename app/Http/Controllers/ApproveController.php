<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\DocType;
use App\Models\RequestType;
use App\Models\RequestDocument;
use App\Models\Approve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproveController extends Controller
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
        ->where('requestStatus', '=', 2)
        ->orWhere('requestStatus', '=', 3)
        ->orderBy('User.userID', 'asc')->paginate(5);
        //dd($RequestDocuments);
        return view('ApproveDocument.index',  ['RequestDocuments'=>$RequestDocuments]);
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
        return view('ApproveDocument.create', compact('Request','DocType', 'RequestType', 'Review'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        //dd('store');
        $RequestDocument = RequestDocument::find($id);
        $RequestDocument->update([
            'requestStatus' => '3',
        ]);
        
        $this->createapprove($request, $id);
        return redirect()->route('Approve.index')
            ->with('success', "Approved Successfully!");
    }

    private function createapprove($request, $id)
    {   
        $userID = Auth::id();
        Approve::create([
            'userID' => $userID,
            'requestID' => $request->requestID,
            'approveComment' => $request->approveComment,
            'approveDate' => Now(),
            'approveStatus' => TRUE,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Approve $approve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Request = RequestDocument::find($id);
        $DocType = DocType::all();
        $RequestType = RequestType::all();
        $Review = Review::where('requestID', $id)->firstOrFail();
        $Approve = Approve::where('requestID', $id)->firstOrFail();
        //dd($Review);
        return view('ApproveDocument.edit', compact('Request','DocType', 'RequestType', 'Review', 'Approve'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $Approve = Approve::find($id);
        //dd($Approve);
        $Approve->update($request->all());
        return redirect()->route('Approve.index')
            ->with('success', "Approved Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Approve $approve)
    {
        //
    }
}
