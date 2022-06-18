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

                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary mt-5 ml-4 mr-4">
                                <div class="card-header">
                                    <h3 class="card-title">Form Edit Status Transaksi</h3>
                                </div>

                                @if ($errors->any())
                                    <div class="mb-5" role="alert">
                                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                            There's something wrong!
                                        </div>
                                        <div
                                            class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                            <p>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                            </p>
                                        </div>
                                    </div>
                                @endif

                                <form action="{{ route('transaction.update', $item->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">
                                        <div class="form-group row">

                                            {{-- <div class="form-group row"> --}}
                                            <div class="form-group col-md-11 ml-5">
                                                <label for="fullname">Nama Customer</label> <br>
                                                <input type="text"
                                                    class="form-control @error('fullname') is-invalid @enderror"
                                                    id="fullname" name="fullname" value="{{ $item->user->fullname }}"
                                                    readonly>
                                            </div>
                                            <div class="form-group col-md-11 ml-5">
                                                <label for="address">Alamat</label> <br>
                                                <input type="text" class="form-control" id="address" name="address"
                                                    value="{{ $item->address }}" readonly>
                                            </div>
                                            <div class="form-group col-md-11 ml-5">
                                                <label for="total_price">Total Harga</label> <br>
                                                <input type="text" class="form-control" id="address" name="address"
                                                    value="{{ $item->total_price }}" readonly>
                                            </div>
                                            <div class="form-group col-md-11 ml-5">
                                                <label for="status">Status</label> <br>
                                                <select class="form-control" name="status">
                                                    <option value="PENDING"
                                                        {{ $item->status == 'PENDING' ? 'selected' : '' }}>PENDING
                                                    </option>
                                                    <option value="SUCCESS"
                                                        {{ $item->status == 'SUCCESS' ? 'selected' : '' }}>SUCCESS
                                                    </option>
                                                    <option value="CANCEL"
                                                        {{ $item->status == 'CANCEL' ? 'selected' : '' }}>CANCEL
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-11 ml-5">
                                                <label for="payment">Pembayaran</label> <br>
                                                <select class="form-control" name="payment">
                                                    <option value="LUNAS"
                                                        {{ $item->payment == 'LUNAS' ? 'selected' : '' }}>LUNAS
                                                    </option>
                                                    <option value="BELUM LUNAS"
                                                        {{ $item->payment == 'BELUM LUNAS' ? 'selected' : '' }}>BELUM
                                                        LUNAS
                                                    </option>
                                                </select>
                                            </div>
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class=" col-sm-11 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-3 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-secondary me-5 mx-2 mb-1">Reset</button>
                                    </div>
                                    <div class="card-footer">
                                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </x-slot>
            </div>
        </div>
    </div>


    {{-- <x-jet-welcome /> --}}
</x-app-layout>
