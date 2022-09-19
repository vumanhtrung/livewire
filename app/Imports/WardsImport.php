<?php

namespace App\Imports;

use App\Models\District;
use App\Models\Ward;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class WardsImport implements ToCollection, WithHeadingRow, WithChunkReading, WithProgressBar
{
    use Importable;

    public function collection(Collection $rows)
    {
        $districts = District::pluck('id', 'code');

        foreach ($rows as $row) {
            if (empty($row['ten']) || empty($row['ma']) || empty($row['ma_qh'])) {
                continue;
            }
            Ward::create([
                'district_id' => $districts[$row['ma_qh']],
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
