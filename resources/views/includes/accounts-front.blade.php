<div id="accounts" class="hidden">
    <div id="accounts-content">
        <div id="accounts-header" class="bg-black text-white p-4 flex justify-between">
            <span>Accounts</span>
            <span id="closeModalAccount" class="cursor-pointer">X</span>
        </div>
        <div id="accounts-body" class="p-4">
            <!-- AccountWorkSpace -->
            <div id="accountWorkSpace" class="block grid grid-cols-2 gap-4">
                <div id="addAccount" class="menu-bar">
                    <i class="fas fa-book"></i><br>
                    Add Account
                </div>
                <div id="addSubAccount" class="menu-bar">
                    <i class="fas fa-book"></i><br>
                    Sub Account
                </div> 
                <div class="menu-bar">
                    <i class="fas fa-book"></i><br>
                    All Account
                </div>
            </div>
            <!-- Add Account  -->
            <div id="addAccountForm" class="hidden">
                <form action="{{route('client-add-account')}}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="account_name" class="text-xl font-medium">Account Name</label><br>
                        <input required type="text" name="account_name" value="{{old('account_name')}}" placeholder="Account Name" class="input-field">
                        @error('account_name')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center mt-6">
                        <button class="submit-button">Add Account</button>
                    </div>
                </form>
            </div>
            <!-- Add Sub Account  -->
            <div id="addSubAccountForm" class="hidden">
                <form action="{{route('client-add-sub-account')}}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="account_id" class="text-xl font-medium">Select Main Account</label><br>
                        <select required name="account_id" value="{{old('account_category_name')}}" placeholder="Sub Account Name" class="input-field">
                            <option value="">--Select Main Account--</option>
                            @foreach($accounts as $account)
                            <option class="py-2" value="{{ $account->id }}">{{ $account->account_name }}</option>
                            @endforeach
                        </select>
                        @error('account_id')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="account_name" class="text-xl font-medium">Sub Account Name</label><br>
                        <input required type="text" name="account_category_name" value="{{old('account_category_name')}}" placeholder="Sub Account Name" class="input-field">
                        @error('account_category_name')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center mt-6">
                        <button class="submit-button">Add Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>