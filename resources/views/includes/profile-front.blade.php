<div id="profile" class="hidden">
    <div id="profile-content">
        <div id="profile-header" class="bg-green-800 text-white p-4 flex justify-between">
            <span>Profile</span>
            <span id="closeModalProfile" class="cursor-pointer">X</span>
        </div>
        <div id="profile-body" class="p-4">
            <!-- Add record  -->
            <div id="profileForm" class="hidden">
                <form action="{{route('client-edit-profile')}}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="staff_name" class="text-lg font-medium">Name</label><br>
                        <input disabled="disabled" type="text" name="staff_name" value="{{ Auth::guard('staff')->user()->staff_name }}" class="input-field">
                        @error('staff_name')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="staff_username" class="text-lg font-medium">Username</label><br>
                            <input disabled="disabled" required type="text" name="staff_username" value="{{ Auth::guard('staff')->user()->staff_username }}" class="input-field">
                            @error('staff_username')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <label for="staff_email" class="text-lg font-medium">Email</label><br>
                            <input disabled="disabled" type="email" name="staff_email" value="{{ Auth::guard('staff')->user()->staff_email }}" class="input-field">
                            @error('staff_email')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="old_password" class="text-lg font-medium">Old Password</label><br>
                        <input type="password" name="old_password" value="{{old('old_password')}}" placeholder="Old Password" class="input-field">
                        @error('old_password')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="text-lg font-medium">New Password</label><br>
                        <input type="password" name="password" value="{{old('password')}}" placeholder="New Password" class="input-field">
                        @error('password')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center mt-6">
                        <button class="submit-button">Edit Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>