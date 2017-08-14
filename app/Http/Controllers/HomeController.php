<?php

namespace App\Http\Controllers;

use App\Homework\ChangeString;
use App\Homework\ClearPar;
use App\Homework\CompleteRange;
use App\Http\Requests\changeStringPostRequest;
use App\Http\Requests\clearParPostRequest;
use App\Http\Requests\completeRangePostRequest;
use Mockery\Exception;

class HomeController extends Controller
{
    /**
     * Return string
     *
     * @param changeStringPostRequest $request
     * @return array
     */
    public function changeString(changeStringPostRequest $request)
    {
        $success = true;
        $text = 'Something is not right';

        try {
            $text = (new ChangeString($request->get('data')))->build();
        } catch (Exception $exception) {
            $success = false;
        }

        return ['text' => $text, 'success' => $success];
    }

    /**
     * Complete the range
     * 
     * @param completeRangePostRequest $request
     * @return array
     */
    public function completeRange(completeRangePostRequest $request)
    {
        $success = true;
        $text = 'Something is not right';

        try {
            $text = (new CompleteRange(explode(',', $request->get('data'))))->build();
        } catch (Exception $exception) {
            $success = false;
        }

        return ['text' => $text, 'success' => $success];
    }

    public function ClearPar(clearParPostRequest $request)
    {
        $success = true;
        $text = 'Something is not right';

        try {
            $text = (new ClearPar($request->get('data')))->build();
        } catch (Exception $exception) {
            $success = false;
        }

        return ['text' => $text, 'success' => $success];
    }
}
