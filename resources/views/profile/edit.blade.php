@props([
'edit_user' => false
])

<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <h2 class="font-bold text-lg mb-0">Edit Profile</h2>
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        @if($edit_user)
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl ">
                <header class="mb-3">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Delete Account') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{__('Once the account is deleted, all of its resources and data will be permanently deleted.
                        Before deleting the account, please download any data or information that you wish to retain.')}}
                    </p>
                </header>

                <a href="/customers/{{$user->id}}/delete">
                    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                        {{__('Delete Account') }}
                    </x-danger-button>
                </a>
            </div>
        </div>
        @endif
    </div>
</x-app-layout>