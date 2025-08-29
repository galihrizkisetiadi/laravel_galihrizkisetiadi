@extends('layouts.app')
@section('title', 'Pasien')
@section('content')
    <div>
        <div class="">
            <div class="d-flex justify-content-between mb-3">
                <h3>Pasien</h3>

                <a href="{{ route('patient.create') }}" class="btn btn-primary">Tambah Pasien</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Rumah Sakit</th>
                        <th>Telepon</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collections as $collection)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $collection->name }}</td>
                            <td>{{ $collection->address }}</td>
                            <td>{{ $collection->hospital->name }}</td>
                            <td>{{ $collection->telephone }}</td>
                            <td class="text-center">
                                <a href="{{ route('patient.edit', $collection) }}"
                                    class="btn btn-warning text-white">Ubah</a>

                                <button id="delete-patient" type="submit" class="btn btn-danger"
                                    data-id="{{ $collection->id }}">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $collections->onEachSide(5)->links() }}
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#delete-patient').click(function() {
                var id = $(this).data('id');
                var url = '/patient/' + id;

                if (confirm('Apakah kamu yakin dihapus?')) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                document.location.reload(true)
                            } else {
                                alert('Error: ' + response.error);
                            }
                        },
                        error: function(err) {
                            alert('Error: ' + err.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endsection
