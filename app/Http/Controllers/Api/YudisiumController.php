<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\FotoProduk;
use App\Models\VideoProduk;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class YudisiumController extends Controller
{
    public function index()
    {
        $produk = DB::table('produk_inovasi')
                    ->join('kategori','produk_inovasi.id_Kategori','=','kategori.idKategoriProduk')
                    ->get();
        return $produk;
    }

    public function store(Request $request)
    {
        $randomId = round(time() / 20000) . $this->getRandomId(5);
        $validator = Validator::make(
            $request->all(),
            [
                'id_Kategori' => 'required',
                'id_mahasiswa' => 'required',
                'judul' => 'required',
                'gambaran_pesaing' => 'required',
                'segmen_customer' => 'required',
                'key_partner' => 'required',
                'nilai_tkt' => 'required',
                'uniques_selling_point' => 'required',
                // 'Video' => 'required',
                // 'Video.*' => 'required',
                'Photos' => 'required',
                'Photos.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png,PNG|max:2000'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $produk = Produk::create([
                'id_Produk' => $randomId,
                'id_Kategori' => $request->input('id_Kategori'),
                'id_mahasiswa' => $request->input('id_mahasiswa'),
                'judul' => $request->input('judul'),
                'gambaran_pesaing' => $request->input('gambaran_pesaing'),
                'segmen_customer' => $request->input('segmen_customer'),
                'key_partner' => $request->input('key_partner'),
                'nilai_tkt' => $request->input('nilai_tkt'),
                'uniques_selling_point' => $request->input('uniques_selling_point')
            ]);


            $files = [];
            foreach ($request->file('Photos') as $file) {
                if ($file->isValid()) {
                    $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                    $file->move('img/ProdukImage/', $filename);
                    $files[] = [
                        'idProdukInovasi' => $randomId,
                        'nama_foto' => $filename,
                    ];
                }
            }
            FotoProduk::insert($files);

            $videoFile = [];
            if ($request->hasfile('Video')) {
                $video = $request->file('Video');
                $videoname = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $video->getClientOriginalName());
                $video->move('img/ProdukVideo/', $videoname);
                $videoFile[] = [
                    'idProdukInovasi' => $randomId,
                    'keterangan' => $videoname,
                    'url' => $videoname,
                ];
            }
            VideoProduk::insert($videoFile);

            if ($produk) {
                return response()->json([
                    'success' => true,
                    'message' => 'Post Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Gagal Disimpan!',
                ], 401);
            }
        }
    }
    function getRandomId($n)
    {
        $characters = '012345678';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}
