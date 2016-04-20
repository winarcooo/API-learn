<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Created by PhpStorm.
 * User: winarkoandy
 * Date: 11/04/16
 * Time: 17:44
 */
class ApiController extends BaseController
{
    protected $statusCode = 200;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function RespondNotFound($message = "Not Found!")
    {
        return $this->setStatusCode()->respondWithError();

        return $this->respond([
            'error' => [
                'message'       => $message,
                'status_code'   => 404
            ]
        ]);
    }

    public function respond($data, $headers = [])
    {
        return Response($data, $this->getStatusCode(), $headers);
    }
}