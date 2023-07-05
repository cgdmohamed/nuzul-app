<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('unit_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Unit" format="csv" />
                <livewire:excel-export model="Unit" format="xlsx" />
                <livewire:excel-export model="Unit" format="pdf" />
            @endif


            @can('unit_create')
                <x-csv-import route="{{ route('admin.units.csv.store') }}" />
            @endcan

        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th>
                            {{ trans('cruds.unit.fields.unit_name') }}
                            @include('components.table.sort', ['field' => 'unit_name'])
                        </th>
                        <th>
                            {{ trans('cruds.unit.fields.unit_code') }}
                            @include('components.table.sort', ['field' => 'unit_code'])
                        </th>
                        <th>
                            {{ trans('cruds.unit.fields.unit_location') }}
                            @include('components.table.sort', ['field' => 'unit_location.location_name'])
                        </th>
                        <th>
                            {{ trans('cruds.unit.fields.unit_checkin') }}
                            @include('components.table.sort', ['field' => 'unit_checkin'])
                        </th>
                        <th>
                            {{ trans('cruds.unit.fields.unit_checkout') }}
                            @include('components.table.sort', ['field' => 'unit_checkout'])
                        </th>
                        <th>
                            {{ trans('cruds.unit.fields.unit_lock') }}
                            @include('components.table.sort', ['field' => 'unit_lock'])
                        </th>
                        <th>
                            {{ trans('cruds.unit.fields.unit_status') }}
                            @include('components.table.sort', ['field' => 'unit_status'])
                        </th>
                        <th>
                            {{ trans('cruds.unit.fields.booked_by') }}
                            @include('components.table.sort', ['field' => 'booked_by.name'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                            @include('components.table.sort', ['field' => 'booked_by.email'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($units as $unit)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $unit->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $unit->unit_name }}
                            </td>
                            <td>
                                {{ $unit->unit_code }}
                            </td>
                            <td>
                                @if($unit->unitLocation)
                                    <span class="badge badge-relationship">{{ $unit->unitLocation->location_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $unit->unit_checkin }}
                            </td>
                            <td>
                                {{ $unit->unit_checkout }}
                            </td>
                            <td>
                                {{ $unit->unit_lock }}
                            </td>
                            <td>
                                {{ $unit->unit_status_label }}
                            </td>
                            <td>
                                @if($unit->bookedBy)
                                    <span class="badge badge-relationship">{{ $unit->bookedBy->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($unit->bookedBy)
                                    <a class="link-light-blue" href="mailto:{{ $unit->bookedBy->email ?? '' }}">
                                        <i class="far fa-envelope fa-fw">
                                        </i>
                                        {{ $unit->bookedBy->email ?? '' }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('unit_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.units.show', $unit) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('unit_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.units.edit', $unit) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('unit_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $unit->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $units->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush