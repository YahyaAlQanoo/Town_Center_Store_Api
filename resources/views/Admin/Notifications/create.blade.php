@extends('parent')
@section('title', 'Create Notification')
@section('page_name', 'Create Notification')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Notification</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('notifications.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                {{-- alert --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                        <h5><i class="icon fas fa-ban"></i> Validate Errors!</h5>
                                        <ul>
                                            @foreach ($errors->all() as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="meating_name">Notification Name</label>
                                    <input type="text" class="form-control" id="meating_name" name="title"
                                        placeholder="Notification Name ">
                                </div>

                                <div class="form-group">
                                    <label for="meating_date">Notification Description</label>
                                    <input type="text" class="form-control" id="meating_date" name="description"
                                        placeholder="Notification Description ">
                                </div>
                                 <div class="form-group">
                                    <label for="meating_time">Image</label>
                                    <input type="file" class="form-control" id="meating_time" name="image"
                                        placeholder="Image ">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
        </div>
    </section>
@endsection
