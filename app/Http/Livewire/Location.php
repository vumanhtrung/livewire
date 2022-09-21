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

    public $countries, $provinces, $districts, $wards;
    public $country, $province, $district, $ward;
    public Hotel $hotel;
    public $isModalOpen = false;
    public $search = '';
    public $page = 1;

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

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->address = '';
    }

    public function edit(Hotel $hotel)
    {
        $this->hotel = $hotel;

        $this->openModal();
    }

    public function update()
    {
        $this->validate();

        $this->hotel->save();

        session()->flash('message', "The hotel `{$this->hotel->name}` was updated.");
        $this->closeModal();
        $this->resetInputFields();
    }

    protected function rules(): array
    {
        return [
            'hotel.name' => [
                'string',
                'required'
            ],
            'hotel.address' => [
                'string',
                'required'
            ],
        ];
    }

}
