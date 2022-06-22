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
                            {{-- <a href="{{ route('product.create') }}" class=" card-title btn btn-success"><i
                                    class="fas fa-plus"></i> Tambah
                                Poducts</a> --}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </x-slot>



            </div>
        </div>
    </div>


    {{-- <x-jet-welcome /> --}}
</x-app-layout>
