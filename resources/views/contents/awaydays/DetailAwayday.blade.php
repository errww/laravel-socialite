@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Awayday
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="lead text-center">Lorem Ipsum Dolor <span class="fa fa-check-circle"></span>
                    </p>
                    <p class="lead text-center">[ Match P vs K ]</p>
                    <p class="text-center">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <ul class="list-inline text-center">
                      <li class="list-inline-item">
                        <button type="button" class="btn btn-outline-success"> Match : 11/01/2019</button>
                      </li>
                      <li class="list-inline-item">
                        <button type="button" class="btn btn-outline-success">Open Slot: 400</button>
                      </li>
                      <li class="list-inline-item">
                        <button type="button" class="btn btn-outline-success">Biaya : 200.000</button>
                      </li>
                      <li class="list-inline-item">
                        <button type="button" class="btn btn-outline-success">Tutup : 09/01/2019</button>
                      </li>
                    </ul>

                    <div class="row">
                      <div class="card col-md-4 mx-auto">
                            <div class="card-body">
                              <h4 class="text-center">Slot Terisi</h4>
                              <h4 class="text-center">0</h4>
                          </div>
                      </div>
                      <div class="card col-md-4 mx-auto">
                            <div class="card-body">
                              <h4 class="text-center">Slot Tersisa</h4>
                              <h4 class="text-center">200</h4>
                          </div>
                      </div>
                    </div>
                    
                    <hr>
                    <p class="text-center">
                      <button class="btn btn-success">Daftar Awaydays</button>
                    </p>
                    
                    <hr>

                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td>
                            <p class="badge badge-warning float-right">Belum Konfirmasi
                                <i class="fa fa-unlock"></i>
                            </p>
                            <p class="lead">Lorem Ipsum Dolor <span class="fa fa-check-circle"></span>
                            </p>
                            <p>
                               Mendaftar Awaydays [ Match P vs K ]
                            </p>
                          </td>                          
                        </tr>
                        <tr>
                          <td>
                            <p class="badge badge-warning float-right">Belum Konfirmasi
                                <i class="fa fa-unlock"></i>
                            </p>
                            <p class="lead">Lorem Ipsum Dolor <span class="fa fa-check-circle"></span>
                            </p>
                            <p>
                               Mendaftar Awaydays [ Match P vs K ]
                            </p>
                          </td>                          
                        </tr>
                        <tr>
                          <td>
                            <p class="badge badge-warning float-right">Belum Konfirmasi
                                <i class="fa fa-unlock"></i>
                            </p>
                            <p class="lead">Lorem Ipsum Dolor <span class="fa fa-check-circle"></span>
                            </p>
                            <p>
                               Mendaftar Awaydays [ Match P vs K ]
                            </p>
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

@section('scripts')

@endsection('scripts')
