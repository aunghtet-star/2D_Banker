@extends('backend.layouts.app')
@section('2D-over-history','mm-active')
@section('main')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-display2 icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>2D Overview Dashboard
                    <div class="page-title-subheading">1Start2DMM
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-0">
        <div class="row mb-3 ml-2">
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text type-padding">Date</label>
                    </div>
                    <input type="text" class="form-control date" value="{{request()->date ?? now()->format('Y-m-d')}}" placeholder="All">
                </div>
            </div>
            <div class="col-6" style="padding-right: 30px">
                <select name="" class="form-control time">
                    <option value="{{ 'all' }}" @if(request()->time == 'all') selected  @endif>All</option>
                    <option value="{{ 'true'}}" @if(request()->time == 'true') selected  @endif >AM</option>
                    <option value="{{ 'false'}}" @if(request()->time == 'false') selected  @endif>PM</option>
                </select>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="two-history-table" id="reload">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {

                
                    $('.date').daterangepicker({
                        "singleDatePicker": true,
                        "autoApply": true,
                        "autoUpdateInput" :false,
                        "locale": {
                            "format": "YYYY/MM/DD",
                    },
                    });

                    // $('.date').on('apply.daterangepicker', function(ev, picker) {
                    //     $(this).val(picker.startDate.format('YYYY-MM-DD'));
                    //     var date = $('.date').val();
                    //     history.pushState(null, '' , `?date=${date}`);
                    //     window.location.reload();
                    // });
                    twoHistoryTable();


                    function twoHistoryTable(){
                        var date = $('.date').val();
                        var time = $('.time').val();
                        
                        $.ajax({
                            url : `/admin/two-overview/two-history-table?date=${date}&time=${time}`,
                            type : 'GET',
                            success : function(res){
                                    $('.two-history-table').html(res);
                            }
                        })
                        
                     }

                       

                     $('.date').on('apply.daterangepicker',function(event,picker){
                        $(this).val(picker.startDate.format('YYYY-MM-DD'));
                            twoHistoryTable();

                     })

                     $('.time').on('change',function(){
                        twoHistoryTable();
                     })

                    

       });
    
</script>
@endsection