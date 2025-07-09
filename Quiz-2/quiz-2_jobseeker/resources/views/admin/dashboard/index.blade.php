@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">
    <div class="bg-white shadow-md rounded-lg p-5 flex items-start justify-between">
        <div>
            <span class="text-sm font-medium text-gray-500">Pending Validations</span>
            <p class="text-3xl font-bold text-gray-800 mt-1">{{ $pendingValidations }}</p>
        </div>
        <div class="p-3 bg-yellow-100 rounded-full">
            <svg class="w-6 h-6 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>
    <div class="bg-white shadow-md rounded-lg p-5 flex items-start justify-between">
        <div>
            <span class="text-sm font-medium text-gray-500">Accepted Validations</span>
            <p class="text-3xl font-bold text-gray-800 mt-1">{{ $acceptedValidations }}</p>
        </div>
        <div class="p-3 bg-green-100 rounded-full">
            <svg class="w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
    </div>
    <div class="bg-white shadow-md rounded-lg p-5 flex items-start justify-between">
        <div>
            <span class="text-sm font-medium text-gray-500">Declined Validations</span>
            <p class="text-3xl font-bold text-gray-800 mt-1">{{ $declinedValidations }}</p>
        </div>
        <div class="p-3 bg-red-100 rounded-full">
            <svg class="w-6 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
    </div>
</div>

@if($adminRole === 'validator' && count($assignedValidations) > 0)
    <div class="mt-8">
        <h2 class="text-xl font-semibold text-gray-800">Your Assigned Validations</h2>
        <div class="mt-4 bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Applicant Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Job Category</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">View</span></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($assignedValidations as $validation)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $validation->society->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $validation->jobCategory->job_category }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $validation->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                    Pending
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.validations.show', $validation->id) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif

@endsection