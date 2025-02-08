@extends('backoffice.layouts.master')

@section('page-title')
@include('backoffice.layouts.common.page-title', ['pagetitle' => 'Dashboard', 'title' => 'Settings'])
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h5>Edit Currency Symbol</h5>
    </div>
    <div class="card-body">
        <form id="currencyForm">
            <div class="form-group">
                <label for="currencySymbol">Currency Symbol</label>
                <input type="text" class="form-control" id="currencySymbol" value="{{$currencySymbol}}" placeholder="Enter new currency symbol" required>
            </div>
            <br>
            <button type="button" class="btn btn-primary" onclick="updateCurrency()">Save Changes</button>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function updateCurrency() {
        const currencySymbol = document.getElementById('currencySymbol').value;

        if (!currencySymbol) {
            Notiflix.Notify.Failure('Please enter a currency symbol.');
            return;
        }

        console.log('Sending currency update request...');
        axios.put('/update-currency', {
            symbol: currencySymbol
        })
            .then(response => {
                if (response.status === 200 && response.data.success) {
                    Notiflix.Notify.Success('Currency symbol updated successfully.');
                } else {
                    Notiflix.Notify.Failure(response.data.message || 'Failed to update the currency symbol.');
                }
            })
            .catch(error => {
                console.error('Error updating currency:', error);
                Notiflix.Notify.Failure('Failed to update the currency symbol. Please try again.');
            });
    }
</script>
@endsection
