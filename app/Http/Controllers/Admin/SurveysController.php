<?php

namespace App\Http\Controllers\Admin;

use App\Exports\EntriesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Survey\BulkDestroySurvey;
use App\Http\Requests\Admin\Survey\DestroySurvey;
use App\Http\Requests\Admin\Survey\IndexSurvey;
use App\Http\Requests\Admin\Survey\StoreSurvey;
use App\Http\Requests\Admin\Survey\UpdateSurvey;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Type;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SurveysController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSurvey $request
     * @return array|Factory|View
     */
    public function index(IndexSurvey $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Survey::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'settings'],

            // set columns to searchIn
            ['id', 'name', 'settings']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.survey.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.survey.create');

        return view('admin.survey.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSurvey $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSurvey $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['settings'] = '{"accept-guest-entries":true}';

        // Store the Survey
        $survey = Survey::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/surveys'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/surveys');
    }

    /**
     * Display the specified resource.
     *
     * @param Survey $survey
     * @throws AuthorizationException
     * @return void
     */
    public function show(Survey $survey, Request $request)
    {
        //return $survey;

        $this->authorize('admin.survey.show', $survey);

        $survey_id = $survey->id;

        $data = AdminListing::create(Question::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'survey_id', 'section_id', 'content', 'type', 'options', 'rules'],

            // set columns to searchIn
            ['id', 'content', 'type', 'options', 'rules'],
            function ($query) use ($survey_id) {
                $query
                    ->where('questions.survey_id', '=', $survey_id);
                //->orderBy('requirements.requirement_type_id');
            }
        );

        return view('admin.survey.show', compact('survey', 'data'));

        // TODO your code goes here
    }

    public function createQuestion(Survey $survey){

        $types = Type::all();
        return view('admin.question.create', compact('survey','types'));
    }

    public function editQuestion(Question $question)
    {
        //$this->authorize('admin.question.edit', $question);


        //return $question;
        $types = Type::all();
        $vowels = array("[", "]",'"');
        $opciones = str_replace($vowels, "", $question['options']);
        $reglas = str_replace($vowels, "", $question['rules']);
        $question['options'] = $opciones;
        $question['rules'] = $reglas;
        //$question['type'] = 3;
        //return $onlyconsonants;
        return view('admin.question.edit', [
            'question' => $question,
            'types' => $types,
        ]);
    }


    public function export()
    {
        //return 'hola';
        return Excel::download(new EntriesExport, 'users.xlsx');
    }

    /*public function editQuestion(Survey $survey){

        $types = Type::all();
        return view('admin.question.create', compact('survey','types'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param Survey $survey
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Survey $survey)
    {
        $this->authorize('admin.survey.edit', $survey);


        return view('admin.survey.edit', [
            'survey' => $survey,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSurvey $request
     * @param Survey $survey
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSurvey $request, Survey $survey)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Survey
        $survey->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/surveys'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/surveys');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySurvey $request
     * @param Survey $survey
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySurvey $request, Survey $survey)
    {
        $survey->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySurvey $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySurvey $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Survey::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
