@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="w-full max-w-sm p-8 space-y-6 bg-white rounded-xl shadow-lg">
        <div class="text-center">
             <h1 class="text-2xl font-bold text-gray-800">Jobseeker Platform</h1>
            <h2 class="mt-2 text-xl font-semibold text-center text-gray-700">
                Admin Area
            </h2>
            <p class="mt-1 text-sm text-center text-gray-500">
                Validator and Officer Access
            </p>
        </div>

        {{-- The form ID must be 'adminLoginForm' to work with the existing JS --}}
        <form class="mt-6 space-y-4" id="adminLoginForm">
            @csrf
            <div>
                <label for="username" class="text-sm font-medium text-gray-700">Username</label>
                <input id="username" name="username" type="text" required
                    class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="your.username">
            </div>

            <div>
                <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                    class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="••••••••">
            </div>

            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                    Login
                </button>
            </div>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:underline">
                ← Go to Society Login
            </a>
        </div>
    </div>
</div>

{{-- The JS part remains the same, no changes needed there --}}
<script>
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $(document).ready(function() {
        $('#adminLoginForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route("admin.login.post") }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = '{{ route("admin.dashboard") }}';
                        });
                    }
                },
                error: function(xhr) {
                    const response = xhr.responseJSON;
                    Swal.fire({
                        title: 'Error!',
                        text: response.message || 'Login failed',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>
@endsection