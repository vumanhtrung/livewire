<?php

namespace App\Imports;

use App\Models\Boat;
use App\Models\BoatRoute;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class BoatRoutesImport implements ToCollection, WithHeadingRow, WithChunkReading, WithProgressBar
{
    use Importable;

    public function collection(Collection $rows)
    {
        $boats = Boat::pluck('id', 'code');

        foreach ($rows as $row) {
            BoatRoute::create([
                'boat_id' => $boats[$row['code']],
                'name' => $row['name'],
                'code' => $row['id'],
                'active' => 1
            ]);
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
