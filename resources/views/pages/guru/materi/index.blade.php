@extends('layouts.app')

@section('title', 'Data Materi')

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
                    <h5 class="card-title mb-0">Data Materi</h5>
                    <a href="{{ route('guru.materi.create') }}" class="btn btn-primary"><i class="ri-add-line"></i>Tambah
                        Materi</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table bordered-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Tipe</th>
                                    <th scope="col">Pembuat</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($materis as $materi)
                                    <tr>
                                        <td>{{ Str::limit($materi->title, 30, '...') }}</td>
                                        <td>
                                            <a href="{{ route('guru.materi.show', $materi->id) }}"
                                                class="text-decoration-none">
                                                @switch($materi->type)
                                                    @case('file')
                                                        <span
                                                            class="badge text-sm fw-semibold bg-dark-success-gradient px-20 py-9 radius-4 text-white">
                                                            File
                                                        </span>
                                                    @break

                                                    @case('video')
                                                        <span
                                                            class="badge text-sm fw-semibold bg-dark-primary-gradient px-20 py-9 radius-4 text-white">
                                                            Video
                                                        </span>
                                                    @break

                                                    @case('youtube')
                                                        <span
                                                            class="badge text-sm fw-semibold bg-dark-danger-gradient px-20 py-9 radius-4 text-white">
                                                            YouTube
                                                        </span>
                                                    @break

                                                    @case('website')
                                                        <span
                                                            class="badge text-sm fw-semibold bg-dark-lilac-gradient px-20 py-9 radius-4 text-white">
                                                            Website
                                                        </span>
                                                    @break
                                                @endswitch
                                            </a>
                                        </td>
                                        <td>
                                            {{ $materi->creator->name ?? '-' }}
                                            @if ($materi->creator)
                                                | {{ ucfirst($materi->creator->role) }}
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($materi->created_at)->translatedFormat('d F Y H:i') }}
                                        </td>
                                        <td class="d-flex justify-content-center gap-2">
                                            {{-- Show --}}
                                            <a href="{{ route('guru.materi.show', $materi->id) }}"
                                                class="w-32-px h-32-px bg-primary-light text-primary-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                            </a>

                                            {{-- Edit --}}
                                            <a href="{{ route('guru.materi.edit', $materi->id) }}"
                                                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                <iconify-icon icon="lucide:edit"></iconify-icon>
                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('guru.materi.destroy', $materi->id) }}" method="POST">
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
                                            <td colspan="5" class="text-center">Tidak ada data materi</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $materis->links('components.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
