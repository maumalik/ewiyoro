@extends('dashboard.index', ['title' => $title , 'flag_menu' => $flag_menu])
@section('content')
<main class="w-full flex-grow p-6">
        <h1 class="text-sm font-bold"><a class="text-blue-500" href="{{ route('dashboard')}}">Dashboard</a>>Rekapitulasi Data SPPT Sudah Terbayarkan</h1>

        <div class="w-full mt-6">
            <div class="px-6 py-4 mb-4 overflow-hidden border rounded-lg shadow-sm border-secondary-300 bg-white">
                <div class="flex flex-col justify-between sm:flex-row">
                  <div class="text-center sm:text-left flex-start">
                    <h3 class="text-lg font-semibold leading-6 text-gray-800">Data SPPT Sudah Terbayarkan</h3>
                    <h2 class="text-base font-semibold leading-6 text-gray-500">Total SPPT Terbayar : {{$total}} </h2>
                    <h2 class="text-base font-semibold leading-6 text-gray-500">Total Nominal Pembayaran : @currency($total_pays) </h2>
                  </div>

                </div>
              </div>
            
            <div class="bg-white overflow-auto p-2 border rounded-lg shadow-sm border-secondary-300">
                <table class="text-left w-full border-collapse mb-2"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Tanggal Bayar</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nominal</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                      @if ($pays->count() == 0)
                        <tr class="hover:bg-grey-lighter">
                          <td class="py-4 px-6 border-b border-grey-light text-center" colspan="3">Tidak Ada Data</td>
                        <tr>
                      @else
                        @foreach ($pays as $pay => $post)
                        <tr class="hover:bg-grey-lighter">
                          <td class="py-4 px-6 border-b border-grey-light ">{{$pay}}</td>
                          <td class="py-4 px-6 border-b border-grey-light ">@currency($post->sum('tax_sum_value'))</td>
                          <td class="py-4 px-6 border-b border-grey-light ">
                            <form action="{{route('tax.recapdetail', $pay)}}" method="get">
                              <button class="rounded-full flex items-center justify-center bg-green-400 h-8 w-8 hover:bg-green-700" type="submit" title="Detail"><i class="fas fa-info-circle text-white"></i></button>
                            </form>
                          </td>
                        <tr>
                        @endforeach
                      @endif
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection