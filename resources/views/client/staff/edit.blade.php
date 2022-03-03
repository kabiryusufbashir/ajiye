<div>
    <form action="{{route('client-add-staff')}}" method="POST" class="px-6 lg:px-8 py-8">
        @csrf
        <div>
            <label for="staff_name" class="text-lg font-medium">Staff Name</label><br>
            <input type="text" name="staff_name" value="{{ $staff->staff_name }}" placeholder="Staff Name" class="input-field">
            @error('staff_name')
                {{$message}}
            @enderror
        </div>
        <div>
            <label for="staff_email" class="text-lg font-medium">Staff Email</label><br>
            <input type="email" name="staff_email" value="{{ $staff->staff_email }}" placeholder="Staff Email" class="input-field">
            @error('staff_email')
                {{$message}}
            @enderror
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="staff_username" class="text-lg font-medium">Staff Username</label><br>
                <input required type="text" name="staff_username" value="{{ $staff->staff_username }}" placeholder="Staff Username" class="input-field">
                @error('staff_username')
                    {{$message}}
                @enderror
            </div>
        </div>
        <div>
            <label for="details" class="text-lg font-medium">Account Type</label><br>
            <select required name="staff_type" class="input-field">
                @if($staff->staff_type == 1)
                    <option value="1">Super User</option>
                    <option value="2">Normal User</option>
                @else
                    <option value="2">Normal User</option>
                    <option value="1">Super User</option>
                @endif
            </select>
            @error('staff_type')
                {{$message}}
            @enderror
        </div>
        <div class="text-center mt-6">
            <button class="submit-button">Edit Staff</button>
        </div>
    </form>
</div>