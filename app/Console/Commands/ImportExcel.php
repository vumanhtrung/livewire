<?php

namespace App\Console\Commands;

use App\Imports\CountriesImport;
use App\Imports\DistrictsImport;
use App\Imports\HotelsImport;
use App\Imports\ProvincesImport;
use App\Imports\WardsImport;
use Illuminate\Console\Command;

class ImportExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Laravel Excel Importer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->output->title('Starting import');
        // (new CountriesImport)->withOutput($this->output)->import(storage_path('countries.xlsx'));
        // (new ProvincesImport)->withOutput($this->output)->import(storage_path('import/provinces.xlsx'));
        // (new DistrictsImport)->withOutput($this->output)->import(storage_path('import/districts.xlsx'));
        // (new WardsImport)->withOutput($this->output)->import(storage_path('import/wards.xlsx'));
        (new HotelsImport)->withOutput($this->output)->import(storage_path('import/hotels.csv'));
        $this->output->success('Import successful');
    }
}
