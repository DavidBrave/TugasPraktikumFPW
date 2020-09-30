<style>
    *{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background: rgba( 71, 147, 227, 1);
}
h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    padding: 30px 0;
}

/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 2px solid #d6f1ff;
    border-bottom: 1px solid #95bedb;
    font-size: 12px;
}

.fl-table thead th {
    color: #ffffff;
    background: #426b82;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #95bedb;
    /* background: #F8F8F8; */
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        /* content: "Scroll horizontally >"; */
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        background: #95bedb;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}
</style>

@section('myjsfile')
<script>

</script>
@stop

@extends('layouts.app')
@section('content')

<button onclick="window.location.href='/vendor'">List Vendor</button>
<button onclick="window.location.href='/admin/vendor/new'">To New Vendor</button>
<button >Report</button>
<button onclick="window.location.href='/login'">Logout</button>

<div class="table-wrapper">
<table class="fl-table">

    <thead>
    <tr>

        <th>Fullame</th>
        <th>Email</th>
        <th>Location</th>
        <th>Description</th>
        <th>Action</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)

        <tr>
            <td>{{ $user->fullname}}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->type }}</td>
            <td>
                <form action="/admin/users" method="post">
                    @csrf
                    <input type="hidden" name="hidden" value="{{$user->username}}">
                    @if ($user->blocked == false)
                    <Button style="color: red">
                        {{ "Block" }}
                    </Button>
                    @endif
                    @if ($user->blocked == true)
                    <Button style="color: green">
                        {{ "Unblock" }}
                    </Button>
                    @endif

                </form>
            </td>
        <tr>

    @endforeach
    </tbody>

</table>
</div>
@endsection
