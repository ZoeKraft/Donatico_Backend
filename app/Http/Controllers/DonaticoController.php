<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\TbCampaigns;
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
        //
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
            'category' => 'required|exists:tb_categories,id',
            'type' => 'required|exists:tb_types,id',
            'amount' => 'required|numeric|min:0',
        ]);

        $imagePath = $request->file('image')->store('campaigns', 'public');

        $campaign = TbCampaigns::create([
            'img' => $imagePath,
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'categories_id' => $request->category,
            'types_id' => $request->type,
            'amount' => $request->amount

        ]);

        return response()->json($campaign);
    }

    /**
     * Display the specified resource.
     */
    public function show($img, $name, $description, $location, $category, $type, $amount)
    {
        //
        $campaigns = new TbCampaigns();
        $campaigns::create([
            'img' => $img,
            'name' => $name,
            'description' => $description,
            'location' => $location,
            'categories_id' => $category,
            'types_id' => $type,
            'amount' => $amount
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TbCampaigns $campaigns)
    {
        $campaigns->load(['categories', 'types']);

        // $category = TbCategories::all();
        // $types = TbTypes::all(); maybe not needed

        return response()->json($campaigns);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TbCampaigns $campaign)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'name' => 'required|unique:tb_campaigns,name,' . $campaign->id,
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
                if ($campaign->image && Storage::disk('public')->exists($campaign->image)) {
                    Storage::disk('public')->delete($campaign->image);
                }

                // Store new image
                $imagePath = $request->file('image')->store('products', 'public');

                if (!$imagePath) {
                    throw new \Exception('Failed to store new image');
                }
            } catch (\Exception $e) {
                // Log the error but don't stop the update process
                Log::error('Error handling product image update: ' . $e->getMessage(), [
                    'campaign_id' => $campaign->id,
                    'original_image' => $campaign->image
                ]);

                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Failed to update product image. Please try again.');
            }
        }

        $campaign->update([
            'img' => $request->hasFile('image') ? $imagePath : $campaign->image,
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'categories_id' => $request->category,
            'types_id' => $request->type,
            'amount' => $request->amount

        ]);

        return response()->json($campaign);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    
    //API methods
    public function all()
    {
        $donations = TbCampaigns::with(['categories', 'types'])->get();

        return response()->json($donations);
    }
}
