<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Type\BulkDestroyType;
use App\Http\Requests\Admin\Type\DestroyType;
use App\Http\Requests\Admin\Type\IndexType;
use App\Http\Requests\Admin\Type\StoreType;
use App\Http\Requests\Admin\Type\UpdateType;
use App\Models\Type;
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

class TypesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexType $request
     * @return array|Factory|View
     */
    public function index(IndexType $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Type::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name'],

            // set columns to searchIn
            ['id', 'name']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.type.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.type.create');

        return view('admin.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreType $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreType $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Type
        $type = Type::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/types'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/types');
    }

    /**
     * Display the specified resource.
     *
     * @param Type $type
     * @throws AuthorizationException
     * @return void
     */
    public function show(Type $type)
    {
        $this->authorize('admin.type.show', $type);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Type $type
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Type $type)
    {
        $this->authorize('admin.type.edit', $type);


        return view('admin.type.edit', [
            'type' => $type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateType $request
     * @param Type $type
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateType $request, Type $type)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Type
        $type->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/types'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyType $request
     * @param Type $type
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyType $request, Type $type)
    {
        $type->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyType $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyType $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Type::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
