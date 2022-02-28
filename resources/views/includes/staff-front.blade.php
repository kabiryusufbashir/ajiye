<div id="staff" class="hidden">
    <div id="staff-content">
        <div id="staff-header" class="bg-green-800 text-white p-4 flex justify-between">
            <span>New Staff</span>
            <span id="closeModalStaff" class="cursor-pointer">X</span>
        </div>
        <div id="staff-body" class="p-4">
            <!-- Add record  -->
            <div id="staffForm" class="hidden">
                <form action="{{route('client-add-staff')}}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="staff_name" class="text-lg font-medium">Staff Name</label><br>
                        <input type="text" name="staff_name" value="{{old('staff_name')}}" placeholder="Staff Name" class="input-field">
                        @error('staff_name')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="staff_email" class="text-lg font-medium">Staff Email</label><br>
                        <input type="email" name="staff_email" value="{{old('staff_email')}}" placeholder="Staff Email" class="input-field">
                        @error('staff_email')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="staff_username" class="text-lg font-medium">Staff Username</label><br>
                            <input required type="text" name="staff_username" value="{{old('staff_username')}}" placeholder="Staff Username" class="input-field">
                            @error('staff_username')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="text-lg font-medium">Staff Password</label><br>
                            <input type="password" name="password" value="{{old('password')}}" placeholder="Staff Password" class="input-field">
                            @error('password')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="details" class="text-lg font-medium">Account Type</label><br>
                        <select required name="staff_type" value="{{old('staff_type')}}" class="input-field">
                            <option value=""></option>
                            <option value="1">Super User</option>
                            <option value="2">Normal User</option>
                        </select>
                        @error('staff_type')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center mt-6">
                        <button class="submit-button">Add Staff</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>