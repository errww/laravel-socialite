@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Awaydays
                <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#bukaPendaftaranModal">Buka Pendaftaran</button>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- alert -->
                    <div class="alert alert-warning" role="alert">
                        Anda belum membuka pendaftaran
                    </div>
                    <!-- end alert -->
                    <!-- table -->
                    <table class="table table-responsive">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Judul</th>
                          <th scope="col">Tanggal Match</th>
                          <th scope="col">Tutup Pendaftaran</th>
                          <th scope="col">Total pendaftar</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Match PSSI vs PSSI hdhdhdh </td>
                          <td>11/01/2018</td>
                          <td>9/01/2018</td>
                          <td>100/450</td>
                          <td><span class="badge badge-success">Buka</span></td>
                        </tr>
                        <tr>
                          <th scope="row">1</th>
                          <td>Match PSSI vs PSSI</td>
                          <td>11/01/2018</td>
                          <td>9/01/2018</td>
                          <td>100/450</td>
                          <td><span class="badge badge-danger">Tutup</span></td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- end table -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="bukaPendaftaranModal" tabindex="-1" role="dialog" aria-labelledby="bukaPendaftaranModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Buka Pendaftaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Tanggal Match</label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Lokasi Match</label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Jumlah Bayar</label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Jumlah Slot</label>
                <input type="text" class="form-control">
                <small class="form-text text-muted">Tulis dengan angka, contoh : 450</small>
              </div>
              <div class="form-group">
                <label>Penutupan Registrasi</label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" rows="3"></textarea>
                </div>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal -->

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Awaydays Terbaru</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td>
                            <p class="badge badge-success float-right">Buka
                                <i class="fa fa-unlock"></i>
                            </p>
                            <p class="lead">Lorem Ipsum Dolor <span class="fa fa-check-circle"></span>
                                [ Match P vs K ]
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.
                            </p> 
                            <ul class="list-inline">
                              <li class="list-inline-item">Match : 11/01/2019</li>
                              <li class="list-inline-item">Open Slot: 400</li>
                              <li class="list-inline-item">Biaya : 200.000</li>
                              <li class="list-inline-item">Tutup : 09/01/2019</li>
                            </ul>
                            <button class="btn btn-success"><i class="fa fa-eye"></i> Selengkapnya >></button>
                          </td>                          
                        </tr>
                        <tr>
                          <td>
                            <p class="badge badge-success float-right">Buka
                                <i class="fa fa-unlock"></i>
                            </p>
                            <p class="lead">Lorem Ipsum Dolor <span class="fa fa-check-circle"></span>
                                [ Match P vs K ]
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                            <ul class="list-inline">
                              <li class="list-inline-item">Match : 11/01/2019</li>
                              <li class="list-inline-item">Open Slot: 400</li>
                              <li class="list-inline-item">Biaya : 200.000</li>
                              <li class="list-inline-item">Tutup : 09/01/2019</li>
                            </ul>
                            <button class="btn btn-success"><i class="fa fa-eye"></i> Selengkapnya >></button> 
                          </td>                          
                        </tr>                        
                      </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
