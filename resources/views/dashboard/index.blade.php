@extends('layouts.apps')

@section('content')
    <!-- Dashboard 1: Serapan Kegiatan -->
    <div class="card-body">
        <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Data Serapan Kegiatan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Data Serapan Belanja</a>
            </li>
        </ul>
        <div class="tab-content mt-2 mb-3" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                      <thead>
                          <tr>
                              <th>ID Kegiatan</th>
                              <th>Nama Kegiatan</th>
                              <th>Alokasi Dana</th>
                              <th>Serapan</th>
                              <th>Sisa</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($kegiatanData as $data)
                              <tr>
                                  <td>{{ $data['id'] }}</td>
                                  <td>{{ $data['nama_kegiatan'] }}</td>
                                  <td>{{ number_format($data['alokasi_dana'], 2) }}</td>
                                  <td>{{ number_format($data['serapan'], 2) }}</td>
                                  <td>{{ number_format($data['sisa'], 2) }}</td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID Belanja</th>
                                <th>Nama Belanja</th>
                                <th>Alokasi Dana</th>
                                <th>Serapan</th>
                                <th>Sisa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($belanjaData as $data)
                                <tr>
                                    <td>{{ $data['id'] }}</td>
                                    {{-- <td>{{ $data['nama_belanja'] }}</td> --}}
                                    <td><a href="{{ route('dashboard.belanja.detail', $data['id']) }}">{{ $data['nama_belanja'] }}</a></td>
                                    <td>{{ number_format($data['alokasi_dana'], 2) }}</td>
                                    <td>{{ number_format($data['serapan'], 2) }}</td>
                                    <td>{{ number_format($data['sisa'], 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
