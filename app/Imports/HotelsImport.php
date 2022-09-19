<?php

namespace App\Imports;

use App\Models\Country;
use App\Models\Hotel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class HotelsImport implements ToCollection, WithChunkReading, WithProgressBar
{
    use Importable;

    public function collection(Collection $rows)
    {
        $countries = Country::pluck('id', 'code');

        foreach ($rows as $row) {
            if (empty($row[0]) || empty($row[1]) || empty($row[6]) ||
                !preg_match('/^[a-zA-Z0-9]{4}$/', $row[0])) {
                continue;
            }

            Hotel::create([
                'country_id' => $countries[$row[6]],
                'code' => $row[0],
                'name' => $row[1],
                'address' => $row[2],
                'city' => $row[3],
                'postal_code' => $row[4],
                'province' => $row[5],
                'country_code' => $row[6],
                'longitude' => $row[7],
                'latitude' => $row[8],
                'phone' => $row[9],
                'website' => $row[10],
                'star' => (float)$row[11],
                'active' => 1
            ]);
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
