@extends('layouts.app')
@section('title', 'Rumah Sakit')
@section('content')
    <div>
        <div class="">
            <div class="d-flex justify-content-between mb-3">
                <h3>Rumah Sakit</h3>

                <a href="{{ route('hospital.create') }}" class="btn btn-primary">Tambah Rumah Sakit</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
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
                            <td>{{ $collection->email }}</td>
                            <td>{{ $collection->telephone }}</td>
                            <td class="text-center">
                                <a href="{{ route('hospital.edit', $collection) }}"
                                    class="btn btn-warning text-white">Ubah</a>

                                <button id="delete-hospital" type="submit" class="btn btn-danger"
                                    data-id="{{ $collection->id }}">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $collections->links() !!}
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#delete-hospital').click(function() {
                var id = $(this).data('id');
                var url = '/hospital/' + id;

                if (confirm('Apakah kamu yakin ingin mendelete?')) {
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
