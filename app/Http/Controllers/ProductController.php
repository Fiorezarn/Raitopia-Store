<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->Product = new Product();
    }
    public function index()
    {
        $data = [
            'product' => $this->Product->allData(),
        ];
        return view('adminlte.v_template', $data);
    }
    public function detail($id)
    {
        if (!$this->Product->detailData($id)) {
            abort(404);
        }
        $data = [
            'product'=> $this->Product->detailData($id),
        ];
        return view('adminlte.v_detailitem', $data);
    }

    public function add()
    {
        return view ('adminlte.v_additem');
    }

    public function insert()
    {
        Request()->validate([
            'id' => 'required|unique:products,id|min:1|max:6',
            'no_produk' => 'required|unique:products,id|min:1|max:6',
            'nama_produk' => 'required|max:100',
            'stock' => 'required|integer',
            'photo' => 'required|mimes:jpg,jpeg,png,webp|min:100',
            'deskripsi' => 'required',
            'harga' => 'required|integer',
        ],[
            'id.required' => 'wajib diisi !!',
            'id.unique' => 'id Sudah Ada !!',
            'id.min' => 'Min 1 Karakter',
            'id.max' => 'Max 6 Karakter'
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload photo
        $file = Request()-> photo;
        $fileName = Request()->nama_produk.'.'.$file->extension();
        $file->move(public_path('product-img'), $fileName);

        $data = [
            'id' => Request()->id,
            'no_produk' => Request()->no_produk,
            'nama_produk' => Request()->nama_produk,
            'stock' => Request()->stock,
            'photo' => $fileName,
            'deskripsi' => Request()->deskripsi,
            'harga' => Request()->harga,
        ];

        $this->Product->addData($data);
        return redirect()->route('dashboard')->with('pesan','Data Berhasil Di Tambahkan !!');
    }

    public function edit($id)
    {
        if (!$this->Product->detailData($id)) {
            abort(404);
        }
        $data = [
            'product'=> $this->Product->detailData($id),
        ];
        return view ('adminlte.v_edititem', $data);
    }
    public function update($id)
    {
        Request()->validate([
            'id' => 'required|min:1|max:6',
            'no_produk' => 'required|unique:products,id|min:1|max:6',
            'nama_produk' => 'required|max:100',
            'stock' => 'required|integer',
            'photo' => 'required|mimes:jpg,jpeg,png,webp|max:1000',
            'deskripsi' => 'required',
            'harga' => 'required|integer',
        ],[
            'id.required' => 'wajib diisi !!',
            'id.unique' => 'id Sudah Ada !!',
            'id.min' => 'Min 1 Karakter',
            'id.max' => 'Max 6 Karakter'
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->photo <> "") {
        //jika ingin ganti foto
        //upload photo
        $file = Request()-> photo;
        $fileName = Request()->namaproduk.'.'.$file->extension();
        $file->move(public_path('product-img'), $fileName);

        $data = [
            'no_produk' => Request()->no_produk,
            'nama_produk' => Request()->nama_produk,
            'stock' => Request()->stock,
            'photo' => $fileName,
            'deskripsi' => Request()->deskripsi,
            'harga' => Request()->harga,
        ];

        $this->Product->editData($id, $data);
        }else {
            //jika tidak ingin ganti foto
            $data = [
                'id' => Request()->id,
                'no_produk' => Request()->no_produk,
                'nama_produk' => Request()->nama_produk,
                'stock' => Request()->stock,
                'photo' => $fileName,
                'deskripsi' => Request()->deskripsi,
                'harga' => Request()->harga,
            ];
            $this->Product->editData($id, $data);
        }
        return redirect()->route('dashboard')->with('pesan','Data Berhasil Di Update !!');
    }
    // public function delete($id)
    // {
    //     //hapus foto
    //     $product = $this->Item->detailData($id);
    //     if ($product->photo <> "") {
    //         unlink(public_path('product-img') . '/' . $product->photo);
    //     }   
    //     $this->Item->deleteData($id);
    //     return redirect()->route('dataitem')->with('pesan','Data Berhasil Di Hapus !!');
    // }
}
