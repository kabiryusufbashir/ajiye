<div id="viewReport" class="hidden">
    <div id="imprest-content">
        <div id="imprest-header" class="bg-gray-900 text-white p-4 flex justify-between">
            <span>View Report</span>
            <span id="closeModalReport" class="cursor-pointer">X</span>
        </div>
        <div id="imprest-body" class="p-4">
            <!-- View Report  -->
            <div id="viewReportForm" class="hidden">
                <form id="storeImprestForm" action="{{route('client-add-imprest')}}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="imprest_amount" class="text-lg font-medium">Amount</label><br>
                        <input required type="number" name="imprest_amount" value="{{old('imprest_amount')}}" placeholder="Amount" class="input-field">
                        @error('imprest_amount')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center mt-6">
                        <button class="submit-button">Add Imprest</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>