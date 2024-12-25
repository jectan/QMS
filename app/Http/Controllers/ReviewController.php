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
        ->where('requestStatus', '=', 2)
        ->orWhere('requestStatus', '=', 1)
        ->orderBy('User.userID', 'asc')->paginate(5);
        //dd($RequestDocuments);
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
            'requestStatus' => '2',
        ]);
        
        $this->createreview($request, $id);
        return redirect()->route('Review.index')
            ->with('success', "Reviewed Successfully!");
    }

    private function createreview($request, $id)
    {
        $userID = Auth::id();
        //dd($request->reviewComment);
        Review::create([
            'userID' => $userID,
            'requestID' => $request->requestID,
            'reviewComment' => $request->reviewComment,
            'reviewDate' => Now(),
            'reviewStatus' => TRUE,
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
        $Review = Review::where('requestID', $id)->firstOrFail();
        //dd($Review);
        return view('ReviewDocument.edit', compact('Request','DocType', 'RequestType', 'Review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $Review = Review::find($id);
        //dd($Review);
        $Review->update($request->all());
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
