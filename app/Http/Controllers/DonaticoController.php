<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\TbCampaigns;
use App\Models\TbCategories;
use App\Models\TbTypes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class DonaticoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = TbCategories::all();
        $types = TbTypes::all();

        return view('donations.create', compact('categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'name' => 'required|unique:tb_campaigns,name',
            'description' => 'required',
            'location' => 'required',
            'categories_id' => 'required|exists:tb_categories,id',
            'types_id' => 'required|exists:tb_types,id',
            'amount' => 'required|numeric|min:0',
        ]);

        $imagePath = $request->file('image')->store('campaigns', 'public');

        $campaign = TbCampaigns::create([
            'img' => $imagePath,
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'categories_id' => $request->categories_id,
            'types_id' => $request->types_id,
            'amount' => $request->amount

        ]);

        return redirect()->route('campaign.show')->with('success', 'Campaign created successfully');
        
        //return response()->json($campaign);
    }

    public function show()
    {
        $donation = TbCampaigns::with('categories', 'types')->get(); // Get all donations
        return view('donations.show', compact('donation'));
    }



    public function edit(TbCampaigns $donation)
    {
        $donation->load(['categories', 'types']);

        $categories = TbCategories::all();
        $types = TbTypes::all();

        return view('donations.edit', compact('donation', 'categories', 'types'));
    }





    public function update(Request $request, TbCampaigns $donation)
    {
        $request->validate([
            'img' => 'nullable|image|max:4096',
            'name' => 'required|unique:tb_campaigns,name,'. $donation->id,
            'description' => 'required',
            'location' => 'required',
            'category' => 'required|exists:tb_categories,id',
            'type' => 'required|exists:tb_types,id',
            'amount' => 'required|numeric|min:0',
        ]);

         $imagePath = null;
        if ($request->hasFile('image')) {
             try {
                 // Delete old image if it exists
                 if ($donation->image && Storage::disk('public')->exists($donation->image)) {
                     Storage::disk('public')->delete($donation->image);
                 }

                 // Store new image
                $imagePath = $request->file('image')->store('campaigns', 'public');

                 if (!$imagePath) {
                     throw new \Exception('Failed to store new image');
                 }
             } catch (\Exception $e) {
                 // Log the error but don't stop the update process
                 Log::error('Error handling product image update: ' . $e->getMessage(), [
                     'campaign_id' => $donation->id,
                    'original_image' => $donation->img
                ]);

                 return redirect()
                     ->back()
                     ->withInput()
                     ->with('error', 'Failed to update product image. Please try again.');
             }
        }

        $donation->update([
            'img' => $request->hasFile('image') ? $imagePath : $donation->img, // Use new image if provided, otherwise keep old one
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'categories_id' => $request->category,
            'types_id' => $request->type,
            'amount' => $request->amount

        ]);


        return redirect()->route('campaign.show')->with('success', 'Campaign updated successfully');

        //return response()->json($campaign);
    }









    public function destroy($id)
    {
        $donation = TbCampaigns::findOrFail($id);
        $donation->delete();

        return redirect()->back()->with('success', 'Campaign deleted successfully');
    }



    //API methods
    public function all()
    {
        $donations = TbCampaigns::with(['categories', 'types'])->get();

        return response()->json($donations);
    }
}
