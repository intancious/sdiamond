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
                            {{--  --}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama Customer</th>
                                        <th style="text-align: center">Total Harga</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($transaksi as $trans)
                                        <tr>
                                            <td scope="row" style="text-align: center">{{ $i++ }}</td>
                                            <td style="text-align: left">{{ $trans->user->fullname }}</td>
                                            <td style="text-align: center">{{ $trans->total_price }}</td>
                                            <td style="text-align: center">{{ $trans->status }}</td>
                                            <td style="text-align: center">

                                                <a href="{{ route('transaction.show', $trans->id) }}"
                                                    class="btn btn-success mb-2 d-inline"><i class="fas fa-eye"></i></a>

                                                <a href="{{ route('transaction.edit', $trans->id) }}"
                                                    class="btn btn-warning mb-2 d-inline"><i
                                                        class="fas fa-edit"></i></a>
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
