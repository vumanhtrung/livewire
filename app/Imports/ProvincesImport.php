<?php

namespace App\Imports;

use App\Models\Country;
use App\Models\Province;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class ProvincesImport implements ToCollection, WithHeadingRow, WithChunkReading, WithProgressBar
{
    use Importable;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Province::create([
                'country_id' => 241, // Vietnam
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
