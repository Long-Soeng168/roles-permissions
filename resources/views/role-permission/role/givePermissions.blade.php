@extends('layouts.default')

@section('content')
<div class="bg-white">
    @if (session('status'))
    <div class="bg-blue-100 border border-blue-500 text-blue-700 px-4 py-3 relative" role="alert">
        <p>{{ session('status') }}</p>
    </div>

    @endif
    <div class="p-4 border-b border-gray-200">
        <h4 class="text-lg font-semibold">
            Role : {{ $role->name }}
            <a href="{{ url('roles') }}" class="bg-red-500 text-white px-4 rounded-md float-right">
                Back
            </a>
        </h4>
    </div>
    <div class="p-4">
        <form action='{{ url("roles/$role->id/give-permissions") }}' method="POST" class="max-w-3xl mx-auto">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="permissions" class="block mb-2">Permissions</label>

                <div class="grid grid-cols-4 gap-4">
                    @foreach ($permissions as $permission)
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            id="permission_{{ $permission->id }}"
                            name="permissions[]"
                            value="{{ $permission->name }}"
                            class="mr-2"
                            {{ in_array($permission->id, $rolePermissions) ? "checked" : '' }}
                        >
                        <label for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>

                    @endforeach
                </div>
            </div>

            <div class="mb-6">
                <button type="submit" class="w-full px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                    Save
                </button>
            </div>
        </form>


    </div>
</div>
@endsection
