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
    public $hotels;

    public $country;
    public $province;
    public $district;
    public $ward;

    public function mount()
    {
        $this->countries = Country::active()->get();
        $this->provinces = collect();
        $this->districts = collect();
        $this->wards = collect();
        $this->hotels = Hotel::with('country')->active()->take(10)->inRandomOrder()->get();
    }

    public function render()
    {
        return view('livewire.location');
    }

    public function updatedCountry($value)
    {
        $this->provinces = Province::active()->whereCountryId($value)->get();
        $this->districts = collect();
        $this->wards = collect();
        $this->hotels = Hotel::active()->with('country')->whereCountryId($value)->take(10)->get();
    }

    public function updatedProvince($value)
    {
        $this->districts = District::active()->whereProvinceId($value)->get();
        $this->wards = collect();
    }

    public function updatedDistrict($value)
    {
        $this->wards = Ward::active()->whereDistrictId($value)->get();
    }

}