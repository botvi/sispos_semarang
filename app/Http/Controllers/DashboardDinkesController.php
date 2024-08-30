<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BulananIbuHamil;
use App\Models\BulananAnakDanRemaja;
use App\Models\BulananDewasaDanLansia;
use App\Models\BulananBalita;
use Illuminate\Support\Facades\Auth;
class DashboardDinkesController extends Controller
{

    public function index()
    {
        // Ambil data grafik per bulan untuk semua kategori
        $dataPerBulanAnakRemaja = BulananAnakDanRemaja::selectRaw('
        MONTH(tanggal_pelaksanaan) as month, 
        YEAR(tanggal_pelaksanaan) as year,
        SUM(kunjungan_anak_remaja) as total_kunjungan_anak_remaja,
        SUM(imt_kurus) as total_imt_kurus,
        SUM(imt_gemuk) as total_imt_gemuk,
        SUM(imt_obesitas) as total_imt_obesitas,
        SUM(imt_normal) as total_imt_normal,
        SUM(td_rendah) as total_td_rendah,
        SUM(td_tinggi) as total_td_tinggi,
        SUM(td_normal) as total_td_normal,
        SUM(gula_darah_rendah) as total_gula_darah_rendah,
        SUM(gula_darah_tinggi) as total_gula_darah_tinggi,
        SUM(remaja_putri_anemia) as total_remaja_putri_anemia,
        SUM(tidak_anemia) as total_tidak_anemia,
        SUM(risiko_tbc) as total_risiko_tbc,
        SUM(masalah_kesehatan) as total_masalah_kesehatan
    ')
    ->groupBy('month', 'year')
    ->orderBy('year', 'asc')
    ->orderBy('month', 'asc')
    ->get();


        $dataPerBulanBalita = BulananBalita::selectRaw('
                MONTH(tanggal_pelaksanaan) as month, 
                YEAR(tanggal_pelaksanaan) as year,
                SUM(jumlah_sasaran_balita) as total_sasaran,
                SUM(jumlah_balita_kms) as total_kms,
                SUM(jumlah_balita_datang) as total_datang,
                SUM(jumlah_balita_naik_timbangan) as total_naik_timbangan
            ')
            ->groupBy('month', 'year')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $dataPerBulanDewasaLansia = BulananDewasaDanLansia::selectRaw('
                MONTH(tanggal_pelaksanaan) as month, 
                YEAR(tanggal_pelaksanaan) as year,
                SUM(jumlah_usia_dewasa_risiko_ppok) as total_risiko_ppok,
                SUM(jumlah_usia_dewasa_gangguan_jiwa) as total_gangguan_jiwa,
                SUM(jumlah_lansia_skrining_skl) as total_skrining_skl,
                SUM(jumlah_lansia_dirujuk_puskesmas) as total_dirujuk_puskesmas
            ')
            ->groupBy('month', 'year')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $dataPerBulanIbuHamil = BulananIbuHamil::selectRaw('
                MONTH(tanggal_pelaksanaan) as month, 
                YEAR(tanggal_pelaksanaan) as year,
                SUM(jumlah_ibu_hamil_nifas_menyusui) as total_nifas_menyusui,
                SUM(jumlah_ibu_hamil_bb_garis_merah) as total_bb_garis_merah,
                SUM(jumlah_ibu_hamil_lila) as total_lila,
                SUM(jumlah_ibu_hamil_risiko_tbc) as total_risiko_tbc,
                SUM(jumlah_ibu_hamil_mendapat_ttd) as total_mendapat_ttd,
                SUM(jumlah_ibu_hamil_makanan_tambahan_kek) as total_makanan_tambahan_kek,
                SUM(jumlah_ibu_hamil_ikut_kelas) as total_ikut_kelas,
                SUM(jumlah_ibu_hamil_dirujuk_ke_puskesmas) as total_dirujuk_ke_puskesmas
            ')
            ->groupBy('month', 'year')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Create arrays for chart labels and data
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        // Initialize data arrays
        $kunjunganAnakRemajaData = array_fill(0, 12, 0);
        $imtKurusData = array_fill(0, 12, 0);
        $imtGemukData = array_fill(0, 12, 0);
        $imtObesitasData = array_fill(0, 12, 0);
        $imtNormalData = array_fill(0, 12, 0);
        $tdRendahData = array_fill(0, 12, 0);
        $tdTinggiData = array_fill(0, 12, 0);
        $tdNormalData = array_fill(0, 12, 0);
        $gulaDarahRendahData = array_fill(0, 12, 0);
        $gulaDarahTinggiData = array_fill(0, 12, 0);
        $remajaPutriAnemiaData = array_fill(0, 12, 0);
        $tidakAnemiaData = array_fill(0, 12, 0);
        $risikoTbcData = array_fill(0, 12, 0);
        $masalahKesehatanData = array_fill(0, 12, 0);
        $sasaranData = array_fill(0, 12, 0);
        $kmsData = array_fill(0, 12, 0);
        $datangData = array_fill(0, 12, 0);
        $naikTimbanganData = array_fill(0, 12, 0);
        $risikoPpokData = array_fill(0, 12, 0);
        $gangguanJiwaData = array_fill(0, 12, 0);
        $skriningSklData = array_fill(0, 12, 0);
        $dirujukPuskesmasData = array_fill(0, 12, 0);
        $nifasMenyusuiData = array_fill(0, 12, 0);
        $bbGarisMerahData = array_fill(0, 12, 0);
        $lilaData = array_fill(0, 12, 0);
        $risikoTbcIbuHamilData = array_fill(0, 12, 0);
        $mendapatTtdData = array_fill(0, 12, 0);
        $makananTambahanKekData = array_fill(0, 12, 0);
        $ikutKelasData = array_fill(0, 12, 0);
        $dirujukKePuskesmasData = array_fill(0, 12, 0);

        // Assign data from each category
        foreach ($dataPerBulanAnakRemaja as $dataAnakRemaja) {
            $index = $dataAnakRemaja->month - 1;
            $kunjunganAnakRemajaData[$index] = $dataAnakRemaja->total_kunjungan_anak_remaja;
            $imtKurusData[$index] = $dataAnakRemaja->total_imt_kurus;
            $imtGemukData[$index] = $dataAnakRemaja->total_imt_gemuk;
            $imtObesitasData[$index] = $dataAnakRemaja->total_imt_obesitas;
            $imtNormalData[$index] = $dataAnakRemaja->total_imt_normal;
            $tdRendahData[$index] = $dataAnakRemaja->total_td_rendah;
            $tdTinggiData[$index] = $dataAnakRemaja->total_td_tinggi;
            $tdNormalData[$index] = $dataAnakRemaja->total_td_normal;
            $gulaDarahRendahData[$index] = $dataAnakRemaja->total_gula_darah_rendah;
            $gulaDarahTinggiData[$index] = $dataAnakRemaja->total_gula_darah_tinggi;
            $remajaPutriAnemiaData[$index] = $dataAnakRemaja->total_remaja_putri_anemia;
            $tidakAnemiaData[$index] = $dataAnakRemaja->total_tidak_anemia;
            $risikoTbcData[$index] = $dataAnakRemaja->total_risiko_tbc;
            $masalahKesehatanData[$index] = $dataAnakRemaja->total_masalah_kesehatan;
        }

        foreach ($dataPerBulanBalita as $dataBalita) {
            $index = $dataBalita->month - 1;
            $sasaranData[$index] = $dataBalita->total_sasaran;
            $kmsData[$index] = $dataBalita->total_kms;
            $datangData[$index] = $dataBalita->total_datang;
            $naikTimbanganData[$index] = $dataBalita->total_naik_timbangan;
        }

        foreach ($dataPerBulanDewasaLansia as $dataDewasaLansia) {
            $index = $dataDewasaLansia->month - 1;
            $risikoPpokData[$index] = $dataDewasaLansia->total_risiko_ppok;
            $gangguanJiwaData[$index] = $dataDewasaLansia->total_gangguan_jiwa;
            $skriningSklData[$index] = $dataDewasaLansia->total_skrining_skl;
            $dirujukPuskesmasData[$index] = $dataDewasaLansia->total_dirujuk_puskesmas;
        }

        foreach ($dataPerBulanIbuHamil as $dataIbuHamil) {
            $index = $dataIbuHamil->month - 1;
            $nifasMenyusuiData[$index] = $dataIbuHamil->total_nifas_menyusui;
            $bbGarisMerahData[$index] = $dataIbuHamil->total_bb_garis_merah;
            $lilaData[$index] = $dataIbuHamil->total_lila;
            $risikoTbcIbuHamilData[$index] = $dataIbuHamil->total_risiko_tbc;

            $mendapatTtdData[$index] = $dataIbuHamil->total_mendapat_ttd;
            $makananTambahanKekData[$index] = $dataIbuHamil->total_makanan_tambahan_kek;
            $ikutKelasData[$index] = $dataIbuHamil->total_ikut_kelas;
            $dirujukKePuskesmasData[$index] = $dataIbuHamil->total_dirujuk_ke_puskesmas;
        }

        // Pass data to the view
        return view('pageadmin.dashboard_dinaskesehatan.index', [
            'months' => $months,
            'kunjunganAnakRemajaData' => $kunjunganAnakRemajaData,
            'imtKurusData' => $imtKurusData,
            'imtGemukData' => $imtGemukData,
            'imtObesitasData' => $imtObesitasData,
            'imtNormalData' => $imtNormalData,
            'tdRendahData' => $tdRendahData,
            'tdTinggiData' => $tdTinggiData,
            'tdNormalData' => $tdNormalData,
            'gulaDarahRendahData' => $gulaDarahRendahData,
            'gulaDarahTinggiData' => $gulaDarahTinggiData,
            'remajaPutriAnemiaData' => $remajaPutriAnemiaData,
            'tidakAnemiaData' => $tidakAnemiaData,
            'risikoTbcData' => $risikoTbcData,
            'masalahKesehatanData' => $masalahKesehatanData,
            'sasaranData' => $sasaranData,
            'kmsData' => $kmsData,
            'datangData' => $datangData,
            'naikTimbanganData' => $naikTimbanganData,
            'risikoPpokData' => $risikoPpokData,
            'gangguanJiwaData' => $gangguanJiwaData,
            'skriningSklData' => $skriningSklData,
            'dirujukPuskesmasData' => $dirujukPuskesmasData,
            'nifasMenyusuiData' => $nifasMenyusuiData,
            'bbGarisMerahData' => $bbGarisMerahData,
            'lilaData' => $lilaData,
            'risikoTbcIbuHamilData' => $risikoTbcIbuHamilData,
            'mendapatTtdData' => $mendapatTtdData,
            'makananTambahanKekData' => $makananTambahanKekData,
            'ikutKelasData' => $ikutKelasData,
            'dirujukKePuskesmasData' => $dirujukKePuskesmasData,
        ]);
    }
}
