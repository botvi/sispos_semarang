<?php

namespace App\Http\Controllers;

use App\Exports\BalitaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\BulananBalita;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class BulananBalitaController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        // Get the selected month and year from the request (null if none selected)
        $selectedMonth = $request->input('month');
        $selectedYear = $request->input('year');

        // Create a query builder for BulananBalita
        $query = BulananBalita::where('user_id', $userId);

        // Apply filters only if the month and year are selected
        if ($selectedMonth && $selectedYear) {
            $query->whereMonth('tanggal_pelaksanaan', $selectedMonth)
                ->whereYear('tanggal_pelaksanaan', $selectedYear);
        }

        // Fetch filtered or unfiltered data for the selected month and year
        $bulananBalitas = $query->get();

        // Sum and calculate the percentages for the filtered data or all data
        $dataQuery = BulananBalita::where('user_id', $userId)
            ->selectRaw('
            SUM(jumlah_sasaran_balita) as total_sasaran_balita,
            SUM(jumlah_balita_datang) as total_balita_datang,
            SUM(jumlah_balita_naik_timbangan) as total_balita_naik_timbangan
        ');

        // Apply filters only if the month and year are selected
        if ($selectedMonth && $selectedYear) {
            $dataQuery->whereMonth('tanggal_pelaksanaan', $selectedMonth)
                ->whereYear('tanggal_pelaksanaan', $selectedYear);
        }

        $data = $dataQuery->first();

        $persentaseDatang = 0;
        $persentaseNaikTimbangan = 0;

        if ($data->total_sasaran_balita > 0 && $data->total_balita_datang > 0) {
            $persentaseDatang = ($data->total_balita_datang / $data->total_sasaran_balita) * 100;
            $persentaseNaikTimbangan = ($data->total_balita_naik_timbangan / $data->total_balita_datang) * 100;
        }

        // Fetch data for chart (per month across all months)
        $dataPerBulan = BulananBalita::where('user_id', $userId)
            ->selectRaw('
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

        // Prepare chart data arrays
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $sasaranData = array_fill(0, 12, 0);
        $kmsData = array_fill(0, 12, 0);
        $datangData = array_fill(0, 12, 0);
        $naikTimbanganData = array_fill(0, 12, 0);

        foreach ($dataPerBulan as $data) {
            $index = $data->month - 1;
            $sasaranData[$index] = $data->total_sasaran;
            $kmsData[$index] = $data->total_kms;
            $datangData[$index] = $data->total_datang;
            $naikTimbanganData[$index] = $data->total_naik_timbangan;
        }

        return view('pageadmin.bulanan_balita.index', compact(
            'months',
            'sasaranData',
            'kmsData',
            'datangData',
            'naikTimbanganData',
            'bulananBalitas',
            'persentaseDatang',
            'persentaseNaikTimbangan',
            'selectedMonth',
            'selectedYear'
        ));
    }




    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_pelaksanaan' => 'required|date',
            'jumlah_sasaran_balita' => 'required|integer',
            'jumlah_balita_kms' => 'nullable|integer',
            'jumlah_balita_datang' => 'nullable|integer',
            'jumlah_balita_naik_timbangan' => 'nullable|integer',
            'jumlah_balita_turun_timbangan' => 'nullable|integer',
            'jumlah_balita_bgm' => 'nullable|integer',
            'jumlah_balita_sakit' => 'nullable|integer',
            'jumlah_balita_vitamin_feb' => 'nullable|integer',
            'jumlah_balita_vitamin_aug' => 'nullable|integer',
            'jumlah_balita_dirujuk' => 'nullable|integer',
        ]);

        // Buat entri baru setiap kali data disimpan
        BulananBalita::create($validatedData + ['user_id' => Auth::id()]);

        Alert::success('Success', 'Data has been saved successfully!');
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        // Find the specific BulananBalita record by ID
        $balita = BulananBalita::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'tanggal_pelaksanaan' => 'required|date',
            'jumlah_sasaran_balita' => 'required|integer',
            'jumlah_balita_kms' => 'required|integer',
            'jumlah_balita_datang' => 'required|integer',
            'jumlah_balita_naik_timbangan' => 'required|integer',
            'jumlah_balita_turun_timbangan' => 'required|integer',
            'jumlah_balita_bgm' => 'required|integer',
            'jumlah_balita_sakit' => 'required|integer',
            'jumlah_balita_vitamin_feb' => 'required|integer',
            'jumlah_balita_vitamin_aug' => 'required|integer',
            'jumlah_balita_dirujuk' => 'required|integer',
        ]);

        // Update the record with the new data
        $balita->update($request->all());

        // Redirect back to the previous page with a success message
        Alert::success('Success', 'Data updated successfully!');
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new BalitaExport, 'balita.xlsx');
    }
}
