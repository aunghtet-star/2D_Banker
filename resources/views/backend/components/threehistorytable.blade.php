<style>
    .column {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        margin-right: 150px;
        width: 1800px;
        height: 80vh;
}
.column p {
    display: flex;
}
</style>

@if($three_transactions)
    <div class="column" >
        @foreach($three_transactions as $three_transaction)
        <div class="d-flex" style="width : 100px">
            <p class="mb-2 mr-3">{{$three_transaction->three}} </p> => <span class="ml-2">{{number_format($three_transaction->total)}}</span>
        </div>
    @endforeach
    </div>
@endif
<h5 class="text-success" style="font-weight: 700">Total amount => {{number_format($three_transactions_total)}}</h5>

