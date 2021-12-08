@extends('backend.layouts.app')
@section('wallet','mm-active')
@section('main')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-display2 icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Money Remove Page
                    <div class="page-title-subheading">1Star2DMM
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin/wallet/remove')}}" method="POST" id="create">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <select name="user_id" class="form-control select-role">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}} ({{$user->phone}})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="amount" name="amount" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreTwo','#create') !!}

<script>
    $(document).ready(function() {
    })
    
</script>
@endsection