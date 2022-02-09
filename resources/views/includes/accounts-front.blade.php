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
                <div id="allAccount" class="menu-bar">
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
            <!-- All Accounts  -->
            <div id="allAccountSpace" class="hidden">
                <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 grid grid-cols-3 gap-4 text-white p-3">
                    <div class="border-r">S/No</div>
                    <div class="border-r">Account</div>
                    <div>Sub Account</div>
                </div>
                <div class="p-3 grid grid-cols-3 bg-white shadow-lg">
                    @foreach($accounts as $account)
                        <div class="border-b py-2">
                            {{ $loop->index + 1 }}
                        </div>
                        <div class="border-b py-2">
                            {{ $account->account_name }}
                        </div>
                        <div class="border-b">
                            @foreach( \App\Models\Accountcategory::select('account_category_name')->where('account_id', $account->id)->get() as $cate )
                                <div class="border-b py-2">
                                    {{ $cate->account_category_name }}
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> 
</div>