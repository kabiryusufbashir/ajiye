<div id="records" class="hidden">
    <div id="records-content">
        <div id="records-header" class="bg-gray-900 text-white p-4 flex justify-between">
            <span>New Record</span>
            <span id="closeModalRecord" class="cursor-pointer">X</span>
        </div>
        <div id="records-body" class="p-4">
            <!-- Add record  -->
            <div id="addRecordForm" class="hidden">
                <form id="storeRecordForm" action="{{route('client-add-record')}}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="record_date" class="text-lg font-medium">Date *</label><br>
                        <input required type="date" name="record_date" value="{{old('record_date')}}" placeholder="Date" class="input-field">
                        @error('record_date')
                            {{$message}}
                        @enderror
                    </div>
                    <div id="account">
                        <sub-account></sub-account>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="record_amount" class="text-lg font-medium">Amount *</label><br>
                            <input required type="number" name="record_amount" value="{{old('record_amount')}}" placeholder="Amount" class="input-field">
                            @error('record_amount')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <label for="record_receipt_no" class="text-lg font-medium">Voucher No</label><br>
                            <input type="text" name="record_receipt_no" value="{{old('record_receipt_no')}}" placeholder="Receipt No" class="input-field">
                            @error('record_receipt_no')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="details" class="text-lg font-medium">Details</label><br>
                        <input type="text" name="details" value="{{old('details')}}" placeholder="Details" class="input-field">
                        @error('details')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center mt-6">
                        <button class="submit-button">Add record</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>