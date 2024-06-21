@extends('dashboard.layouts.app')

@section('title', 'Survey')

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Survey</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" cellspacing="0"
                                width="100%">
                                <thead>
                                    <th>No</th>
                                    <th>Volume</th>
                                    <th>Asal</th>
                                    <th>Jawaban</th>
                                    <th>Saran & Masukan</th>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($surveys as $survey)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $survey->nama }}</td>
                                            <td>{{ $survey->asal }}</td>
                                            <td>{{ $survey->jawaban }}</td>
                                            <td>{{ $survey->saran_masukan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#basic-datatables').DataTable();
    </script>
@endpush
