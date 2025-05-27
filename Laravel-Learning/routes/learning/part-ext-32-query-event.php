<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Lecture32\ControllerLecture32;

/******************* Lecture 31: Query Event ****************************/
/**
 *  Trong Eloquent, Laravel có cung cấp thêm các sự kiện để cho mọi người thực thi các logic khi cần. Các event này bao gồm:
 *  
 *  + retrieved     event này sẽ được bắn ra khi chúng ta thực thi get dữ liệu trong database.
 *  + creating      event này được bắn ra trong quá trình thực thi lưu trữ dữ liệu vào trong database.
 *  + created       event này được bắn ra sau khi lưu trữ dữ liệu vào trong database thành công.
 *  + updating      event này được bắn ra trong quá trình thực thi update dữ liệu vào trong database.
 *  + updated       event này được bắn ra sau khi update dữ liệu vào trong database thành công.
 *  + saving        event này được bắn ra trong quá trình thực thi lưu trữ hoặc update dữ liệu vào trong database, ngay cả khi dữ liệu của model không thay đổi.
 *  + saved         event này được bắn ra sau khi quá trình thực thi lưu trữ hoặc update dữ liệu vào trong database, ngay cả khi dữ liệu của model không thay đổi.
 *  + deleting	    event này được bắn ra trong quá trình thực thi xóa dữ liệu trong database.
 *  + deleted       event này được bắn ra sau khi xóa dữ liệu trong database thành công.
 *  + restoring	    event này được bắn ra trong quá trình restore dữ liệu trong database (soft delete).
 *  + restored	    event này được bắn ra sau khi restore dữ liệu trong database thành công (soft delete).
 *  + replicating   event này được bắn ra trong quá trình replicate model.
 */

Route::get('/test-event-eloquent', [ControllerLecture32::class, 'check_event']);
