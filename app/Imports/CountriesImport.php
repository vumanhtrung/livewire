<?php

namespace App\Imports;

use App\Models\Country;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class CountriesImport implements ToCollection, WithHeadingRow, WithChunkReading, WithProgressBar
{
    use Importable;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Country::create([
                'name' => $row['name'],
                'code' => $row['code'],
                'active' => 1
            ]);
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
