<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bangunan;
use App\Models\SaranaBangunan;
use App\Http\Requests\CiptaKaryaLamaRequest;
use App\Http\Requests\CiptaKaryaSatuRequest;
use App\Http\Requests\CiptaKaryaDuaRequest;
use App\Http\Requests\CiptaKaryaTigaRequest;
use App\Http\Requests\CiptaKaryaEmpatRequest;
use App\Http\Requests\CiptaKaryaLimaRequest;
use App\Http\Requests\CiptaKaryaEnamRequest;
use App\Http\Requests\CiptaKaryaTujuhRequest;
use App\Http\Requests\CiptaKaryaRekomendasiRequest;
use App\Http\Requests\CiptaKaryaCatatanRequest;
use DB;
use Exception;
use App\Helpers\FileUpload;
use App\Models\BangunanUpload;
use Storage;

class CiptaKaryaLamaController extends Controller
{
    use FileUpload;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Bangunan::where('jenis', 'lama')->latest()->paginate(10);

        return view('ciptakarya.lama.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ciptakarya.lama.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CiptaKaryaLamaRequest $request)
    {
        DB::beginTransaction();
        try {
            $item = Bangunan::create([
                'jenis' => 'lama',
                'nama_bangunan' => $request->nama_bangunan,
                'jenis_bangunan' => $request->jenis_bangunan,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
                'tahun_bangun' => $request->tahun_bangun,
                'lat_long' => $request->lat_long,
                'koordinat_dms' => $request->koordinat_dms,
                'koordinat_utm' => $request->koordinat_utm,
            ]);

            if ($request->hasFile('foto_bangunan')) {
                $foto_bangunan = $this->storeFile($request->file('foto_bangunan'), "foto_bangunan");

                BangunanUpload::create([
                    'nama' => 'foto_bangunan',
                    'file' => $foto_bangunan,
                    'bangunan_id' => $item->id
                ]);
            }

            SaranaBangunan::create([
                'bangunan_id' => $item->id
            ]);

            DB::commit();

            session()->flash('flash', [
                'message' => 'Data Berhasil Ditambah',
                'type' => 'success'
            ]);

            return redirect()->route('ciptakaryalama.index');
        } catch (Exception $e) {
            DB::rollBack();

            session()->flash('flash', [
                'message' => $e->getMessage(),
                'type' => 'danger'
            ]);
        }

        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Bangunan::with(['saranaBangunan', 'bangunanUpload'])->find($id);

        if ($item === null) {
            return redirect()->route('ciptakaryalama.index');
        }

        $total_ketentuan = [
            'kdb' => $this->kdb($item),
            'klb' => $this->klb($item),
            'kdh' => $this->kdh($item),
            'ktb' => 0
        ];

        $uploads = $item->bangunanUpload;
        $foto_bangunan = $uploads->filter(function ($it) {
            return $it->nama === 'foto_bangunan';
        })->first();

        $file_surat_kepemilikan_bangunan = $uploads->filter(function ($it) {
            return $it->nama === 'file_surat_kepemilikan_bangunan';
        })->first();

        $file_gambar_ded = $uploads->filter(function ($it) {
            return $it->nama === 'file_gambar_ded';
        })->first();

        $file_imb = $uploads->filter(function ($it) {
            return $it->nama === 'file_imb';
        })->first();

        return view('ciptakarya.lama.show')->with([
            'item' => $item,
            'total_ketentuan' => $total_ketentuan,
            'foto_bangunan' => $foto_bangunan,
            'file_surat_kepemilikan_bangunan' => $file_surat_kepemilikan_bangunan,
            'file_gambar_ded' => $file_gambar_ded,
            'file_imb' => $file_imb
        ]);
    }

    public function kdb ($item) {
        try {
            if (($item->luas_lahan_terbuka ?? 0) > 0) {
                return (($item->luas_lantai_dasar ?? 0) - ($item->lt_proyeksi ?? 0)) / ($item->luas_lahan_terbuka ?? 0);
            }
        } catch (\DivisionByZeroError $e) {
        }

        return 0;
    }

    public function klb ($item) {
        try {
            return (($item->luas_seluruh_lantai ?? 0) / ($item->luas_lahan_terbuka ?? 0));
        } catch (\DivisionByZeroError $e) {
            return 0;
        }
    }

    public function kdh ($item) {
        try {
            return (($item->luas_lahan_terbuka ?? 0) / ($item->luas_lahan_tanah_perpetakan ?? 0));
        } catch (\DivisionByZeroError $e) {
            return 0;
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
        
    }

    public function editSatu ($id) {
        $item = Bangunan::find($id);

        if ($item === null) {
            return redirect()->route('ciptakaryalama.show', $id);
        }

        return view('ciptakarya.lama.edit_satu')->with([
            'item' => $item
        ]);
    }

    public function editDua ($id) {
        $item = Bangunan::find($id);

        if ($item === null) {
            return redirect()->route('ciptakaryalama.show', $id);
        }

        return view('ciptakarya.lama.edit_dua')->with([
            'item' => $item
        ]);
    }

    public function editTiga ($id) {
        $item = Bangunan::find($id);

        if ($item === null) {
            return redirect()->route('ciptakaryalama.show', $id);
        }

        return view('ciptakarya.lama.edit_tiga')->with([
            'item' => $item
        ]);
    }

    public function editEmpat ($id) {
        $item = Bangunan::find($id);

        if ($item === null) {
            return redirect()->route('ciptakaryalama.show', $id);
        }

        return view('ciptakarya.lama.edit_empat')->with([
            'item' => $item
        ]);
    }

    public function editLima ($id) {
        $item = Bangunan::find($id);

        if ($item === null) {
            return redirect()->route('ciptakaryalama.show', $id);
        }

        return view('ciptakarya.lama.edit_lima')->with([
            'item' => $item
        ]);
    }

    public function editEnam ($id) {
        $bangunan = Bangunan::with('saranaBangunan')->find($id);

        if ($bangunan === null) {
            return redirect()->route('ciptakaryalama.show', $id);
        }

        $item = $bangunan->saranaBangunan;

        return view('ciptakarya.lama.edit_enam')->with([
            'bangunan' => $bangunan,
            'item' => $item
        ]);
    }
    
    public function editTujuh ($id) {
        $item = Bangunan::find($id);

        if ($item === null) {
            return redirect()->route('ciptakaryalama.show', $id);
        }

        return view('ciptakarya.lama.edit_tujuh')->with([
            'item' => $item
        ]);
    }

    public function editCatatan ($id) {
        $item = Bangunan::find($id);

        if ($item === null) {
            return redirect()->route('ciptakaryalama.show', $id);
        }

        return view('ciptakarya.lama.edit_catatan')->with([
            'item' => $item
        ]);
    }

    public function editRekomendasi ($id) {
        $item = Bangunan::find($id);

        if ($item === null) {
            return redirect()->route('ciptakaryalama.show', $id);
        }

        return view('ciptakarya.lama.edit_rekomendasi')->with([
            'item' => $item
        ]);
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
        //
    }

    public function updateSatu (CiptaKaryaSatuRequest $request, $id) {
        DB::beginTransaction();
        try {
            $item = Bangunan::find($id);

            if ($item === null) {
                session()->flash('flash', [
                    'message' => 'Data Tidak Ditemukan',
                    'type' => 'danger'
                ]);

                return redirect()->back();
            }

            $item->update([
                'nama_bangunan' => $request->nama_bangunan,
                'jenis_bangunan' => $request->jenis_bangunan,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
                'tahun_bangun' => $request->tahun_bangun,
                'lat_long' => $request->lat_long,
                'koordinat_dms' => $request->koordinat_dms,
                'koordinat_utm' => $request->koordinat_utm,
            ]);

            if ($request->hasFile('foto_bangunan')) {
                $uploads = $item->bangunanUpload;
                $foto_bangunan_upload = $uploads->filter(function ($it) {
                    return $it->nama === 'foto_bangunan';
                })->first();

                if ($foto_bangunan_upload !== null) {
                    Storage::disk('public_uploads')->delete('foto_bangunan/'.$foto_bangunan_upload->file);
                }

                $foto_bangunan = $this->storeFile($request->file('foto_bangunan'), "foto_bangunan");

                if ($foto_bangunan_upload !== null) {
                    $foto_bangunan_upload->update([
                        'file' => $foto_bangunan
                    ]);
                } else {
                    BangunanUpload::create([
                        'nama' => 'foto_bangunan',
                        'file' => $foto_bangunan,
                        'bangunan_id' => $item->id
                    ]);
                }
            }

            DB::commit();

            session()->flash('flash', [
                'message' => 'Data Berhasil Diubah',
                'type' => 'success'
            ]);

            return redirect()->route('ciptakaryalama.show', $id);
        } catch (Exception $e) {
            DB::rollBack();

            session()->flash('flash', [
                'message' => $e->getMessage(),
                'type' => 'danger'
            ]);
        }

        return redirect()->back()->withInput();
    }

    public function updateDua (CiptaKaryaDuaRequest $request, $id) {
        DB::beginTransaction();
        try {
            $item = Bangunan::find($id);

            if ($item === null) {
                session()->flash('flash', [
                    'message' => 'Data Tidak Ditemukan',
                    'type' => 'danger'
                ]);

                return redirect()->back();
            }

            $item->update([
                'skb' => $request->skb,
                'dokumen_teknis' => $request->dokumen_teknis,
                'gambar_ded' => $request->gambar_ded,
                'imb' => $request->imb,
                'slf' => $request->slf,
                'spakb' => $request->spakb,
                'pbb' => $request->pbb,
                'jenis_surat_tanah' => $request->jenis_surat_tanah,
                'nomor_surat_tanah' => $request->nomor_surat_tanah,
            ]);

            if ($request->hasFile('file_surat_kepemilikan_bangunan')) {
                $uploads = $item->bangunanUpload;
                $file_surat_kepemilikan_bangunan_upload = $uploads->filter(function ($it) {
                    return $it->nama === 'file_surat_kepemilikan_bangunan';
                })->first();

                if ($file_surat_kepemilikan_bangunan_upload !== null) {
                    Storage::disk('public_uploads')->delete('file_surat_kepemilikan_bangunan/'.$file_surat_kepemilikan_bangunan_upload->file);
                }

                $file_surat_kepemilikan_bangunan = $this->storeFile($request->file('file_surat_kepemilikan_bangunan'), "file_surat_kepemilikan_bangunan");

                if ($file_surat_kepemilikan_bangunan_upload !== null) {
                    $file_surat_kepemilikan_bangunan_upload->update([
                        'file' => $file_surat_kepemilikan_bangunan
                    ]);
                } else {
                    BangunanUpload::create([
                        'nama' => 'file_surat_kepemilikan_bangunan',
                        'file' => $file_surat_kepemilikan_bangunan,
                        'bangunan_id' => $item->id
                    ]);
                }
            }

            if ($request->hasFile('file_gambar_ded')) {
                $uploads = $item->bangunanUpload;
                $file_gambar_ded_upload = $uploads->filter(function ($it) {
                    return $it->nama === 'file_gambar_ded';
                })->first();

                if ($file_gambar_ded_upload !== null) {
                    Storage::disk('public_uploads')->delete('file_gambar_ded/'.$file_gambar_ded_upload->file);
                }

                $file_gambar_ded = $this->storeFile($request->file('file_gambar_ded'), "file_gambar_ded");

                if ($file_gambar_ded_upload !== null) {
                    $file_gambar_ded_upload->update([
                        'file' => $file_gambar_ded
                    ]);
                } else {
                    BangunanUpload::create([
                        'nama' => 'file_gambar_ded',
                        'file' => $file_gambar_ded,
                        'bangunan_id' => $item->id
                    ]);
                }
            }

            if ($request->hasFile('file_imb')) {
                $uploads = $item->bangunanUpload;
                $file_imb_upload = $uploads->filter(function ($it) {
                    return $it->nama === 'file_imb';
                })->first();

                if ($file_imb_upload !== null) {
                    Storage::disk('public_uploads')->delete('file_imb/'.$file_imb_upload->file);
                }

                $file_imb = $this->storeFile($request->file('file_imb'), "file_imb");

                if ($file_imb_upload !== null) {
                    $file_imb_upload->update([
                        'file' => $file_imb
                    ]);
                } else {
                    BangunanUpload::create([
                        'nama' => 'file_imb',
                        'file' => $file_imb,
                        'bangunan_id' => $item->id
                    ]);
                }
            }

            DB::commit();

            session()->flash('flash', [
                'message' => 'Data Berhasil Diubah',
                'type' => 'success'
            ]);

            return redirect()->route('ciptakaryalama.show', $id);
        } catch (Exception $e) {
            DB::rollBack();

            session()->flash('flash', [
                'message' => $e->getMessage(),
                'type' => 'danger'
            ]);
        }

        return redirect()->back()->withInput();
    }

    public function updateTiga (CiptaKaryaTigaRequest $request, $id) {
        DB::beginTransaction();
        try {
            $item = Bangunan::find($id);

            if ($item === null) {
                session()->flash('flash', [
                    'message' => 'Data Tidak Ditemukan',
                    'type' => 'danger'
                ]);

                return redirect()->back();
            }

            $item->update([
                'jarak_depan' => $request->jarak_depan,
                'jarak_belakang' => $request->jarak_belakang,
                'jarak_kiri' => $request->jarak_kiri,
                'jarak_kanan' => $request->jarak_kanan,
                'keterangan_jarak' => $request->keterangan_jarak,
                'tinggi_ll' => $request->tinggi_ll,
                'keterangan_ll' => $request->keterangan_ll,
                'tinggi_bangunan' => $request->tinggi_bangunan,
                'keterangan_tb' => $request->keterangan_tb,
                'status_pagar' => $request->status_pagar,
                'pl_pagar' => $request->pl_pagar,
                'kondisi_pagar' => $request->kondisi_pagar,
                'keterangan_pagar' => $request->keterangan_pagar,
            ]);

            DB::commit();

            session()->flash('flash', [
                'message' => 'Data Berhasil Diubah',
                'type' => 'success'
            ]);

            return redirect()->route('ciptakaryalama.show', $id);
        } catch (Exception $e) {
            DB::rollBack();

            session()->flash('flash', [
                'message' => $e->getMessage(),
                'type' => 'danger'
            ]);
        }

        return redirect()->back()->withInput();
    }

    public function updateEmpat (CiptaKaryaEmpatRequest $request, $id) {
        DB::beginTransaction();
        try {
            $item = Bangunan::find($id);

            if ($item === null) {
                session()->flash('flash', [
                    'message' => 'Data Tidak Ditemukan',
                    'type' => 'danger'
                ]);

                return redirect()->back();
            }

            $item->update([
                'parkir_kendaraan_unit' => $request->parkir_kendaraan_unit,
                'parkir_kendaraan_pl' => $request->parkir_kendaraan_pl,
                'parkir_kendaraan_kondisi' => $request->parkir_kendaraan_kondisi,
                'parkir_kendaraan_keterangan' => $request->parkir_kendaraan_keterangan,
                'drainase_unit' => $request->drainase_unit,
                'drainase_kondisi' => $request->drainase_kondisi,
                'drainase_keterangan' => $request->drainase_keterangan,
                'sampah_unit' => $request->sampah_unit,
                'sampah_pl' => $request->sampah_pl,
                'sampah_kondisi' => $request->sampah_kondisi,
                'sampah_keterangan' => $request->sampah_keterangan,
            ]);

            DB::commit();

            session()->flash('flash', [
                'message' => 'Data Berhasil Diubah',
                'type' => 'success'
            ]);

            return redirect()->route('ciptakaryalama.show', $id);
        } catch (Exception $e) {
            DB::rollBack();

            session()->flash('flash', [
                'message' => $e->getMessage(),
                'type' => 'danger'
            ]);
        }

        return redirect()->back()->withInput();
    }

    public function updateLima (CiptaKaryaLimaRequest $request, $id) {
        DB::beginTransaction();
        try {
            $item = Bangunan::find($id);

            if ($item === null) {
                session()->flash('flash', [
                    'message' => 'Data Tidak Ditemukan',
                    'type' => 'danger'
                ]);

                return redirect()->back();
            }

            $item->update([
                'jenis_rangka_atap' => $request->jenis_rangka_atap,
                'pl_rangka_atap' => $request->pl_rangka_atap,
                'kondisi_rangka_atap' => $request->kondisi_rangka_atap,
                'keterangan_rangka_atap' => $request->keterangan_rangka_atap,
                'jenis_kemiringan_a' => $request->jenis_kemiringan_a,
                'kondisi_kemiringan_a' => $request->kondisi_kemiringan_a,
                'keterangan_kemiringan_a' => $request->keterangan_kemiringan_a,
            ]);

            DB::commit();

            session()->flash('flash', [
                'message' => 'Data Berhasil Diubah',
                'type' => 'success'
            ]);

            return redirect()->route('ciptakaryalama.show', $id);
        } catch (Exception $e) {
            DB::rollBack();

            session()->flash('flash', [
                'message' => $e->getMessage(),
                'type' => 'danger'
            ]);
        }

        return redirect()->back()->withInput();
    }

    public function updateEnam (CiptaKaryaEnamRequest $request, $id) {
        DB::beginTransaction();
        try {
            $item = SaranaBangunan::firstOrCreate([
                'bangunan_id' => $id
            ]);

            if ($item === null) {
                session()->flash('flash', [
                    'message' => 'Data Tidak Ditemukan',
                    'type' => 'danger'
                ]);

                return redirect()->back();
            }

            $item->update([
                'kondisi_air' => $request->kondisi_air,
                'keterangan_air' => $request->keterangan_air,
                'kondisi_air_hujan' => $request->kondisi_air_hujan,
                'keterangan_air_hujan' => $request->keterangan_air_hujan,
                'kondisi_air_kotor' => $request->kondisi_air_kotor,
                'keterangan_air_kotor' => $request->keterangan_air_kotor,
                'kondisi_pembuangan' => $request->kondisi_pembuangan,
                'keterangan_pembuangan' => $request->keterangan_pembuangan,
                'pl_septictank' => $request->pl_septictank,
                'kondisi_septictank' => $request->kondisi_septictank,
                'keterangan_septictank' => $request->keterangan_septictank,
                'pln_listrik' => $request->pln_listrik,
                'generator_listrik' => $request->generator_listrik,
                'kondisi_listrik' => $request->kondisi_listrik,
                'keterangan_listrik' => $request->keterangan_listrik,
                'jenis_udara' => $request->jenis_udara,
                'kondisi_udara' => $request->kondisi_udara,
                'keterangan_udara' => $request->keterangan_udara,
            ]);

            DB::commit();

            session()->flash('flash', [
                'message' => 'Data Berhasil Diubah',
                'type' => 'success'
            ]);

            return redirect()->route('ciptakaryalama.show', $id);
        } catch (Exception $e) {
            DB::rollBack();

            session()->flash('flash', [
                'message' => $e->getMessage(),
                'type' => 'danger'
            ]);
        }

        return redirect()->back()->withInput();
    }

    public function updateTujuh (CiptaKaryaTujuhRequest $request, $id) {
        DB::beginTransaction();
        try {
            $item = Bangunan::find($id);

            if ($item === null) {
                session()->flash('flash', [
                    'message' => 'Data Tidak Ditemukan',
                    'type' => 'danger'
                ]);

                return redirect()->back();
            }

            $item->update([
                'luas_lantai_dasar' => $request->luas_lantai_dasar,
                'luas_lahan_tanah_perpetakan' => $request->luas_lahan_tanah_perpetakan,
                'luas_seluruh_lantai' => $request->luas_seluruh_lantai,
                'luas_seluruh_ruang_terbuka' => $request->luas_seluruh_ruang_terbuka,
                'luas_tapak_basement' => $request->luas_tapak_basement,
                'lt_proyeksi' => $request->lt_proyeksi,
                'luas_lahan_terbuka' => $request->luas_lahan_terbuka,
            ]);

            DB::commit();

            session()->flash('flash', [
                'message' => 'Data Berhasil Diubah',
                'type' => 'success'
            ]);

            return redirect()->route('ciptakaryalama.show', $id);
        } catch (Exception $e) {
            DB::rollBack();

            session()->flash('flash', [
                'message' => $e->getMessage(),
                'type' => 'danger'
            ]);
        }

        return redirect()->back()->withInput();
    }

    public function updateRekomendasi (CiptaKaryaRekomendasiRequest $request, $id) {
        DB::beginTransaction();
        try {
            $item = Bangunan::find($id);

            if ($item === null) {
                session()->flash('flash', [
                    'message' => 'Data Tidak Ditemukan',
                    'type' => 'danger'
                ]);

                return redirect()->back();
            }

            $item->update([
                'rekomendasi' => $request->rekomendasi,
                'klasifikasi' => $request->klasifikasi
            ]);

            DB::commit();

            session()->flash('flash', [
                'message' => 'Data Berhasil Diubah',
                'type' => 'success'
            ]);

            return redirect()->route('ciptakaryalama.show', $id);
        } catch (Exception $e) {
            DB::rollBack();

            session()->flash('flash', [
                'message' => $e->getMessage(),
                'type' => 'danger'
            ]);
        }

        return redirect()->back()->withInput();
    }

    public function updateCatatan (CiptaKaryaCatatanRequest $request, $id) {
        DB::beginTransaction();
        try {
            $item = Bangunan::find($id);

            if ($item === null) {
                session()->flash('flash', [
                    'message' => 'Data Tidak Ditemukan',
                    'type' => 'danger'
                ]);

                return redirect()->back();
            }

            $item->update([
                'catatan' => $request->catatan
            ]);

            DB::commit();

            session()->flash('flash', [
                'message' => 'Data Berhasil Diubah',
                'type' => 'success'
            ]);

            return redirect()->route('ciptakaryalama.show', $id);
        } catch (Exception $e) {
            DB::rollBack();

            session()->flash('flash', [
                'message' => $e->getMessage(),
                'type' => 'danger'
            ]);
        }

        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $item = Bangunan::find($id);

            if ($item === null) {
                session()->flash('flash', [
                    'message' => 'Data Tidak Ditemukan',
                    'type' => 'danger'
                ]);

                return redirect()->back();
            }

            $item->saranaBangunan()->delete();
            $item->ciptaKarya()->delete();

            foreach ($item->bangunanUpload as $bangunanUpload) {
                Storage::disk('public_uploads')->delete($bangunanUpload->name .'/'. $bangunanUpload->file);
                $bangunanUpload->delete();
            }

            $item->delete();

            DB::commit();

            session()->flash('flash', [
                'message' => 'Data Berhasil Dihapus',
                'type' => 'success'
            ]);

            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();

            session()->flash('flash', [
                'message' => $e->getMessage(),
                'type' => 'danger'
            ]);
        }

        return redirect()->back();
    }

    public function print ($id)
    {
        try {
            $item = Bangunan::find($id);

            if ($item === null) {
                return 'Data Tidak Ditemukan';
            }

            $view = [
                'item' => $item
            ];
    
            return view('ciptakarya.lama.print')->with($view);
        } catch (Exception $e) {
            return 'Proses Print Gagal';
        }
    }
}
