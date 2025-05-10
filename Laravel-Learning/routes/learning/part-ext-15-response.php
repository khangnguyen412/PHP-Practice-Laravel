<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Lecture24\ControllerLecture24Ext;

/**********************************************************************/
/**********************************************************************/
/******************* Laravel 8.0 (bổ sung) ****************************/
/**********************************************************************/
/**********************************************************************/

/******************* Lecture 15: Response ****************************/
/**
 *  Khi một route, controller trả về giá trị là chuỗi thì Laravel sẽ tự động convert nó về dạng một HTTP response.
 */
Route::get('/test-response', [ControllerLecture24Ext::class, 'text_response']);