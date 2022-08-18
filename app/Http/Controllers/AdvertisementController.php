<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use App\Http\Requests\CreateAdvertisementRequest;
use App\Http\Requests\UpdateAdvertisementRequest;
use App\Domain\FilterParams;

class AdvertisementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return $advertisements
     */
    public function index()
    {
        $advertisements = Advertisement::with('category')->paginate(20);
        return $advertisements;
    }
    /**
     * Filter advertisements
     * 
     * @return $advertisements
     */
    public function filterAverts(){
        $category = request('category');
        $title = request('title') === 'null' ? '' : request('title');
        $priceOrder = request('priceOrder');
        $userId = request('userId');
        $filterParams = new FilterParams($category, $title ,$priceOrder, $userId);

        $advertisements = Advertisement::filterAds($filterParams);
        return response()->json($advertisements);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateAdvertisementRequest $request)
    {
        $validated = $request->validated();
        Advertisement::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image_url' => $validated['image_url'],
            'price' => $validated['price'],
            'user_id' => $validated['userId'],
            'category_id' => $validated['category'],
            'city' => $validated['city']
        ]);
        return response()->json(['message' => 'Avertisement successfully created.']);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $advertisement = Advertisement::with('category')->findOrFail($request['id']);
        return $advertisement;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdvertisementRequest $request)
    {
        $advertisement  = Advertisement::findOrFail($request['id']);
        $validated = $request->validated();
        $advertisement->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image_url' => $validated['image_url'],
            'price' => $validated['price'],
            'city' => $validated['city'],
            'category_id' => $validated['category_id']
        ]);
        return response()->json([
            'message' => 'You have successfully updated your advertisement.', 
            'advertisement' => $advertisement
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertisementToDelete = Advertisement::findOrFail($id);
        $advertisementToDelete->delete();
        return response()->json([
            'message' => 'You have successfully delete advertisement', 
            'oneItemDelete' => true
        ]);
    }
}
