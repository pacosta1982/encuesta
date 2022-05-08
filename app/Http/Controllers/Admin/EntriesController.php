<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Entry\BulkDestroyEntry;
use App\Http\Requests\Admin\Entry\DestroyEntry;
use App\Http\Requests\Admin\Entry\IndexEntry;
use App\Http\Requests\Admin\Entry\StoreEntry;
use App\Http\Requests\Admin\Entry\UpdateEntry;
use App\Models\Entry;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class EntriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEntry $request
     * @return array|Factory|View
     */
    public function index(IndexEntry $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Entry::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'survey_id', 'participant_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.entry.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.entry.create');

        return view('admin.entry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEntry $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEntry $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Entry
        $entry = Entry::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/entries'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/entries');
    }

    /**
     * Display the specified resource.
     *
     * @param Entry $entry
     * @throws AuthorizationException
     * @return void
     */
    public function show(Entry $entry)
    {
        $this->authorize('admin.entry.show', $entry);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Entry $entry
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Entry $entry)
    {
        $this->authorize('admin.entry.edit', $entry);


        return view('admin.entry.edit', [
            'entry' => $entry,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEntry $request
     * @param Entry $entry
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEntry $request, Entry $entry)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Entry
        $entry->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/entries'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/entries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEntry $request
     * @param Entry $entry
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEntry $request, Entry $entry)
    {
        $entry->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEntry $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEntry $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Entry::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
