<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected const HTTP_OK = 200;
    protected const HTTP_CREATED = 201;
    protected const HTTP_NOT_FOUND = 404;
    protected const HTTP_UNPROCESSABLE_ENTITY = 422;
    protected const HTTP_SERVER_ERROR = 500;
}
