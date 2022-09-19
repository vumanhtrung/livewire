<?php

namespace App\Imports;

use App\Models\District;
use App\Models\Province;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class DistrictsImport implements ToCollection, WithHeadingRow, WithChunkReading, WithProgressBar
{
    use Importable;

    public function collection(Collection $rows)
    {
        $provinces = Province::pluck('id', 'code');

        foreach ($rows as $row) {
            District::create([
                'province_id' => $provinces[$row['ma_tp']],
                'name' => $row['ten'],
                'code' => $row['ma'],
                'active' => 1
            ]);
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
