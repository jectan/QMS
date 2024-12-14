<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\DocType;
use App\Models\RequestType;
use App\Models\RequestDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
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
        ->orderBy('User.userID', 'asc')->paginate(5);
        return view('ReviewDocument.index',  ['RequestDocuments'=>$RequestDocuments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $Request = RequestDocument::find($id);
        $DocType = DocType::all();
        $RequestType = RequestType::all();
        return view('ReviewDocument.create', compact('Request','DocType', 'RequestType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        //dd('store');
        $RequestDocument = RequestDocument::find($id);
        $RequestDocument->update([
            'status' => '3',
        ]);
        
        $this->createreview($request, $id);
        return redirect()->route('Review.index')
            ->with('success', "Reviewed Successfully!");
    }

    private function createreview($request, $id)
    {
        $userID = Auth::id();
        Review::create([
            'userID' => $userID,
            'requestID' => $request->requestID,
            'reviewComment' => $request->reviewComment,
            'reviewDate' => Now(),
            'status' => TRUE,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
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
        return view('ReviewDocument.edit', compact('Request','DocType', 'RequestType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $RequestDocument = RequestDocument::find($id);
        $RequestDocument->update([
            'status' => '3',
        ]);
        return redirect()->route('Review.index')
            ->with('success', "Reviewed Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
