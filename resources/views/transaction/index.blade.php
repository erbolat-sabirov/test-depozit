<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Тип</th>
                                <th scope="col">Сумма</th>
                                <th scope="col">Дата</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $key => $model)
                                <tr>
                                    <th>
                                        {{ $model->id }}
                                    </th>
                                    <th>
                                        {{ $model->typeText() }}
                                    </th>
                                    <th>
                                        {{ $model->amount }}
                                    </th>
                                    <th>
                                        {{ $model->created_at }}
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $models->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
