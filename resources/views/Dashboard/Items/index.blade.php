<x-dashboard.layout :title="__('dash.items')">

    <div class="card">
        <x-dashboard.partials.card_header :title="'items'" :routeName="'items'" :modelName="'items'"/>

        <div class="card-body py-4">
            <div class="dt-container dt-bootstrap5 dt-empty-footer">
                <div class="table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush

</x-dashboard.layout>
