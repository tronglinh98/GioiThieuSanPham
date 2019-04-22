<?php

namespace App\Http\Controllers;

use App\loai_san_phamModel;
use App\san_phamModel;
use Illuminate\Http\Request;

class san_phamController extends Controller
{
    public function index(){
        $san_pham = san_phamModel::with('loai_san_pham')->get();
        return view('san_pham')->with('san_pham',$san_pham);
    }
    public function insert(){
        $category = loai_san_phamModel::all();
        return view('insert', compact('category'));
    }
    public function save(Request $rq){
        $san_pham = new san_phamModel();

        if ($rq->hasFile('hinh_anh')) {
            //Hàm kiểm tra dữ liệu

            $this->validate($rq,
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'hinh_anh' => 'mimes:jpg,jpeg,png,gif,bmp|max:2048',
                ],
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'hinh_anh.mimes' => 'Chỉ chấp nhận hình anh với đuôi .jpg .jpeg .png .gif .bmp',
                    'hinh_anh.max' => 'Hình anh giới hạn dung lượng không quá 2M',
                ]
            );

            //Lưu hình ảnh vào thư mục public/images/
            $hinh_anh = $rq->file('hinh_anh');
            $ten_anh_moi = $hinh_anh->getClientOriginalName();
            $destinationPath = public_path('/images');
            $hinh_anh->move($destinationPath, $ten_anh_moi);

            $san_pham->hinh_anh = $ten_anh_moi;
        }

        $san_pham->ten_san_pham = $rq->ten_san_pham;
        $san_pham->id_loai_san_pham = $rq->loai_san_pham;
        $san_pham->save();
        return redirect() -> Route('san_pham');
    }
    public function edit($id){
        $s = san_phamModel::find($id)->toArray();
        $category = loai_san_phamModel::all();
        return view('Edit',compact('category','s'))->with('loai_san_pham', $category);
    }
    public function save_edit(Request $rq){
        $san_pham = san_phamModel::find($rq->id);
        if ($rq->hasFile('hinh_anh')) {
            //Hàm kiểm tra dữ liệu

            $this->validate($rq,
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'hinh_anh' => 'mimes:jpg,jpeg,png,gif,bmp|max:2048',
                ],
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'hinh_anh.mimes' => 'Chỉ chấp nhận hình anh với đuôi .jpg .jpeg .png .gif .bmp',
                    'hinh_anh.max' => 'Hình anh giới hạn dung lượng không quá 2M',
                ]
            );

            //Lưu hình ảnh vào thư mục public/images/
            $hinh_anh = $rq->file('hinh_anh');
            $ten_anh_moi = $hinh_anh->getClientOriginalName();
            $destinationPath = public_path('/images');
            $hinh_anh->move($destinationPath, $ten_anh_moi);

            $san_pham->hinh_anh = $ten_anh_moi;
        }
        $san_pham->ten_san_pham = $rq->ten_san_pham;
        $san_pham->id_loai_san_pham = $rq->loai_san_pham;
        $san_pham->save();
        return redirect() -> Route('san_pham');
    }
    public function delete($id){
        san_phamModel::find($id)->delete();
        return redirect() -> Route('san_pham');
    }
    public function search(Request $rq){
        $search = $rq -> search;
        $san_pham = san_phamModel::where('ten_san_pham','like',"%$search%")->get();
        return view('Search')->with('san_pham',$san_pham);
    }

}
