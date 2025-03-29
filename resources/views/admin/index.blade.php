<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="min-w-full border-collapse block md:table">
                    <thead class="block md:table-header-group">
                        <tr class="border border-gray-200 md:border-none block md:table-row">
                            <th class="p-3 text-left md:table-cell">First Name</th>
                            <th class="p-3 text-left md:table-cell">Last Name</th>
                            <th class="p-3 text-left md:table-cell">Email</th>
                            <th class="p-3 text-left md:table-cell">Role</th>
                            <th class="p-3 text-left md:table-cell">isApproved</th>
                        </tr>
                    </thead>
                    <tbody class="block md:table-row-group">
                        @foreach ($users as $user)
                        <tr class="border border-gray-200 md:border-none block md:table-row">
                            <td class="p-3 md:table-cell">{{ $user->first_name }}</td>
                            <td class="p-3 md:table-cell">{{ $user->last_name }}</td>
                            <td class="p-3 md:table-cell">{{ $user->email }}</td>
                            <td class="p-3 md:table-cell">{{ $user->role }}</td>
                            <td class="p-3 md:table-cell">
                                {{ $user->is_approved ? 'Yes' : 'No' }}
                            </td>
                            <td class="p-3 md:table-cell">
                                <div class="flex space-x-2">
                                    <form method="POST" action="{{ route('admin.approve', $user->id) }}" class="inline">
                                        @csrf
                                        <button type="submit" class="px-3 py-1 text-white rounded 
                {{ $user->is_approved ? 'bg-red-500' : 'bg-green-500' }}">
                                            {{ $user->is_approved ? 'Unapprove' : 'Approve' }}
                                        </button>
                                    </form>
                                    
                                    <form method="POST" action="{{ route('admin.promote', $user->id) }}" class="inline">
                                        @csrf
                                        <button type="submit" class="px-3 py-1 text-white rounded 
                {{ $user->role === 'Admin' ? 'bg-blue-500' : 'bg-yellow-500' }}">
                                            {{ $user->role === 'Admin' ? 'Demote' : 'Promote' }}
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>