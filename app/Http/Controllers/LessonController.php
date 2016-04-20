<?php

namespace App\Http\Controllers;

use Acme\Transformers\LessonTransformer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Lesson;
use App\Http\Requests;

class LessonController extends ApiController
{
    /*
     * @var Acme\Transformer\LessonTransformer
     */
    protected $lessonTransformer;

    public function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
    }

    public function index()
    {
        $lesson = Lesson::all();

        return Response([
            'data' => $this->lessonTransformer->transformCollection($lesson->all()),
        ], 200);
    }

    public function show($id)
    {
        $lesson = Lesson::find($id);

        if(! $lesson) {
            return $this->respondNotFound('Lesson does not exist!');
        }

        return Response([
            'data' => $this->lessonTransformer->transform($lesson),
        ], 200);

    }

    private function transformCollection($lessons)
    {
        return array_map([$this, 'transform'], $lessons->toArray());
    }

    private function transform($lesson)
    {
        return [
            'title'     => $lesson['title'],
            'body'      => $lesson['body'],
            'active'    => (boolean) $lesson['isactive']
        ];
    }

}
