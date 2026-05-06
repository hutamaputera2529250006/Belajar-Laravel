<x-layout>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Fakultas</th>
                <th>Nama Dekan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fakultas as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->dekan }}</td>
                <td>
                    <a href="/fakultas/{{ $item->id }}">Detail</a>
                    <a href="/fakultas/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                    <form action="/fakultas/{{ $item->id }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

   <a href="/fakultas/create">
      <h1>Add Fakultas</h1>
   </a>
   <a href="/fakultas/edit">
      <h1>Edit Fakultas</h1>
   </a>
</x-layout>
