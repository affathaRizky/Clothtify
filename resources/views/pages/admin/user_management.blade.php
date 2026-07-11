@extends('layouts.mainAdmin')

@section('title', 'User Management - Admin Clothify')

@section('content')
<main class="flex-grow p-6 md:p-8 bg-gray-50 min-h-screen">

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg flex items-center gap-2">
        <i class="fa-solid fa-circle-check"></i>
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg flex items-center gap-2">
        <i class="fa-solid fa-circle-exclamation"></i>
        {{ session('error') }}
    </div>
    @endif

    <!-- User Table Section -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm">
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">USER LIST</h2>

            <!-- Add User Button -->
            <button data-modal-target="addUserModal" data-modal-toggle="addUserModal" type="button"
                class="px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-800 transition flex items-center gap-2">
                <i class="fa-solid fa-user-plus"></i>
                Tambah User
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">User</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <span class="text-sm font-medium text-gray-900">ACC #{{ $user->id_pembeli ?? 'N/A' }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img src="{{ $user->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->nama ?? $user->username ?? 'U') . '&background=111827&color=fff&size=40' }}"
                                    alt="{{ $user->nama ?? $user->username }}"
                                    class="w-10 h-10 rounded-full object-cover border-2 border-gray-200">
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">{{ $user->username ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-envelope text-gray-400 text-xs"></i>
                                <span class="text-sm text-gray-700">{{ $user->email ?? 'N/A' }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <!-- Edit Button -->
                                <button type="button"
                                    data-modal-target="editUserModal-{{ $user->id_pembeli }}"
                                    data-modal-toggle="editUserModal-{{ $user->id_pembeli }}"
                                    class="p-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition"
                                    title="Edit User">
                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                </button>
                                <!-- Delete Button -->
                                <form action="{{ route('deleteUser', $user->id_pembeli) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:text-red-800 hover:bg-red-50 rounded-lg transition" title="Delete User">
                                        <i class="fa-solid fa-trash text-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- ✅ Edit Modal untuk setiap user (di dalam loop) - SUDAH DIPERBAIKI -->
                    <div id="editUserModal-{{ $user->id_pembeli }}" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-gray-900 bg-opacity-50 backdrop-blur-sm">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow-sm">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        Edit User
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="editUserModal-{{ $user->id_pembeli }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form class="p-4 md:p-5" action="{{ route('update.user', $user->id_pembeli) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid gap-4 mb-4 grid-cols-1">
                                        <div class="col-span-1">
                                            <label for="edit_username-{{ $user->id_pembeli }}" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                                            <input type="text" name="username" id="edit_username-{{ $user->id_pembeli }}" value="{{ old('username', $user->username) }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
                                                required>
                                        </div>
                                        <div class="col-span-1">
                                            <label for="edit_email-{{ $user->id_pembeli }}" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                            <input type="email" name="email" id="edit_email-{{ $user->id_pembeli }}" value="{{ old('email', $user->email) }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
                                                required>
                                        </div>
                                        <div class="col-span-1">
                                            <label for="edit_password-{{ $user->id_pembeli }}" class="block mb-2 text-sm font-medium text-gray-900">
                                                Password <span class="text-xs text-gray-500">(Kosongkan jika tidak diubah)</span>
                                            </label>
                                            <input type="password" name="password" id="edit_password-{{ $user->id_pembeli }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
                                                placeholder="••••••••">
                                        </div>
                                        <div class="col-span-1">
                                            <label for="edit_role-{{ $user->id_pembeli }}" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                                            <select name="role" id="edit_role-{{ $user->id_pembeli }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5">
                                                <option value="admin" {{ (old('role', $user->role ?? '') == 'admin') ? 'selected' : '' }}>Admin</option>
                                                <option value="pembeli" {{ (old('role', $user->role ?? '') == 'pembeli') ? 'selected' : '' }}>Pembeli</option>
                                            </select>
                                        </div>
                                        <div class="col-span-1">
                                            <label for="edit_status-{{ $user->id_pembeli }}" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                                            <select name="status" id="edit_status-{{ $user->id_pembeli }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5">
                                                <option value="active" {{ (old('status', $user->status ?? 'active') == 'active') ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" {{ (old('status', $user->status ?? 'active') == 'inactive') ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200">
                                        <button type="button"
                                            data-modal-hide="editUserModal-{{ $user->id_pembeli }}"
                                            class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                                            Batal
                                        </button>
                                        <button type="submit" class="px-4 py-2 text-sm text-white bg-gray-900 rounded-lg hover:bg-gray-800">
                                            Update User
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                            <i class="fa-solid fa-inbox text-4xl mb-2 text-gray-300"></i>
                            <p>Tidak ada user ditemukan</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($users->count() > 0)
        <div class="flex items-center justify-between px-6 py-4 border-t border-gray-200">
            <div class="text-sm text-gray-700">
                Menampilkan <span class="font-medium">{{ $users->count() }}</span> user
            </div>
            <div class="flex items-center gap-2">
                <button class="px-3 py-1.5 text-sm text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    Previous
                </button>
                <button class="px-3 py-1.5 text-sm text-white bg-gray-900 rounded-lg">
                    1
                </button>
                <button class="px-3 py-1.5 text-sm text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    Next
                </button>
            </div>
        </div>
        @endif
    </div>

</main>
@endsection