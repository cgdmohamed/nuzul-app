<?php

namespace App\Http\Livewire\Location;

use App\Models\Location;
use Livewire\Component;

class Edit extends Component
{
    public Location $location;

    public function mount(Location $location)
    {
        $this->location = $location;
    }

    public function render()
    {
        return view('livewire.location.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->location->save();

        return redirect()->route('admin.locations.index');
    }

    protected function rules(): array
    {
        return [
            'location.location_name' => [
                'string',
                'required',
                'unique:locations,location_name,' . $this->location->id,
            ],
            'location.district' => [
                'string',
                'required',
                'unique:locations,district,' . $this->location->id,
            ],
        ];
    }
}
