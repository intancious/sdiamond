<x-app-layout>
    <x-slot name="header">
        <h2 class="h5 font-weight-bold">
            {{ __('Product haha') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <x-slot name="slot">
                    <div class="card mx-4 my-5">
                        <div class="card-header">
                            {{-- <h3 class="card-title">Tabel Products</h3> --}}
                            {{-- <a href="{{ route('products.tambah') }}" class=" card-title btn btn-success"><i
                                    class="fas fa-plus"></i>Tambah
                                Poducts</a> --}}
                            <a href="{{ route('product.create') }}" class=" card-title btn btn-success"><i
                                    class="fas fa-plus"></i> Tambah
                                Poducts</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama</th>
                                        <th style="text-align: center">Kategori</th>
                                        <th style="text-align: center">Harga</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($products as $produk)
                                        <tr>
                                            <td scope="row" style="text-align: center">{{ $i++ }}</td>
                                            <td style="text-align: left">{{ $produk->name }}</td>
                                            <td style="text-align: center">{{ $produk->category->name }}</td>
                                            <td style="text-align: center">{{ $produk->price }}</td>
                                            <td style="text-align: center">

                                                <a href="{{ route('product.edit', $produk->id) }}"
                                                    class="btn btn-warning mb-2 d-inline"><i
                                                        class="fas fa-edit"></i></a>
                                                <form action="{{ route('product.delete', $produk->id) }}"
                                                    method="POST" class="d-inline">
                                                    <!-- jika ingin lebih aman lagi tambahkan csrf! -->
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Apakah yakin hapus?');"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </x-slot>



            </div>
        </div>
    </div>


    {{-- <x-jet-welcome /> --}}
</x-app-layout>
