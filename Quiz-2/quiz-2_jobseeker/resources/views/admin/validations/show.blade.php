@extends('layouts.admin')

@section('title', 'Validation Details')

@section('content')
<div class="space-y-6">
    <div class="flex justify-start">
        <a href="{{ route('admin.validations.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
            ← Back to Validations
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                    <div class="flex items-center">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Applicant Information
                        </h3>
                        <div class="ml-4 flex-shrink-0">
                             @if($validation->status === 'pending')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                            @elseif($validation->status === 'accepted')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Accepted</span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Declined</span>
                            @endif
                        </div>
                    </div>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Personal details for {{ $validation->society->name }}.
                    </p>
                </div>
                <div class="p-6">
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-6">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Society Name</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $validation->society->name }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">ID Card Number</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $validation->society->id_card_number }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Gender</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ ucfirst($validation->society->gender) }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Born Date</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $validation->society->born_date->format('F d, Y') }}</dd>
                        </div>
                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Address</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $validation->society->address }}</dd>
                        </div>
                         <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Regional</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $validation->society->regional->province }}, {{ $validation->society->regional->district }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                 <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Application Details
                    </h3>
                 </div>
                 <div class="p-6">
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-6">
                        <div class="sm:col-span-1"><dt class="text-sm font-medium text-gray-500">Job Category</dt><dd class="mt-1 text-sm text-gray-900">{{ $validation->jobCategory->job_category }}</dd></div>
                        <div class="sm:col-span-1"><dt class="text-sm font-medium text-gray-500">Job Position</dt><dd class="mt-1 text-sm text-gray-900">{{ $validation->job_position }}</dd></div>
                        <div class="sm:col-span-2"><dt class="text-sm font-medium text-gray-500">Work Experience</dt><dd class="mt-1 text-sm text-gray-900 whitespace-pre-wrap">{{ $validation->work_experience }}</dd></div>
                        <div class="sm:col-span-2"><dt class="text-sm font-medium text-gray-500">Reason to be Accepted</dt><dd class="mt-1 text-sm text-gray-900 whitespace-pre-wrap">{{ $validation->reason_accepted }}</dd></div>
                    </dl>
                 </div>
            </div>
        </div>

        <div class="lg:col-span-1 space-y-6">
            @if($validation->validator)
                <div class="bg-white shadow-md rounded-lg p-6">
                     <h3 class="text-lg font-medium text-gray-900">Validation Info</h3>
                     <dl class="mt-4 space-y-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Validator</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $validation->validator->name }}</dd>
                        </div>
                        @if($validation->validator_notes)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Validator Notes</dt>
                            <dd class="mt-1 text-sm text-gray-700 bg-gray-50 p-3 rounded-md whitespace-pre-wrap">{{ $validation->validator_notes }}</dd>
                        </div>
                        @endif
                     </dl>
                </div>
            @endif

            <div class="bg-white shadow-md rounded-lg">
                <div class="p-6">
                     <h3 class="text-lg font-medium text-gray-900">Actions</h3>

                     @if($adminRole === 'validator' && $validation->status === 'pending')
                        {{-- Form ID must be 'validationForm' --}}
                        <form id="validationForm" action="{{ route('admin.validations.update', $validation->id) }}" method="POST" class="space-y-4 mt-4">
                            @csrf
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Update Status</label>
                                <select id="status" name="status" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="accepted">Accept</option>
                                    <option value="declined">Decline</option>
                                </select>
                            </div>
                            <div>
                                <label for="validator_notes" class="block text-sm font-medium text-gray-700">Notes (optional)</label>
                                <textarea id="validator_notes" name="validator_notes" rows="4" class="mt-1 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Submit Validation
                                </button>
                            </div>
                        </form>

                     @elseif($adminRole === 'officer' && !$validation->validator_id)
                        {{-- Form ID must be 'assignForm' --}}
                        <form id="assignForm" action="{{ route('admin.validations.assign', $validation->id) }}" method="POST" class="space-y-4 mt-4">
                            @csrf
                            <div>
                                <label for="validator_id" class="block text-sm font-medium text-gray-700">Assign to Validator</label>
                                <select id="validator_id" name="validator_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="">Select a Validator</option>
                                    @foreach($validators as $validator)
                                        <option value="{{ $validator->id }}">{{ $validator->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Assign
                                </button>
                            </div>
                        </form>
                     @else
                        <p class="mt-4 text-sm text-gray-600">No available actions for this validation.</p>
                     @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- The JS part remains the same, no changes needed there. --}}
<script>
$(document).ready(function() {
    $('#validationForm').on('submit', function(e) { /* ... no changes ... */ });
    $('#assignForm').on('submit', function(e) { /* ... no changes ... */ });
});
</script>
@endsection