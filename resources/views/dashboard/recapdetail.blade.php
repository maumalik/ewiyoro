@extends('dashboard.index', ['title' => $title , 'flag_menu' => $flag_menu])
@section('content')
<main class="w-full flex-grow p-6">
        <h1 class="text-sm font-bold"><a class="text-blue-500" href="{{ route('dashboard')}}">Dashboard</a>><a class="text-blue-500" href="{{ route('tax.recap')}}">Rekapitulasi Data SPPT Sudah Terbayarkan</a>>{{$date}}</h1>

        <div class="w-full mt-6">
            <div class="px-6 py-4 mb-4 overflow-hidden border rounded-lg shadow border-secondary-300 bg-white">
                <div class="flex flex-col justify-between sm:flex-row">
                  <div class="text-center sm:text-left flex-start">
                    <h3 class="text-lg font-semibold leading-6 text-gray-800">Rekapitulasi Data SPPT Sudah Terbayarkan</h3>
                  </div>
                </div>
              </div>

              <div class="flex flex-wrap mb-3">
                <div class="w-full md:w-1/2 xl:w-1/2 p-1">
                    <!--Metric Card-->
                    <div class="bg-white border rounded-lg shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-yellow-300"><i class="fa fa-address-card fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">Jumlah SPPT</h5>
                                <h3 class="font-bold text-lg"> {{$total}} </h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/2 p-1">
                    <!--Metric Card-->
                    <div class="bg-white border rounded-lg shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-gray-600"><i class="fas fa-money-bill fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">Total</h5>
                                <h3 class="font-bold text-lg">@currency($total_pays)</h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>               
            </div>
            
            <div class="bg-white overflow-auto p-2 border rounded-lg shadow border-secondary-300">
                <table class="text-left w-full border-collapse mb-2"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nama Petugas</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Jumlah SPPT</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nominal</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Detail</th>                            
                        </tr>
                    </thead>
                    <tbody>
                    @if ($pays->count() == 0)
                        <tr class="hover:bg-grey-lighter">
                          <td class="py-4 px-6 border-b border-grey-light text-center" colspan="3">Tidak Ada Data</td>
                        <tr>
                      @else
                        @foreach ($pays as $pay => $py)
                        <tr class="hover:bg-grey-lighter">
                          <td class="py-4 px-6 border-b border-grey-light ">{{ $py->pluck('user')->pluck('name')->first()}} </td>
                          <td class="py-4 px-6 border-b border-grey-light ">{{ $py->count() }} </td>
                          <td class="py-4 px-6 border-b border-grey-light ">@currency($py->sum('tax_sum_value'))</td>
                          <td class="py-4 px-6 border-b border-grey-light ">
                            <form action="{{route('tax.recapsubdetail', $py->first())}}" method="get">
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