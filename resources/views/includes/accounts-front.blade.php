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
                <div class="menu-bar">
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
        </div>
    </div> 
</div>