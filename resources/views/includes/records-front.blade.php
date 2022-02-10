<div id="records" class="hidden">
    <div id="records-content">
        <div id="records-header" class="bg-gray-900 text-white p-4 flex justify-between">
            <span>New Record</span>
            <span id="closeModalRecord" class="cursor-pointer">X</span>
        </div>
        <div id="records-body" class="p-4">
            <!-- Add record  -->
            <div id="addRecordForm" class="hidden">
                <form action="{{route('client-add-account')}}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="date" class="text-lg font-medium">Date</label><br>
                        <input required type="date" name="date" value="{{old('date')}}" placeholder="Date" class="input-field">
                        @error('date')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4 my-2">
                        <div>
                            <label for="account_id" class="text-lg font-medium">Account</label><br>
                            <select required name="account_id" value="{{old('account_id')}}" placeholder="Account" class="input-field">
                                <option value="">--Select Account--</option>
                                @foreach($accounts as $account)
                                <option class="py-2" value="{{ $account->id }}">{{ $account->account_name }}</option>
                                @endforeach
                            </select>
                            @error('account_id')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <label for="accountcategory_id" class="text-lg font-medium">Sub Account</label><br>
                            <select name="accountcategory_id" value="{{old('accountcategory_id')}}" placeholder="Sub Account" class="input-field">
                                <option value="">--Select Sub Account--</option>
                                @foreach($accounts as $account)
                                <option class="py-2" value="{{ $account->id }}">{{ $account->account_name }}</option>
                                @endforeach
                            </select>
                            @error('accountcategory_id')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="text-center mt-6">
                        <button class="submit-button">Add record</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>