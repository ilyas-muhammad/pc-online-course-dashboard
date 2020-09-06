{{-- @extends('auth.master') --}}

{{-- @section('content') --}}
 
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
{{-- @endsection  --}}