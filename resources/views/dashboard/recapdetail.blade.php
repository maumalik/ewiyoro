@extends('dashboard.index', ['title' => $title , 'flag_menu' => $flag_menu])
@section('content')
<main class="w-full flex-grow p-6">
        <h1 class="text-sm font-bold"><a class="text-blue-500" href="{{ route('dashboard')}}">Dashboard</a>><a class="text-blue-500" href="{{ route('tax.recap')}}">Rekapitulasi Data SPPT Sudah Terbayarkan</a>>{{$date}}</h1>

        <div class="w-full mt-6">
            <div class="px-6 py-4 mb-4 overflow-hidden border rounded-lg shadow-sm border-secondary-300 bg-white">
                <div class="flex flex-col justify-between sm:flex-row">
                  <div class="text-center sm:text-left flex-start">
                    <h3 class="text-lg font-semibold leading-6 text-gray-800">Data SPPT Sudah Terbayarkan</h3>
                    <h2 class="text-base font-semibold leading-6 text-gray-500">Total SPPT Terbayar : </h2>
                    <h2 class="text-base font-semibold leading-6 text-gray-500">Total Nominal Pembayaran :</h2>
                  </div>

                  <div class="flex items-center justify-center mt-2 space-x-2 sm:mt-0">
                    <form action="{{ url()->current() }}"
                      method="get">
                      <select name="option">
                        <option value="1">Nama Wajib Pajak</option>
                        <option value="2">No SPPT</option>
                        <option value="3">Blok</option>
                      </select>
                      <div class="relative mx-auto">
                        <input type="search" name="keyword" value="" placeholder="Search" class="block w-full p-2 pr-10 text-sm leading-5 transition rounded-full shadow-sm border-secondary-300 bg-secondary-50 focus:bg-white focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <button type="submit"
                          class="absolute top-0 right-0 inline-flex items-center px-2 py-2 ml-1 mr-2 text-sm focus:outline-none">
                          <svg class="w-5 h-5 text-gray-500 transition dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 disabled:opacity-25"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                              clip-rule="evenodd" />
                          </svg>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            
            <div class="bg-white overflow-auto p-2 border rounded-lg shadow-sm border-secondary-300">
                <table class="text-left w-full border-collapse mb-2"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nama Petugas</th>
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
                        @foreach ($pays as $pay => $post)
                        <tr class="hover:bg-grey-lighter">
                          <td class="py-4 px-6 border-b border-grey-light ">{{ $post }} </td>
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