<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\District;
use App\Models\Hotel;
use App\Models\Province;
use App\Models\Ward;
use Livewire\Component;
use Livewire\WithPagination;

class Location extends Component
{
    use WithPagination;

    public $countries;
    public $provinces;
    public $districts;
    public $wards;

    public $country;
    public $province;
    public $district;
    public $ward;
    public $search = '';
    public $page = 1;
    public $country_name;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function mount()
    {
        $this->countries = Country::all();
        $this->provinces = collect();
        $this->districts = collect();
        $this->wards = collect();
    }

    public function render()
    {
        return view('livewire.location', [
            'hotels' => Hotel::with('country')
                ->whereHas('country')
                ->when($this->search, function ($query, $search) {
                    return $query->where('name', 'like', '%'.$search.'%');
                })
                ->when($this->country, function ($query, $country) {
                    return $query->where('country_id', $country);
                })->paginate(20)
        ]);
    }

    public function updatedCountry($value)
    {
        $this->provinces = Province::whereCountryId($value)->get();
        $this->districts = collect();
        $this->wards = collect();
    }

    public function updatedProvince($value)
    {
        $this->districts = District::whereProvinceId($value)->get();
        $this->wards = collect();
    }

    public function updatedDistrict($value)
    {
        $this->wards = Ward::whereDistrictId($value)->get();
    }

}
