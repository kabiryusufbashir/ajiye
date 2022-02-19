<div id="imprest" class="hidden">
    <div id="imprest-content">
        <div id="imprest-header" class="bg-gray-900 text-white p-4 flex justify-between">
            <span>New Imprest</span>
            <span id="closeModalImprest" class="cursor-pointer">X</span>
        </div>
        <div id="imprest-body" class="p-4">
            <!-- Add Imprest  -->
            <div id="addImprestForm" class="hidden">
                <form id="storeImprestForm" action="{{route('client-add-imprest')}}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="date" class="text-lg font-medium">Date</label><br>
                        <input required type="date" name="date" value="{{old('date')}}" placeholder="Date" class="input-field">
                        @error('date')
                            {{$message}}
                        @enderror
                    </div>
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