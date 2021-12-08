@extends('backend.layouts.app')
@section('3D','mm-active')
@section('main')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-display2 icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>3D Create Page
                    <div class="page-title-subheading">1Star2DMM
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="" style="margin-top: 16px; margin-left:23px">3D ထိုးရန်</h5>
                    <a href="" class="btn btn-success mt-3 btn-sm add-btn" style="margin-bottom: -16px; margin-right:23px ; height:30px ;font-weight:900"><i class="fas fa-plus-circle"></i> ထပ်ထည့်ရန် </a>
                </div>

                <form action="{{url('admin/three')}}" method="POST" id="create">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <select name="user_id" class="form-control select-role @error('user_id') is-invalid @enderror" >
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row" >
                        <div class="col-4 col-md-4"> 
                            <div class="form-group" id="inputs">
                                <label for="">3D</label>
                                <input type="number" name="three[]" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-5 col-md-7">
                            <div class="form-group" id="inputs">
                                <label for="">Amount</label>
                                <input type="number" name="amount[]" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3 col-md-1" style="margin-top:5px">
                            <label for=""></label>
                            <div class="" >
                                <a href="" class="btn btn-danger btn-sm remove-btn " style="font-weight:900;"><i class="fas fa-minus-circle"></i></a>     
                            </div>
                        </div>
                    </div>
                    <div class="test"></div>

                    <button type="submit" class="btn btn-sm btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
{{-- {!! JsValidator::formRequest('App\Http\Requests\StoreThree','#create') !!} --}}

<script>
    $(document).ready(function() {
        $('#validate').validate({
            rules : {
                'three[]' : {
                    required : true,
                    minlength : 3,
                    maxlength :3
                },
                'amount[]' : {
                    required :true,
                    min : 50
                },
            },
            messages : {
                    'three[]' : 'Please fill 3D',
                    'amount[]' : 'Please fill amount'
                }
        });

        $('.add-btn').on('click',function(e){
            e.preventDefault();
             var form = `<div class="row" id="row">
                            <div class="col-4" col-md-3>
                                <div class="form-group">
                                    <label for="">3D</label>
                                    <input type="number" name="three[]" class="form-control " required>
                                </div>
                            </div>
                            <div class="col-5 col-md-7">
                                <div class="form-group">
                                    <label for="">Amount</label>
                                    <input type="number" name="amount[]" class="form-control " required>
                                </div>
                            </div>
                            <div class="col-3 col-md-1" style="margin-top:5px">
                                <label for=""></label>
                                <div class="" >
                                    <a href="" class="btn btn-danger btn-sm remove-btn " style="font-weight:900;"><i class="fas fa-minus-circle"></i></a>     
                                </div>
                            </div>
                        </div>`
            
            $('.test').append(form);
            
            $(document).on('click','.remove-btn',function(e){
                e.preventDefault();
                $(this).parents('#row').remove();
            })
        })
    })
    
</script>
@endsection