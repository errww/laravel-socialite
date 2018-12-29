@extends('layouts.app')

@section('content')
<div class="container">
    <component-form-table-awayday></component-form-table-awayday>

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

