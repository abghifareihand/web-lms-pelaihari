@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
    <div class="row gy-4">
        {{-- Alert --}}
        @if ($message = Session::get('success'))
            <div class="col-12">
                <x-alert type="success" :message="$message" class="mb-24" />
            </div>
        @endif

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h5 class="card-title mb-0">Data Siswa</h5>
                    <a href="{{ route('admin.user.siswa.create') }}" class="btn btn-primary"><i class="ri-add-line"></i>Tambah
                        Siswa</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table bordered-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>
                                            <span
                                                class="badge text-sm fw-semibold text-lilac-600 bg-lilac-100 px-20 py-9 radius-4 text-white text-uppercase">
                                                {{ $user->role }}
                                            </span>
                                        </td>

                                        <td>{{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('d F Y H:i') }}
                                        </td>
                                        <td class="d-flex justify-content-center gap-2">
                                            {{-- Edit --}}
                                            <a href="{{ route('admin.user.siswa.edit', $user->id) }}"
                                                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                <iconify-icon icon="lucide:edit"></iconify-icon>
                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('admin.user.siswa.destroy', $user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center border-0 p-0">
                                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                </button>
                                            </form>
                                        </td>


                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data siswa</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links('components.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
