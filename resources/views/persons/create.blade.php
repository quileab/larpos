@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h4>Persons</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ url('clients') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                            <label for="idtype">Tipo Doc</label>
                            <select class="form-control" id="idtype" name="idtype">
                            <option>DNI</option>
                            <option>LE</option>
                            <option>LC</option>
                            <option>PAS</option>
                            <option>---</option>
                            </select>
                                </div>
                            <div class="col">
                            <label for="idnumber">Número Doc</label>
                            <input type="number" class="form-control" id="idnumber" name="idnumber" placeholder="Número Doc">
                            </div>
                            </div>
                    <div class="row">
                    <div class="col-9">
                            <label for="fullname">Apellido y Nombre/s</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Apellido y Nombre/s">
                    </div>
                    <div class="col-3">
                            <label for="group">Group</label>
                            <input type="text" class="form-control" id="group" name="group" placeholder="Group">
                    </div>
                    </div>

<div class="row">
    <div class="col">
                            <label for="address">Dirección</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Dirección">
    </div>
    <div class="col">
                            <label for="city">Cuidad</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad">
    </div>
</div>
                            <div class="row">
                                <div class="col">
                            <label for="taxcond">Tipo Resp.</label>
                            <select class="form-control" id="taxcond" name="taxcond">
                            @foreach ($taxcondition as $item)
                                <option value="{{ $item->id }}">{{ $item->description }}</option>
                            @endforeach
                            </select>
                                </div>
                                <div class="col">
                            <label for="CUIT">CUIT</label>
                            <input type="CUIT" class="form-control" id="CUIT" name="CUIT" placeholder="CUIT">
                                </div></div>

                                <div class="row">
                                    <div class="col">
                            <label for="phones">Phone/s</label>
                            <input type="phones" class="form-control" id="phones" name="phones" placeholder="Phone/s">
                                </div>
                                <div class="col">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                        </div>
                    </div>
                </div>
                        <div class="float-right">
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> </button>
                        </div>
<!--
            $table->string('phones', 30)->nullable();
            $table->string('group', 2)->nullable();
            $table->string('taxid', 11); // cuit
            $table->string('email', 127);
-->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
