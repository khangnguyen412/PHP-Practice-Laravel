<?php

namespace App\Http\Controllers\lecture04;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Sau khi dùng lệnh tạo controller, file này sẽ được tạo ra vào kèm các hàm sau:
 * - index(): Hiển thị một danh sách.
 * - create(): Thêm mới.
 * - store(): Lưu mới.
 * - show($id): Hiển thị một dữ liệu theo tham số truyền vào.
 * - edit($id): Sửa một dữ liệu theo tham số truyền vào.
 * - update($id):Cập nhật một dữ liệu theo tham số truyền vào.
 * - destroy($id):Xóa một dữ liệu theo tham số truyền vào.
 */

class controllerLecture04 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // gọi url /getRouteResource
        return 'got method index() from route::resource';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // gọi url /getRouteResource/create
        return 'got method create() from route::resource';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // gọi url /getRouteResource/store
        return 'got method store() from route::resource';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $param = null)
    {
        // gọi url /getRouteResource/{something}
        if ( isset($param) ){
            return "got method show() have arg id: $id and arg param: $param from route::resource";
        }else{
            return "got method show() have parameter $id from route::resource";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // gọi url /getRouteResource/{something}/edit
        return "got method edit() have parameter $id from route::resource";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // gọi url /getRouteResource/{something}
        return "got method update() have parameter $id from route::resource";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // gọi url /getRouteResource/{something}
        return "got method destroy() have parameter $id from route::resource";
    }

    public function testGroup($param = null)
    {
        if( $param != null ){
            return "test route group thành công và có đối số $param";
        }else return view("lecture04.testRouteGroup");
    }
}
