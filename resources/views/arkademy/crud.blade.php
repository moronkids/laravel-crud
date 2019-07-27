<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="base" content="{{env('APP_URL')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>CRUD</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="css/app.css" rel="stylesheet">
        
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">                
                    <a href="{{ url('/crud') }}">Home</a>                
                    <a href="">Login</a>
                    <a href="">Register</a>
            </div>
            <div class="container">
                <div class="title m-b-md">
                    CRUD
                    
                </div>
                <div class="row">
                    <div class="col-md-12" align="right">
                        <button class="btn btn-primary mt-5 mb-4" data-toggle="modal" data-target="#addModal">add</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Work</th>
                            <th scope="col">Salary</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pegawai as $datas)
                            <tr>
                                <td>{{ $datas->name }}</td>
                                <td>{{ $datas->cat }}</td>
                                <td>{{ $datas->sal }}</td>
                                <td>
                                    <button class="btn btn-primary" onclick="view({!!$datas->id!!})">Edit</button>
                                    <button class="btn btn-danger" onclick="_delete({!!$datas->id!!})">Delete</button>
                                </td>
                                <!-- <td>
                                    <a href="/pegawai/edit/{{ $datas->id }}" class="btn btn-warning">Edit</a>
                                    <a href="/pegawai/hapus/{{ $datas->id }}" class="btn btn-danger">Hapus</a>
                                </td> -->
                            </tr>
                        @endforeach
                            <!-- <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            </tr> -->
                        </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> -->
            </div>
        </div>
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_add" method="post">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Name...">
                        </div>
                        <div class="form-group">
                            <select name="position" id="" class="form-control">
                                <option value="" selected disabled>Work...</option>
                                @foreach($position as $pos)
                                <option value="{{$pos->id}}">{{$pos->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="salary" id="" class="form-control" >
                                <option value="" selected disabled>Salary...</option>
                                @foreach($salary as $sal)
                                <option value="{{$sal->id}}">{{$sal->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="submit();" class="btn btn-warning text-white" id="button_submit">Add</button>
                </div>
                
                </div>
            </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
            <script src="js/app.js"></script>
            <script>
                function _delete(id) {
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Kamu tidak dapat mengembalikan kenangan yang sudah terhapus",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus'
                        }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: '/crud/delete/'+id,
                                success: function (data) {
                                    Swal.fire({
                                        title: 'Sukses!',
                                        text: 'Data berhasil dihapus',
                                        type: 'success',
                                        confirmButtonText: 'Close'
                                    }).then(function () {
                                        location.reload(); 
                                    });
                                },
                                error: function (error, xhr) {
                                    $('.modal').modal('hide');
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'Data tidak ditemukan',
                                        type: 'error',
                                        confirmButtonText: 'Close'
                                    }).then(function () {
                                        location.reload(); 
                                    });
                                }
                            }); 
                        }
                    });
                }
                function view(id) {
                    $('#addModal').modal('show');
                    $('input[name="id"]').val(id);
                    $('#addModalLabel').empty().append('Edit Data');
                    $('#button_submit').empty().append('Edit').attr('onclick', 'edit('+id+')');
                    $.ajax({
                        url: '/crud/show/'+id,
                        success: function (data) {
                            // console.log(data.data[0]);
                            $('input[name="username"]').val(data.data[0].name);
                            $('select[name="position"]').find('option[value="'+data.data[0].cat+'"]').attr('selected','selected');
                            $('select[name="salary"]').find('option[value="'+data.data[0].sal+'"]').attr('selected','selected');
                        },
                        error: function (error, xhr) {
                            $('.modal').modal('hide');
                            Swal.fire({
                                title: 'Error!',
                                text: 'Data tidak ditemukan',
                                type: 'error',
                                confirmButtonText: 'Close'
                            }).then(function () {
                                location.reload(); 
                            });
                        }
                    }); 
                }
                function submit() {
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var form = new FormData($('#form_add')[0]);
                    $.ajax({
                        url: '/crud/create',
                        type: 'POST',
                        data: form,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            Swal.fire({
                                title: 'Sukses!',
                                text: 'Data berhasil ditambahkan',
                                type: 'success',
                                confirmButtonText: 'Close'
                            }).then(function () {
                               location.reload(); 
                            });
                        },
                        error: function (error, xhr) {
                            
                        }
                    });                    
                }
                function edit(id) {
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var form = new FormData($('#form_add')[0]);
                    $.ajax({
                        url: '/crud/update/'+id,
                        type: 'POST',
                        data: form,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            Swal.fire({
                                title: 'Sukses!',
                                text: 'Data berhasil diubah',
                                type: 'success',
                                confirmButtonText: 'Close'
                            }).then(function () {
                               location.reload(); 
                            });
                        },
                        error: function (error, xhr) {
                            
                        }
                    });                    
                }
            </script>
    </body>
</html>
