<?php
function sendResponse($status, $data = [], $message = NULL, $code = NULL)
{
    $code = is_null($code) ? ($status ? 200 : 400) : $code;
    $message = is_null($message) ? ($status ? 'Operation successfull' : 'Something went wrong, please try again') : $message;
    $response = array(
        'status' => $status,
        'data' => $data,
        'message' => $message
    );
    return response()->json($response, $code);
}

