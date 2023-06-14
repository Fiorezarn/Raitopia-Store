<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->Item = new Item();
    }
    public function index()
    {
        $data = [
            'product' => $this->Item->where('category', 'sneakers')->get(),
            'totalproduct' => $this->Item->where('category', 'sneakers')->count(),
        ];
        return view('adminlte.v_dataitem', $data);
    }
    public function detail($id)
    {
        if (!$this->Item->detailData($id)) {
            abort(404);
        }
        $data = [
            'product'=> $this->Item->detailData($id),
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
            'id' => 'required|unique:tbl_produk,id|min:1|max:6',
            'no_produk' => 'required|unique:tbl_produk,id|min:1|max:6',
            'namaproduk' => 'required|max:100',
            'size' => 'required',
            'stock' => 'required|integer',
            'harga' => 'required|integer',
            'category' => 'required|max:25',
            'photo' => 'required|mimes:jpg,jpeg,png,webp|max:100',
        ],[
            'id.required' => 'wajib diisi !!',
            'id.unique' => 'id Sudah Ada !!',
            'id.min' => 'Min 1 Karakter',
            'id.max' => 'Max 6 Karakter'
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload photo
        $file = Request()-> photo;
        $fileName = Request()->namaproduk.'.'.$file->extension();
        $file->move(public_path('foto_produk'), $fileName);

        $data = [
            'id' => Request()->id,
            'no_produk' => Request()->no_produk,
            'namaproduk' => Request()->namaproduk,
            'size' => Request()->size,
            'stock' => Request()->stock,
            'harga' => Request()->harga,
            'category' => Request()->category,
            'photo' => $fileName,
        ];

        $this->Item->addData($data);
        return redirect()->route('dataitem')->with('pesan','Data Berhasil Di Tambahkan !!');
    }
    public function edit($id)
    {
        if (!$this->Item->detailData($id)) {
            abort(404);
        }
        $data = [
            'product'=> $this->Item->detailData($id),
        ];
        return view ('adminlte.v_edititem', $data);
    }
    public function update($id)
    {
        Request()->validate([
            'id' => 'required|min:1|max:6',
            'no_produk' => 'required|unique:tbl_produk,id|min:1|max:6',
            'namaproduk' => 'required|max:100',
            'size' => 'required',
            'stock' => 'required|integer',
            'harga' => 'required|integer',
            'category' => 'required|max:25',
            'photo' => 'mimes:jpg,jpeg,png,webp|max:100',
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
        $file->move(public_path('foto_produk'), $fileName);

        $data = [
            'id' => Request()->id,
            'no_produk' => Request()->no_produk,
            'namaproduk' => Request()->namaproduk,
            'size' => Request()->size,
            'stock' => Request()->stock,
            'harga' => Request()->harga,
            'category' => Request()->category,
            'photo' => $fileName,
        ];

        $this->Item->editData($id, $data);
        }else {
            //jika tidak ingin ganti foto
            $data = [
                'id' => Request()->id,
                'no_produk' => Request()->no_produk,
                'namaproduk' => Request()->namaproduk,
                'size' => Request()->size,
                'stock' => Request()->stock,
                'harga' => Request()->harga,
                'category' => Request()->category,
            ];
            $this->Item->editData($id, $data);
        }
        return redirect()->route('dataitem')->with('pesan','Data Berhasil Di Update !!');
    }
    public function delete($id)
    {
        //hapus foto
        $product = $this->Item->detailData($id);
        if ($product->photo <> "") {
            unlink(public_path('foto_produk') . '/' . $product->photo);
        }   
        $this->Item->deleteData($id);
        return redirect()->route('dataitem')->with('pesan','Data Berhasil Di Hapus !!');
    }
}
