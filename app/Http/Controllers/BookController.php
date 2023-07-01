<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index()
    {
        try{
            $books = Book ::all();

            return response()->json(['succes' => true, 'data' => $books]);
         } catch (Exception $e){
                Log:: error($e->getMessage() . ' line: ' . $e->getLine() . ' file ' . 
                $e->getFile());

                return response()->json([
                    'success' => false,
                    'message' => trans('Error de servidor'),
                    'info' => $e-> getMessage()
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }  

