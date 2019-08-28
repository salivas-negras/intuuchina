<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Offer;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Storage;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = $this->all();

        /* Datos adicionales que se van a entregar a la vista */
        $params = (object) array(
            'title' => __('job offers')
        );

        return view('pages/offers', compact('offers', 'params'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $offers = $this->all();

        /* Datos adicionales que se van a entregar a la vista */
        $params = (object) array(
            'title' => __('job offers')
        );

        return view('pages/admin/offers', compact('offers', 'params'));
    }

    public function all() {
        /*
         * Realiza la consulta a la base de datos para seleccionar todos los datos ordenados
         * por la fecha de creación.
         */
        $offers = Offer::orderBy('created_at','DESC')->get();
        $offer = new Offer();
        $offers = $offer->setDaysRenewed($offers);

        return $offers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
        $request->validate([
            'title' => 'required|max:255|string',
            'location' => 'required|string',
            'industry' => 'required|string',
            'duration' => 'required|string',
            'description' => 'max:4000',
            'picture' => 'mimes:jpg,jpeg,bmp,png',
        ]);

        Offer::create([
            'title' => $request->get('title'),
            'location' => $request->get('location'),
            'industry' => $request->get('industry'),
            'duration' => $request->get('duration'),
            'description' => $request->get('description'),
            'picture' => $this->uploadFile($request),
        ]);

        return redirect()->route('admin.offers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $offer = Offer::find($id);

        return view('pages/admin/offer', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $offer = Offer::find($id);
        $update = $this->setUpdatedAttributesToOffer($offer, $request->all(), $request);
        $offer->renewUpdateAt($update);
        $offer->save();

        return redirect()->route('admin.offers');
    }

    /*
     * Sets all the modified data of the offer send by the user through the form.
     *
     * @param  \App\Offer  $request
     * @param  array $attributes
     * @param \Illuminate\Http\Request $request
     * @return boolean
     */
    public function setUpdatedAttributesToOffer(Offer $offer, array $attributes, Request $request) {
        $updated = false;
        foreach ($attributes as $key => $value) {
            if ($key !== '_token') {
                if ($key === 'picture') {
                    $this->deleteUploadedFileAssociatedWithOffer($offer->id);
                    $offer[$key] = $this->uploadFile($request);
                    if (!$updated) {
                        $updated = true;
                    }
                } else {
                    if ($offer[$key] != $attributes[$key]) {
                        $offer[$key] = $attributes[$key];
                        if (!$updated) {
                            $updated = true;
                        }
                    }
                }
            }
        };
        return $updated;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->deleteUploadedFileAssociatedWithOffer($id);
        Offer::destroy($id);

        return redirect()->route('admin.offers');
    }

    /*
     * Select all the offers that matches with the name of the industry passed as an argument
     * and send the partial view that comprises just the list of offers.
     */
    public function filterBy($filter) {
        if ($filter !== 'all') {
            $offers = Offer::where('industry', $filter)->orderBy('created_at', 'DESC')->get();
            if (count($offers) > 0) {
                $offer = new Offer();
                $offers = $offer->setDaysRenewed($offers);
            }
            return view('partials/_offers-list', compact('offers'));
        }

        $offers = $this->all();
        return view('partials/_offers-list', compact('offers'));
    }

    /*
     * Check if there is already a file in the given path. If the opposite occur it store
     * the file.
     */
    public function uploadFile(Request $request) {
        if ($request->file('picture') !== null) {
            $filename = $this->generateFileName($request);
            $request->file('picture')->storeAs('public/images', $filename);
            return $filename;
        }

        // Return the picture default name
        $filename = 'generic_' . $request->get('industry') . '_picture.jpg';
        return $filename;
    }

    public function generateFileName($request) {
        if (method_exists($request, 'get')) {
            return $request->get('location') . '_' . $request->get('industry') . '_' . Carbon::now()->micro . '.' . $request->file('picture')->getClientOriginalExtension();
        }
    }

    public function deleteUploadedFileAssociatedWithOffer($id) {
        $offer = Offer::find($id);

        if (!preg_match('/generic/', $offer->picture)) {
            Storage::delete('public/images/' . $offer->picture);
        }
    }

    /*
     * Select the offer that matches the 'id' passed as a parameter.
     *
     * @param string $id
     */
    public function single($id) {
        $offer = Offer::find($id);

        return view(('pages/job-description'), compact('offer', 'params'));
    }
}
