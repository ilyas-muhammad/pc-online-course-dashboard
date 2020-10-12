{{-- @extends('auth.master') --}}
<body style ="background-color:papayawhip;">

{{-- @section('content') --}}

<div style="border-radius:25px; margin-top:150px; margin-left:550px; background-color:thistle; width:400px; border-width:1px; border-style:solid; padding:20px;">
<div style="text-align:center;">
<h3>Review Details</h3>
    <form action="/store" method="post" >
        {{ csrf_field() }}
        <table class="table">
            <tr>
                <td>Name:</td>
                <td><strong>{{ $register['name'] ?? '' }}</strong></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><strong>{{ $register['email'] ?? '' }}</strong></td>
            </tr>
            <tr>
                <td>Level:</td>
                <td><strong>{{ $register['level'] ?? '' }}</strong></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td><strong>{{ $register['status'] ?? 'active' }}</strong></td>
            </tr>
            
        </table>
        <a type="button" href="/register1" class="btn btn-warning">Back to Step 1</a>
        <a type="button" href="/register2" class="btn btn-warning">Back to Step 2</a>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    </div> 
</div> 
{{-- @endsection  --}}