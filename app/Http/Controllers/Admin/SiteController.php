<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Voyager\VoyagerBaseController;
use App\Models\Site;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Events\BreadDataAdded;


class SiteController extends VoyagerBaseController
{
    /**
     * POST BRE(A)D - Store data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate fields with ajax
        $slug = 'sites';

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        $data = $this->insertUpdateData($request, 'sites', $dataType->rows, new Site());

        event(new BreadDataAdded($dataType, $data));

        if (!$request->has('_tagging')) {
            if (auth()->user()->can('browse', $data)) {
                $redirect = redirect()->route("voyager.sites.index");
            } else {
                $redirect = redirect()->back();
            }

            return $redirect->with([
                'message' => __('voyager::generic.successfully_added_new') . " Site",
                'alert-type' => 'success',
            ]);
        } else {
            return response()->json(['success' => true, 'data' => $data]);
        }
    }
}
