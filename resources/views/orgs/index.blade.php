<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Organizations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table>
                        @foreach($orgs as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->orgName }} {{ $item->LastName }}</td>
                            <td>{{ $item->orgType }}</td>
                            <td>{{ $item->street }}</td>
                            <td>{{ $item->city }}</td>
                            <td>{{ $item->postalCode }}</td>
                            <td>{{ $item->province }}</td>
                            <td>{{ $item->country }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>