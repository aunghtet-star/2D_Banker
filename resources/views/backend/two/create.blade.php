@extends('backend.layouts.app')
@section('2D','mm-active')
@section('main')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-display2 icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>2D Create Page
                    <div class="page-title-subheading">1Star2DMM
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        {{-- <div class="card">
            <div class="card-body">
                <form action="{{url('admin/two')}}" method="POST" id="create">
                    @csrf
                    
                    <div class="form-group">
                        <label for="">2D</label>
                        <input type="text" name="two" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="amount" name="amount" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Confirm</button>
                </form>
            </div>
        </div> --}}

        <div class="card">
            <div class="d-flex justify-content-between">
                <h5 class="" style="margin-top: 16px; margin-left:23px">2D ထိုးရန်</h5>
                <a href="" class="btn btn-success mt-3 btn-sm add-btn" style="margin-bottom: -16px; margin-right:23px ; height:30px ;font-weight:900"><i class="fas fa-plus-circle"></i> ထပ်ထည့်ရန် </a>
            </div>
            
            <div class="card-body">
                <form id="validate" action="{{url('admin/two')}}" method="POST" id="">
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
                        <div class="col-3">
                            <div class="form-group" id="inputs">
                                <label for="">2D</label>
                                <input type="number" name="two[]" class="form-control" id="two" required>
                            </div>
                        </div>
                        
                        <div class="col-1" >
                            <label for="r" >R</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="r[]" id="r" value="0" style="margin-top:13px">
                            </div>
                        </div>
                        <div class="col-4 col-md-6">
                            <div class="form-group" id="inputs">
                                <label for="">Amount</label>
                                <input type="number" name="amount[]" class="form-control" id="amount"  required>
                            </div>
                        </div>
                        <div class="col-3 col-md-1" style="margin-top:10px ;padding-left:28px">
                            <label for=""></label>
                            <div class="" >
                                <a href="" class="btn btn-danger btn-sm remove-btn " style="font-weight:900;"><i class="fas fa-minus-circle"></i></a>     
                            </div>
                        </div>
                        
                    </div>
                    <div class="test"></div>
                    <button type="submit" id="submit" class="btn btn-primary m-0 btn-sm" style="font-weight:700">ထိုးမည်</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreTwo','#create') !!}

<script>
    $(document).ready(function() {
        $('#validate').validate({
            rules : {
                'two[]' : {
                    required : true,
                    minlength : 2,
                    maxlength :2
                },
                'amount[]' : {
                    required :true,
                    min : 50
                },
            },
            messages : {
                    'two[]' : '2D ဖြည့်ပါ',
                    'amount[]' : 'Amount ဖြည့်ပါ'
                }
        });

        var i = 0;
        $('.add-btn').on('click',function(e){
            e.preventDefault();
             var two = $('#two').val();
              i++;
             var form = `<div class="row" id="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">2D</label>
                                    <input type="number" name="two[]" class="form-control"  required>
                                </div>
                            </div>
                            <div class="col-1" >
                                <label for="">R</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="r[]" id="r" value="${i}" style="margin-top:13px">
                                </div>
                             </div>
                             <div class="col-4 col-md-6">
                                <div class="form-group" id="inputs">
                                    <label for="">Amount</label>
                                    <input type="number" name="amount[]" class="form-control" id="amount"  required>
                                </div>
                            </div>
                            <div class="col-3 col-md-1" style="margin-top:10px;padding-left:28px">
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