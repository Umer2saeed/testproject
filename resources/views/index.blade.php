<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Activating Bootstrap 4 Individual Tabs via JavaScript</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .bs-example{
            margin: 20px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $("#myTab a:first").tab('show'); // show last tab on page load
        });
    </script>
</head>
<body>


<div class="bs-example">
    <ul class="nav nav-tabs" id="myTab">
        <li class="nav-item">
            <a href="#devices" class="nav-link" data-toggle="tab">Devices</a>
        </li>
        <li class="nav-item">
            <a href="#users" class="nav-link" data-toggle="tab">Users</a>
        </li>
        <li class="nav-item">
            <a href="#settings" class="nav-link" data-toggle="tab">Settings</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade" id="devices">
            <h4 class="mt-2">Devices</h4>

            <form method="post" action="{{ action('DevicesController@store') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" name="image" id="image">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="warranty">Warranty</label>
                        <input type="date" class="form-control" name="warranty" id="warranty">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="expiry">Expiry</label>
                        <input type="date" class="form-control" name="expiry" id="expiry">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cost">Cost</label>
                        <input type="text" class="form-control" name="cost" id="cost" placeholder="Cost">
                    </div>
                </div>
                    <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-sm">Add</button>
                    </div>
            </form>

            <table class="table mt-4">
                <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Warranty</th>
                    <th>Expiry</th>
                    <th>Cost</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($devicesData ?? '')
                    @foreach($devicesData ?? '' as $device)

                        <tr>
                            <td>{{ $device->id }}</td>
                            <td>{{ $device->image }}</td>
                            <td>{{ $device->name }}</td>
                            <td>{{ $device->warranty }}</td>
                            <td>{{ $device->expiry }}</td>
                            <td>{{ $device->cost }}</td>
                            <td>
                                {!! Form::open( ['method' => 'DELETE', 'action' => ['DevicesController@destroy', $device->id]]) !!}
                                    <div class="form-group ">
                                        {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}

                                {!! Form::close() !!}
                                <button type="button" class="btn btn-primary btn-sm col-sm-4" data-toggle="modal" data-target="#exampleModal">
                                    Edit
                                </button>
                                    </div>

                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Device</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::model($device, ['method' => 'PATCH', 'action' => ['DevicesController@update', $device->id]]) !!}
                                        <div class="form-group">
                                            {!! Form::label('name', 'Name') !!}
                                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('warranty', 'Warranty') !!}
                                            {!! Form::date('warranty', null, ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('expiry', 'Expiry') !!}
                                            {!! Form::date('expiry', null, ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('cost', 'Cost') !!}
                                            {!! Form::text('cost', null, ['class' => 'form-control', 'placeholder' => 'Enter Cost']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('user_id', 'Assign User') !!}
                                            {!! Form::select('user_id', ['' => 'Choose User'] + $users, null) !!}
                                        </div>
                                        <div class="modal-footer">
                                            <div class="form-group">
                                                {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-success btn-sm']) !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>


        <div class="tab-pane fade" id="users">
            <h4 class="mt-2">Users</h4>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="{{ action('UsersController@store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group ">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">
                                </div>
                                <div class="form-group ">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Add</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <table class="table mt-4">
                            <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($usersData ?? '')
                                @foreach($usersData ?? '' as $user)

                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->firstname }}</td>
                                        <td>{{ $user->lastname }}</td>
                                        <td>
                                            {!! Form::open( ['method' => 'DELETE', 'action' => ['UsersController@destroy', $user->id]]) !!}
                                            <div class="form-group ">
                                                {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                                            </div>

                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                @endforeach

                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 text-center">
                        <h4 class="mt-2">Available</h4>

                        <table class="table mt-4">
                            <thead class="thead-dark">
                            <tr>
                                <th>First Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($availableUsers ?? '')
                                @foreach($availableUsers ?? '' as $availableUser)
                                    <tr>
                                        <td>{{ $availableUser->firstname }}</td>
                                    </tr>
                                @endforeach

                            @endif
                            </tbody>
                        </table>


                    </div>
                    <div class="col-md-6 text-center">
                        <h4 class="mt-2">Taken</h4>

                        <table class="table mt-4">
                            <thead class="thead-dark">
                            <tr>
                                <th>First Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($takenUsers ?? '')
                                @foreach($takenUsers ?? '' as $takenUser)
                                    <tr>
                                        <td>{{ $takenUser->firstname }}</td>
                                        <td>
                                            {!! Form::open( ['method' => 'DELETE', 'action' => ['DevicesController@removeUser', $takenUser->id]]) !!}
                                            <div class="form-group ">
                                                {!! Form::button('Remove', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                                            </div>
                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                @endforeach

                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>




        <div class="tab-pane fade" id="settings">
            <h4 class="mt-2">Settings</h4>

            <div class="container">
                <div class="row">
                    <form method="post" action="{{ action('SettingsController@store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="setting1">Setting1</label>
                                <input type="text" class="form-control" name="setting1" id="setting1" placeholder="Enter Setting1">
                            </div>we
                            <div class="form-group col-md-2">
                                <label for="setting2">Setting2</label>
                                <input type="text" class="form-control" name="setting2" id="setting2" placeholder="Enter Setting2">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="setting3">Setting3</label>
                                <input type="text" class="form-control" name="setting3" id="setting3" placeholder="Enter Setting3">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="setting4">Setting4</label>
                                <input type="text" class="form-control" name="setting4" id="setting4" placeholder="Enter Setting4">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Add</button>
                        </div>
                    </form>
                </div>

                <div class="row">

                    <table class="table mt-4">
                        <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Setting1</th>
                            <th>Setting2</th>
                            <th>Setting3</th>
                            <th>Setting4</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($settingsData ?? '')
                            @foreach($settingsData ?? '' as $setting)

                                <tr>
                                    <td>{{ $setting->id }}</td>
                                    <td>{{ $setting->setting1 }}</td>
                                    <td>{{ $setting->setting2 }}</td>
                                    <td>{{ $setting->setting3 }}</td>
                                    <td>{{ $setting->setting4 }}</td>
                                    <td>
                                        {!! Form::open( ['method' => 'DELETE', 'action' => ['SettingsController@destroy', $setting->id]]) !!}
                                        <div class="form-group ">
                                            {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}

                                            {!! Form::close() !!}
                                            <button type="button" class="btn btn-primary btn-sm col-sm-4" data-toggle="modal" data-target="#exampleModal">
                                                Edit
                                            </button>
                                        </div>
                                        {{--                                <form method="delete" action="{{ route('device.destroy', $device->id) }}" enctype="multipart/form-data">--}}
                                        {{--                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>--}}
                                        {{--                                </form>--}}
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Setting</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {!! Form::model($setting, ['method' => 'PATCH', 'action' => ['SettingsController@update', $setting->id]]) !!}
                                                <div class="form-group">
                                                    {!! Form::label('setting1', 'Setting1') !!}
                                                    {!! Form::text('setting1', null, ['class' => 'form-control', 'placeholder' => 'Enter Setting1']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('setting2', 'Setting2') !!}
                                                    {!! Form::text('setting2', null, ['class' => 'form-control', 'placeholder' => 'Enter Setting2']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('setting3', 'Setting3') !!}
                                                    {!! Form::text('setting3', null, ['class' => 'form-control', 'placeholder' => 'Enter Setting3']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('setting4', 'Setting4') !!}
                                                    {!! Form::text('setting4', null, ['class' => 'form-control', 'placeholder' => 'Enter Setting4']) !!}
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="form-group">
                                                        {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-success btn-sm']) !!}
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        </tbody>
                    </table>


                </div>
            </div>
        </div>


    </div>
</div>


<script>
    $(document).ready(function () {
        $('#btnHide').click(function () {
            //$('td:nth-child(2)').hide();
            // if your table has header(th), use this
            $('td:nth-child(3),th:nth-child(3)').hide();
        });
    });

</script>
</body>
</html>
